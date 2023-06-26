<?php

namespace App\Http\Controllers\Admin;

use App\Classes\GeniusMailer;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Country;
use App\Models\Coupon;
use App\Models\Currency;
use App\Models\Generalsetting;
use App\Models\Notification;
use App\Models\Order;
use App\Models\OrderTrack;
use App\Models\Pagesetting;
use App\Models\Product;
use App\Models\Reward;
use App\Models\State;
use App\Models\User;
use App\Models\UserNotification;
use App\Models\VendorOrder;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CustomOrderController extends Controller
{
    public function index()
    {
        if (Session::has('already')) {
            Session::forget('already');
        }
        if (Session::has('coupon')) {
            Session::forget('coupon');
        }
        if (Session::has('coupon_total')) {
            Session::forget('coupon_total');
        }
        if (Session::has('coupon_total1')) {
            Session::forget('coupon_total1');
        }
        if (Session::has('coupon_percentage')) {
            Session::forget('coupon_percentage');
        }

        $curr = Currency::where('is_default','=',1)->first();
        return view('admin.order.custom_order',compact('curr'));
    }

    public function loadForm(Request $request)
    {
        if($request->user_id){
            $user = User::findOrFail($request->user_id);
        }else{
            $user = null;
        }
        return view('load.customer_form',compact('user'));
    }

    public function quick($id)
    {
        $product = Product::findOrFail($id);
        $curr = Currency::where('is_default','=',1)->first();
        return view('load.admin_quick',compact('product','curr'));
    }


    public function store(Request $request)
    {

       
        
        
        $rules = [
            'customer_name' => 'required',
            'customer_email' => 'required',
            'customer_phone' => 'required',
            'customer_address' => 'required',
            'customer_country' => 'required',
            'customer_city' => 'required',
            'customer_zip' => 'required',
        ];
        $customs = [
            'customer_name.required' => 'customer name is required',
            'customer_email.required' => 'customer email is required',
            'customer_phone.required' => 'customer phone is required',
            'customer_address.required' => 'customer address is required',
            'customer_country.required' => 'customer country is required',
            'customer_city.required' => 'customer city is required',
            'customer_zip.required' => 'customer zip is required',
        ];

        
        $validator = Validator::make($request->all(), $rules, $customs);
        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }




        if (!Session::has('admin_cart')) {
            return back()->with('success',"You don't have any product to checkout.");
        }

        if(isset($request->user_id) && $request->user_id){
            $check_user_login = User::findOrFail($request->user_id);
            Auth::login($check_user_login);
        }

      
        $curr = Currency::where('is_default','=',1)->first();
     
    
        $gs = Generalsetting::findOrFail(1);
        $oldCart = Session::get('admin_cart');
        $cart = new Cart($oldCart);

       
        $commission = 0;
        foreach($cart->items as $key => $prod)
        {
            if($prod['item']['user_id'] != 0){
                $cproduct = Product::findOrFail($prod['item']['id']);
                if($prod['item']->category->commission != 0){
                    $inPrice = $cproduct->price + $cproduct->price * $prod['item']->category->commission / 100 ;
                }else{
                    $inPrice = $cproduct->price + $gs->fixed_commission + ($cproduct->price/100) * $gs->percentage_commission ;
                }
                $commission += $inPrice - $cproduct->price;
            }
        if(!empty($prod['item']['license']) && !empty($prod['item']['license_qty']))
        {
                foreach($prod['item']['license_qty']as $ttl => $dtl)
                {
                    if($dtl != 0)
                    {
                        $dtl--;
                        $produc = Product::findOrFail($prod['item']['id']);
                        $temp = $produc->license_qty;
                        $temp[$ttl] = $dtl;
                        $final = implode(',', $temp);
                        $produc->license_qty = $final;
                        $produc->update();
                        $temp =  $produc->license;
                        $license = $temp[$ttl];
                         $oldCart = Session::has('cart') ? Session::get('cart') : null;
                         $cart = new Cart($oldCart);
                         $cart->updateLicense($prod['item']['id'],$license);  
                         Session::put('cart',$cart);
                        break;
                    }                    
                }
        }
        }


        $order = new Order();
    
        $order['user_id'] = $request->user_id;
        $new_cart = [];
        $new_cart['totalQty'] = $cart->totalQty;
        $new_cart['totalPrice'] = $cart->totalPrice;
        $new_cart['items'] = $cart->items;
        $new_cart = json_encode($new_cart,true);
        $order['cart'] = $new_cart; 
        $order['totalQty'] = $cart->totalQty;
        $order['pay_amount'] = round($request->final_amount / $curr->value, 2);
        $order['method'] = $request->method;
        $order['txnid'] = $request->transtraction_id;
    
        $order['customer_email'] = $request->customer_email;
        $order['customer_name'] = $request->customer_name;
        $order['shipping_cost'] = 0;
        $order['packing_cost'] = 0;
        $order['tax'] = $request->tax_amount;
        if(isset($request->state)){
            $order['tax_location'] = State::findOrFail($request->state)->state;
        }else{
            $order['tax_location'] = Country::findOrFail($request->country)->country_name;
        }
        $order['customer_phone'] = $request->customer_phone;
        $order['order_number'] = Str::random(10);
        $order['customer_address'] = $request->customer_address;
        $order['customer_country'] = $request->customer_country;
        $order['customer_city'] = $request->customer_city;
        $order['customer_zip'] = $request->customer_zip;
        $order['coupon_code'] = $request->coupon_code;
        $order['coupon_discount'] = $request->coupon_amount;
        
        $order['commission'] = $commission;
        $order['payment_status'] = $request->payment_status;
        $order['status'] = $request->order_status;
        $order['currency_sign'] = $curr->sign;
        $order['currency_value'] = $curr->value;
        
     
        $order->save();


       

        if(Auth::check()){
            if($gs->is_reward == 1){
                $num = $order->pay_amount;    
             
                $rewards = Reward::get();
                foreach ($rewards as $i) {
                    $smallest[$i->order_amount] = abs($i->order_amount - $num);
            }
               
            asort($smallest);
               $final_reword = Reward::where('order_amount',key($smallest))->first();
               Auth::user()->update(['reward' => (Auth::user()->reward + $final_reword->reward)]);
            }

            $user_amount = Auth::user()->balance;
            $pay_amount = $order->wallet_price;
            $sub = $user_amount - $pay_amount;
            Auth::user()->update(['balance' => $sub]);
        }

        if ($order->user_id != 0 && $order->wallet_price != 0) {
            $transaction = new \App\Models\Transaction;
            $transaction->txn_number = Str::random(3).substr(time(), 6,8).Str::random(3);
            $transaction->user_id = $order->user_id;
            $transaction->amount = $order->wallet_price;
            $transaction->currency_sign = $order->currency_sign;
            $transaction->currency_code = \App\Models\Currency::where('sign',$order->currency_sign)->first()->name;
            $transaction->currency_value= $order->currency_value;
            $transaction->details = 'Payment Via Wallet';
            $transaction->type = 'minus';
            $transaction->save();
        }


        $track = new OrderTrack();
        $track->title = 'Pending';
        $track->text = 'You have successfully placed your order.';
        $track->order_id = $order->id;
        $track->save();

        $notification = new Notification();
        $notification->order_id = $order->id;
        $notification->save();

        $coupon_id = Session::has('coupon') ? Session::get('coupon_id') : '';
        if($coupon_id != "")
        {
            $coupon = Coupon::findOrFail($coupon_id);
            $coupon->used++;
            if($coupon->times != null)
            {
                $i = (int)$coupon->times;
                $i--;
                $coupon->times = (string)$i;
            }
            $coupon->update();

        }

        foreach($cart->items as $prod)
        {
            $x = (string)$prod['size_qty'];
            if(!empty($x))
            {
                $product = Product::findOrFail($prod['item']['id']);
                $x = (int)$x;
                $x = $x - $prod['qty'];
                $temp = $product->size_qty;
                $temp[$prod['size_key']] = $x;
                $temp1 = implode(',', $temp);
                $product->size_qty =  $temp1;
                $product->update();               
            }
        }


        foreach($cart->items as $prod)
        {
            $x = (string)$prod['stock'];
            if($x != null)
            {

                $product = Product::findOrFail($prod['item']['id']);
                $product->stock =  $prod['stock'];
                $product->update();  
                if($product->stock <= 5)
                {
                    $notification = new Notification;
                    $notification->product_id = $product->id;
                    $notification->save();                    
                }              
            }
        }

        $notf = null;

        foreach($cart->items as $prod)
        {
            if($prod['item']['user_id'] != 0)
            {
                $vorder =  new VendorOrder();
                $vorder->order_id = $order->id;
                $vorder->user_id = $prod['item']['user_id'];
                $notf[] = $prod['item']['user_id'];
                $vorder->qty = $prod['qty'];
                $vorder->price = $prod['price'];
                $vorder->created_at = Carbon::now();  
                $vorder->order_number = $order->order_number;  
                if($order->status == 'completed'){
                    $vorder->status = 'completed';       
                }      
                $vorder->save();
            }

        }


        if($order->status =='completed'){
            foreach($order->vendororders as $vorder)
            {
                $uprice = User::findOrFail($vorder->user_id);
                $uprice->current_balance = $uprice->current_balance + $vorder->price;
                $uprice->update();
            }
        }


        if(!empty($notf))
        {
            $users = array_unique($notf);
            foreach ($users as $user) {
                $notification = new UserNotification();
                $notification->user_id = $user;
                $notification->order_number = $order->order_number;
                $notification->save();    
            }
        }

            Session::forget('admin_cart');
            Session::forget('already');
            Session::forget('coupon');
            Session::forget('coupon_total');
            Session::forget('coupon_total1');
            Session::forget('coupon_percentage');
            Auth::logout();
        //Sending Email To Buyer

        if($gs->is_smtp == 1)
        {
        $data = [
            'to' => $request->customer_email,
            'type' => "new_order",
            'cname' => $request->customer_name,
            'oamount' => "",
            'aname' => "",
            'aemail' => "",
            'wtitle' => "",
            'onumber' => $order->order_number,
        ];

        $mailer = new GeniusMailer();
        $mailer->sendAutoOrderMail($data,$order->id);            
        }
        else
        {
           $to = $request->customer_email;
           $subject = "Your Order Placed!!";
           $msg = "Hello ".$request->customer_name."!\nYou have placed a new order.\nYour order number is ".$order->order_number.".Please wait for your delivery. \nThank you.";
            $headers = "From: ".$gs->from_name."<".$gs->from_email.">";
           mail($to,$subject,$msg,$headers);            
        }
        //Sending Email To Admin
        if($gs->is_smtp == 1)
        {
            $data = [
                'to' => Pagesetting::find(1)->contact_email,
                'subject' => "New Order Recieved!!",
                'body' => "Hello Admin!<br>Your store has received a new order.<br>Order Number is ".$order->order_number.".Please login to your panel to check. <br>Thank you.",
            ];

            $mailer = new GeniusMailer();
            $mailer->sendCustomMail($data);            
        }
        else
        {
           $to = Pagesetting::find(1)->contact_email;
           $subject = "New Order Recieved!!";
           $msg = "Hello Admin!\nYour store has recieved a new order.\nOrder Number is ".$order->order_number.".Please login to your panel to check. \nThank you.";
           $headers = "From: ".$gs->from_name."<".$gs->from_email.">";
           mail($to,$subject,$msg,$headers);
        }

        return response()->json(['success'=>route('admin-order-show',$order->id)]);















    }
}
