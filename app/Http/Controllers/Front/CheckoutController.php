<?php

namespace App\Http\Controllers\Front;

use App\Classes\GeniusMailer;
use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Cart;
use App\Models\Country;
use App\Models\Coupon;
use App\Models\Currency;
use App\Models\Generalsetting;
use App\Models\Notification;
use App\Models\Order;
use App\Models\OrderTrack;
use App\Models\Pagesetting;
use App\Models\PaymentGateway;
use App\Models\Pickup;
use App\Models\Product;
use App\Models\Reward;
use App\Models\State;
use App\Models\Transaction;
use App\Models\User;
use App\Models\UserNotification;
use Devfaysal\BangladeshGeocode\Models\District;
use Devfaysal\BangladeshGeocode\Models\Division;
use Devfaysal\BangladeshGeocode\Models\Upazila;

// use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{

    public function getDistrict($division_id)
    {
        $districts = District::where('division_id', $division_id)->get();

        if (Auth::user()) {
            $user_state = Auth::user()->state;
        } else {
            $user_state = 0;
        }

        $html_states = '<option value="" > Select District </option>';
        foreach ($districts as $dis) {
            if ($dis->id == $user_state) {
                $check = 'selected';
            } else {

                $check = '';
            }
            $html_states .= '<option value="' . $dis->name . '" data="' . $dis->id . '" data-href="' . route('district.wise.upazilas', $dis->id) . '">' . $dis->name . '</option>';
        }

        return response()->json(["data" => $html_states, "state" => $user_state]);
    }

    public function getUpazila($district_id)
    {
        $upazilas = Upazila::where('district_id', $district_id)->get();

        if (Auth::user()) {
            $user_state = Auth::user()->state;
        } else {
            $user_state = 0;
        }

        $html_states = '<option value="" > Select Upazila </option>';
        foreach ($upazilas as $upazila) {
            if ($upazila->id == $user_state) {
                $check = 'selected';
            } else {

                $check = '';
            }
            $html_states .= '<option value="' . $upazila->name . '" data="' . $upazila->id . '">' . $upazila->name . '</option>';
        }

        return response()->json(["data" => $html_states, "state" => $user_state]);
    }

    public function addressUpdate(Request $request, $id)
    {
        $address = Address::findOrFail($id);
        $address->update([
            'name' => $request->name,
            'mobile' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'division' => $request->customer_division,
            'district' => $request->customer_district,
            'upazila' => $request->customer_upazila,
        ]);
        return redirect()->back()->with('success', 'Address Updated Successfully');
    }

    public function loadpayment($slug1, $slug2)
    {
        if (Session::has('currency')) {
            $curr = Currency::find(Session::get('currency'));
        } else {
            $curr = Currency::where('is_default', '=', 1)->first();
        }
        $payment = $slug1;
        $pay_id = $slug2;
        $gateway = '';
        if ($pay_id != 0) {
            $gateway = PaymentGateway::findOrFail($pay_id);
        }
        return view('load.payment', compact('payment', 'pay_id', 'gateway', 'curr'));
    }

    public function checkout()
    {

        $this->code_image();
        if (!Session::has('cart')) {
            return redirect()->route('front.cart')->with('success', "You don't have any product to checkout.");
        }
        $gs = Generalsetting::findOrFail(1);
        $dp = 1;

        if (Session::has('currency')) {
            $curr = Currency::find(Session::get('currency'));
        } else {
            $curr = Currency::where('is_default', '=', 1)->first();
        }

        $paystack = PaymentGateway::whereKeyword('paystack')->first();
        $paystackData = $paystack->convertAutoData();

// If a user is Authenticated then there is no problm user can go for checkout

        if (Auth::guard('web')->check()) {
            $divisions = Division::all();

            $gateways = PaymentGateway::where('is_checkout', '=', 1)->get();
            $pickups = Pickup::all();
            $oldCart = Session::get('cart');
            $cart = new Cart($oldCart);
            $products = $cart->items;

            // Shipping Method

            $shipping_data = DB::table('shippings')->where('user_id', '=', 0)->get();

            // Packaging

            $package_data = DB::table('packages')->where('user_id', '=', 0)->get();

            foreach ($products as $prod) {
                if ($prod['item']['type'] == 'Physical') {
                    $dp = 0;
                    break;
                }
            }
            if ($dp == 1) {
                $ship = 0;
            }
            $total = $cart->totalPrice;
            $coupon = Session::has('coupon') ? Session::get('coupon') : 0;
            if ($gs->tax != 0) {
                $tax = ($total / 100) * $gs->tax;
                $total = $total + $tax;
            }
            if (!Session::has('coupon_total')) {
                $total = $total - $coupon;
                $total = $total + 0;
            } else {
                $total = Session::get('coupon_total');
                $total = $total;
            }
            $address = Address::where("user_id", auth()->user()->id)->first();

            return view('front.checkout', ['products' => $cart->items, 'totalPrice' => $total, 'pickups' => $pickups, 'totalQty' => $cart->totalQty, 'gateways' => $gateways, 'shipping_cost' => 0, 'digital' => $dp, 'curr' => $curr, 'shipping_data' => $shipping_data, 'package_data' => $package_data, 'paystackData' => $paystackData, "divisions" => $divisions, "address" => $address]);
        } else {

// If guest checkout is activated then user can go for checkout
            if ($gs->guest_checkout == 1) {
                $gateways = PaymentGateway::where('is_checkout', '=', 1)->get();
                $pickups = Pickup::all();
                $oldCart = Session::get('cart');
                $cart = new Cart($oldCart);
                $products = $cart->items;

                // Shipping Method

                $shipping_data = DB::table('shippings')->where('user_id', '=', 0)->get();

                // Packaging
                $package_data = DB::table('packages')->where('user_id', '=', 0)->get();

                foreach ($products as $prod) {
                    if ($prod['item']['type'] == 'Physical') {
                        $dp = 0;
                        break;
                    }
                }
                if ($dp == 1) {
                    $ship = 0;
                }
                $total = $cart->totalPrice;
                $coupon = Session::has('coupon') ? Session::get('coupon') : 0;
                if ($gs->tax != 0) {
                    $tax = ($total / 100) * $gs->tax;
                    $total = $total + $tax;
                }
                if (!Session::has('coupon_total')) {
                    $total = $total - $coupon;
                    $total = $total + 0;
                } else {
                    $total = Session::get('coupon_total');
                    $total = str_replace($curr->sign, '', $total) + round(0 * $curr->value, 2);
                }
                foreach ($products as $prod) {
                    if ($prod['item']['type'] != 'Physical') {
                        if (!Auth::guard('web')->check()) {
                            $ck = 1;
                            return view('front.checkout', ['products' => $cart->items, 'totalPrice' => $total, 'pickups' => $pickups, 'totalQty' => $cart->totalQty, 'gateways' => $gateways, 'shipping_cost' => 0, 'checked' => $ck, 'digital' => $dp, 'curr' => $curr, 'shipping_data' => $shipping_data, 'package_data' => $package_data, 'paystackData' => $paystackData]);
                        }
                    }
                }
                return view('front.checkout', ['products' => $cart->items, 'totalPrice' => $total, 'pickups' => $pickups, 'totalQty' => $cart->totalQty, 'gateways' => $gateways, 'shipping_cost' => 0, 'digital' => $dp, 'curr' => $curr, 'shipping_data' => $shipping_data, 'package_data' => $package_data, 'paystackData' => $paystackData]);
            }

// If guest checkout is Deactivated then display pop up form with proper error message

            else {

                $gateways = PaymentGateway::where('status', '=', 1)->get();
                $pickups = Pickup::all();
                $oldCart = Session::get('cart');
                $cart = new Cart($oldCart);
                $products = $cart->items;

                // Shipping Method
                $shipping_data = DB::table('shippings')->where('user_id', '=', 0)->get();

                // Packaging
                $package_data = DB::table('packages')->where('user_id', '=', 0)->get();

                $total = $cart->totalPrice;
                $coupon = Session::has('coupon') ? Session::get('coupon') : 0;
                if ($gs->tax != 0) {
                    $tax = ($total / 100) * $gs->tax;
                    $total = $total + $tax;
                }
                if (!Session::has('coupon_total')) {
                    $total = $total - $coupon;
                    $total = $total + 0;
                } else {
                    $total = Session::get('coupon_total');
                    $total = $total + round(0 * $curr->value, 2);
                }
                $ck = 1;
                return view('front.checkout', ['products' => $cart->items, 'totalPrice' => $total, 'pickups' => $pickups, 'totalQty' => $cart->totalQty, 'gateways' => $gateways, 'shipping_cost' => 0, 'checked' => $ck, 'digital' => $dp, 'curr' => $curr, 'shipping_data' => $shipping_data, 'package_data' => $package_data]);
            }
        }

    }

    public function cashondelivery(Request $request)
    {

        if ($request->pass_check) {
            $users = User::where('email', '=', $request->personal_email)->get();
            if (count($users) == 0) {
                if ($request->personal_pass == $request->personal_confirm) {
                    $user = new User;
                    $user->name = $request->personal_name;
                    $user->email = $request->personal_email;
                    $user->password = bcrypt($request->personal_pass);
                    $token = md5(time() . $request->personal_name . $request->personal_email);
                    $user->verification_link = $token;
                    $user->affilate_code = md5($request->name . $request->email);
                    $user->emai_verified = 'Yes';
                    $user->save();
                    Auth::guard('web')->login($user);
                } else {
                    return redirect()->back()->with('unsuccess', "Confirm Password Doesn't Match.");
                }
            } else {
                return redirect()->back()->with('unsuccess', "This Email Already Exist.");
            }
        }

        if (!Session::has('cart')) {
            return redirect()->route('front.cart')->with('success', "You don't have any product to checkout.");
        }
        if (Session::has('currency')) {
            $curr = Currency::find(Session::get('currency'));
        } else {
            $curr = Currency::where('is_default', '=', 1)->first();
        }
        $gs = Generalsetting::findOrFail(1);
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $commission = 0;
        $totalQty = 0;
        foreach ($cart->items as $key => $prod) {
            $totalQty += $prod['qty'];
            if ($prod['item']['user_id'] != 0) {
                $cproduct = Product::findOrFail($prod['item']['id']);
                if ($prod['item']->category->commission != 0) {
                    $inPrice = $cproduct->price + $cproduct->price * $prod['item']->category->commission / 100;
                } else {
                    $inPrice = $cproduct->price + $gs->fixed_commission + ($cproduct->price / 100) * $gs->percentage_commission;
                }
                $commission += $inPrice - $cproduct->price;
            }
            if (!empty($prod['item']['license']) && !empty($prod['item']['license_qty'])) {
                foreach ($prod['item']['license_qty'] as $ttl => $dtl) {
                    if ($dtl != 0) {
                        $dtl--;
                        $produc = Product::findOrFail($prod['item']['id']);
                        $temp = $produc->license_qty;
                        $temp[$ttl] = $dtl;
                        $final = implode(',', $temp);
                        $produc->license_qty = $final;
                        $produc->update();
                        $temp = $produc->license;
                        $license = $temp[$ttl];
                        $oldCart = Session::has('cart') ? Session::get('cart') : null;
                        $cart = new Cart($oldCart);
                        $cart->updateLicense($prod['item']['id'], $license);
                        Session::put('cart', $cart);
                        break;
                    }
                }
            }
        }
        $address = Address::where("user_id", auth()->user()->id)->first();
        if (!$address) {
            $address = Address::create([
                'user_id' => Auth::user()->id,
                'name' => $request->name,
                'email' => $request->email,
                'mobile' => $request->phone,
                'address' => $request->address,
                'division' => $request->customer_division,
                'district' => $request->customer_district,
                'district' => $request->customer_district,
                'upazila' => $request->customer_upazila,
            ]);
        }

        $order = new Order;
        $success_url = action('Front\PaymentController@payreturn');
        $item_name = $gs->title . " Order";
        $item_number = Str::random(10);
        $order['user_id'] = $request->user_id;

        $new_cart = [];
        $new_cart['totalQty'] = $totalQty;
        $order['totalQty'] = $totalQty;
        $new_cart['totalPrice'] = $cart->totalPrice;
        $new_cart['items'] = $cart->items;
        $new_cart = json_encode($new_cart, true);
        $order['cart'] = $new_cart;
        $order['pay_amount'] = round($request->total / $curr->value, 2);
        $order['method'] = $request->method;
        $order['shipping'] = $request->shipping;
        $order['pickup_location'] = $request->pickup_location;
        $order['customer_email'] = $address->email;
        $order['customer_name'] = $address->name;
        $order['shipping_cost'] = $request->shipping_cost;
        $order['packing_cost'] = $request->packing_cost;
        // $order['tax'] = Session::get('current_tax');

/*
if ($request->tax_type == 'state_tax') {
dd($order['tax_location']);
$order['tax_location'] = State::findOrFail($request['tax'])->state;
} else {
dd($order['tax']);
$order['tax_location'] = Country::findOrFail($request['tax'])->country_name;
}
 */

        $order['customer_phone'] = $address->mobile;
        $order['order_number'] = Str::random(10);
        $order['customer_address'] = $address->address;
        $order['customer_division'] = $address->division;
        $order['customer_district'] = $address->district;
        $order['customer_upazila'] = $address->upazila;
        $order['customer_zip'] = $address->zip;
        $order['shipping_email'] = $request->shipping_email;
        $order['shipping_name'] = $request->shipping_name;
        $order['shipping_phone'] = $request->shipping_phone;
        $order['shipping_address'] = $request->shipping_address;
        $order['shipping_division'] = $request->shipping_division;
        $order['shipping_district'] = $request->shipping_district;
        $order['shipping_upazila'] = $request->shipping_upazila;
        $order['shipping_zip'] = $request->shipping_zip;
        $order['order_note'] = $request->order_notes;
        $order['coupon_code'] = $request->coupon_code;
        $order['coupon_discount'] = $request->coupon_discount;
        $order['dp'] = $request->dp;
        $order['commission'] = $commission;
        $order['payment_status'] = "Pending";
        $order['currency_sign'] = $curr->sign;
        $order['currency_value'] = $curr->value;
        $order['wallet_price'] = round($request->wallet_price / $curr->value, 2);
        if (Session::has('affilate')) {
            $val = $request->total / $curr->value;
            $val = $val / 100;
            $sub = $val * $gs->affilate_charge;
            $order['affilate_user'] = Session::get('affilate');
            $order['affilate_charge'] = $sub;
        }
        $order->save();

        if (Auth::check()) {
            if ($gs->is_reward == 1) {
                $num = $order->pay_amount;

                $rewards = Reward::get();
                foreach ($rewards as $i) {
                    $smallest[$i->order_amount] = abs($i->order_amount - $num);
                }

                asort($smallest);
                $final_reword = Reward::where('order_amount', key($smallest))->first();
                Auth::user()->update(['reward' => (Auth::user()->reward + $final_reword->reward)]);
            }

            $user_amount = Auth::user()->balance;
            $pay_amount = $order->wallet_price;
            $sub = $user_amount - $pay_amount;
            Auth::user()->update(['balance' => $sub]);
        }

        if ($order->user_id != 0 && $order->wallet_price != 0) {
            $transaction = new \App\Models\Transaction;
            $transaction->txn_number = Str::random(3) . substr(time(), 6, 8) . Str::random(3);
            $transaction->user_id = $order->user_id;
            $transaction->amount = $order->wallet_price;
            $transaction->currency_sign = $order->currency_sign;
            $transaction->currency_code = \App\Models\Currency::where('sign', $order->currency_sign)->first()->name;
            $transaction->currency_value = $order->currency_value;
            $transaction->details = 'Payment Via Wallet';
            $transaction->type = 'minus';
            $transaction->save();
        }

        $track = new OrderTrack;
        $track->title = 'Pending';
        $track->text = 'You have successfully placed your order.';
        $track->order_id = $order->id;

        $track->save();

        $notification = new Notification;
        $notification->order_id = $order->id;
        $notification->save();
        if ($request->coupon_id != "") {
            $coupon = Coupon::findOrFail($request->coupon_id);
            $coupon->used++;
            if ($coupon->times != null) {
                $i = (int) $coupon->times;
                $i--;
                $coupon->times = (string) $i;
            }
            $coupon->update();

        }

        foreach ($cart->items as $prod) {
            $x = (string) $prod['size_qty'];
            if (!empty($x)) {
                $product = Product::findOrFail($prod['item']['id']);
                $x = (int) $x;
                $x = $x - $prod['qty'];
                $temp = $product->size_qty;
                $temp[$prod['size_key']] = $x;
                $temp1 = implode(',', $temp);
                $product->size_qty = $temp1;
                $product->update();
            }
        }

        foreach ($cart->items as $prod) {
            $x = (string) $prod['stock'];
            if ($x != null) {

                $product = Product::findOrFail($prod['item']['id']);
                $product->stock = $prod['stock'];
                $product->update();
                if ($product->stock <= 5) {
                    $notification = new Notification;
                    $notification->product_id = $product->id;
                    $notification->save();
                }
            }
        }

        $notf = null;

        if (!empty($notf)) {
            $users = array_unique($notf);
            foreach ($users as $user) {
                $notification = new UserNotification;
                $notification->user_id = $user;
                $notification->order_number = $order->order_number;
                $notification->save();
            }
        }
        Session::put('temporder_id', $order->id);
        Session::put('tempcart', $cart);
        Session::forget('cart');
        Session::forget('already');
        Session::forget('coupon');
        Session::forget('coupon_total');
        Session::forget('coupon_total1');
        Session::forget('coupon_percentage');

        //Sending Email To Buyer
        if ($gs->is_smtp == 1) {
            $data = [
                'to' => $order->shipping_email ? $order->shipping_email : $order->customer_email,
                'type' => "new_order",
                'cname' => $order->shipping_name ? $order->shipping_name : $order->customer_name,
                'oamount' => "",
                'aname' => "",
                'aemail' => "",
                'wtitle' => "",
                'onumber' => $order->order_number,
            ];

            $mailer = new GeniusMailer();
            $mailer->sendAutoOrderMail($data, $order->id);
        } else {
            $to = $order->shipping_email ? $order->shipping_email : $order->customer_email;
            $subject = "Your Order Placed!!";
            $msg = "Hello " . $order->shipping_name ? $order->shipping_name : $order->customer_name . "!\nYou have placed a new order.\nYour order number is " . $order->order_number . ".Please wait for your delivery. \nThank you.";
            $headers = "From: " . $gs->from_name . "<" . $gs->from_email . ">";
            mail($to, $subject, $msg, $headers);
        }
        //Sending Email To Admin
        if ($gs->is_smtp == 1) {
            $data = [
                'to' => Pagesetting::find(1)->contact_email,
                'subject' => "New Order Recieved!!",
                'body' => "Hello Admin!<br>Your store has received a new order.<br>Order Number is " . $order->order_number . ".Please login to your panel to check. <br>Thank you.",
            ];

            $mailer = new GeniusMailer();
            $mailer->sendCustomMail($data);
        } else {
            $to = Pagesetting::find(1)->contact_email;
            $subject = "New Order Recieved!!";
            $msg = "Hello Admin!\nYour store has recieved a new order.\nOrder Number is " . $order->order_number . ".Please login to your panel to check. \nThank you.";
            $headers = "From: " . $gs->from_name . "<" . $gs->from_email . ">";
            mail($to, $subject, $msg, $headers);
        }

        return redirect($success_url);
    }

    public function gateway(Request $request)
    {

        $input = $request->all();

        $rules = [
            'txn_id4' => 'required',
        ];

        $messages = [
            'required' => 'The Transaction ID field is required.',
        ];

        $validator = Validator::make($input, $rules, $messages);

        if ($validator->fails()) {
            Session::flash('unsuccess', $validator->messages()->first());
            return redirect()->back()->withInput();
        }

        if ($request->pass_check) {
            $users = User::where('email', '=', $request->personal_email)->get();
            if (count($users) == 0) {
                if ($request->personal_pass == $request->personal_confirm) {
                    $user = new User;
                    $user->name = $request->personal_name;
                    $user->email = $request->personal_email;
                    $user->password = bcrypt($request->personal_pass);
                    $token = md5(time() . $request->personal_name . $request->personal_email);
                    $user->verification_link = $token;
                    $user->affilate_code = md5($request->name . $request->email);
                    $user->email_verified = 'Yes';
                    $user->save();
                    Auth::guard('web')->login($user);
                } else {
                    return redirect()->back()->with('unsuccess', "Confirm Password Doesn't Match.");
                }
            } else {
                return redirect()->back()->with('unsuccess', "This Email Already Exist.");
            }
        }

        $gs = Generalsetting::findOrFail(1);
        if (!Session::has('cart')) {
            return redirect()->route('front.cart')->with('success', "You don't have any product to checkout.");
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        if (Session::has('currency')) {
            $curr = Currency::find(Session::get('currency'));
        } else {
            $curr = Currency::where('is_default', '=', 1)->first();
        }
        $commission = 0;
        $totalQty = 0;
        foreach ($cart->items as $key => $prod) {
            $totalQty += $prod['qty'];
            if ($prod['item']['user_id'] != 0) {
                $cproduct = Product::findOrFail($prod['item']['id']);
                if ($prod['item']->category->commission != 0) {
                    $inPrice = $cproduct->price + $cproduct->price * $prod['item']->category->commission / 100;
                } else {
                    $inPrice = $cproduct->price + $gs->fixed_commission + ($cproduct->price / 100) * $gs->percentage_commission;
                }
                $commission += $inPrice - $cproduct->price;
            }
            if (!empty($prod['item']['license']) && !empty($prod['item']['license_qty'])) {
                foreach ($prod['item']['license_qty'] as $ttl => $dtl) {
                    if ($dtl != 0) {
                        $dtl--;
                        $produc = Product::findOrFail($prod['item']['id']);
                        $temp = $produc->license_qty;
                        $temp[$ttl] = $dtl;
                        $final = implode(',', $temp);
                        $produc->license_qty = $final;
                        $produc->update();
                        $temp = $produc->license;
                        $license = $temp[$ttl];
                        $oldCart = Session::has('cart') ? Session::get('cart') : null;
                        $cart = new Cart($oldCart);
                        $cart->updateLicense($prod['item']['id'], $license);
                        Session::put('cart', $cart);
                        break;
                    }
                }
            }
        }
        $settings = Generalsetting::findOrFail(1);
        $address = Address::where("user_id", auth()->user()->id)->first();
        if (!$address) {
            $address = Address::create([
                'user_id' => Auth::user()->id,
                'name' => $request->name,
                'email' => $request->email,
                'mobile' => $request->phone,
                'address' => $request->address,
                'division' => $request->customer_division,
                'district' => $request->customer_district,
                'district' => $request->customer_district,
                'upazila' => $request->customer_upazila,
            ]);
        }

        $order = new Order;
        $success_url = action('Front\PaymentController@payreturn');
        $order['user_id'] = $request->user_id;
        $new_cart = [];
        $new_cart['totalQty'] = $totalQty;
        $order['totalQty'] = $totalQty;
        $new_cart['totalPrice'] = $cart->totalPrice;
        $new_cart['items'] = $cart->items;
        $new_cart = json_encode($new_cart, true);
        $order['cart'] = $new_cart;
        $order['pay_amount'] = round($request->total / $curr->value, 2);
        $order['method'] = $request->method;
        $order['shipping'] = $request->shipping;
        $order['pickup_location'] = $request->pickup_location;
        $order['customer_email'] = $request->email;
        $order['customer_name'] = $request->name;
        $order['shipping_cost'] = $request->shipping_cost;
        $order['packing_cost'] = $request->packing_cost;
        // $order['tax'] = Session::get('current_tax');

        /*
        if ($request->tax_type == 'state_tax') {
        $order['tax_location'] = State::findOrFail($request['tax'])->state;
        } else {
        $order['tax_location'] = Country::findOrFail($request['tax'])->country_name;
        }
         */
        $order['customer_phone'] = $address->mobile;
        $order['order_number'] = Str::random(10);
        $order['customer_address'] = $request->address;
        $order['customer_division'] = $request->customer_division;
        $order['customer_district'] = $request->customer_district;
        $order['customer_upazila'] = $request->customer_upazila;
        $order['customer_zip'] = $request->zip;
        $order['shipping_email'] = $request->shipping_email;
        $order['shipping_name'] = $request->shipping_name;
        $order['shipping_phone'] = $request->shipping_phone;
        $order['shipping_address'] = $request->shipping_address;
        $order['shipping_division'] = $request->shipping_division;
        $order['shipping_district'] = $request->shipping_district;
        $order['shipping_upazila'] = $request->shipping_upazila;
        $order['shipping_zip'] = $request->shipping_zip;
        $order['order_note'] = $request->order_notes;
        $order['txnid'] = $request->txn_id4;
        $order['coupon_code'] = $request->coupon_code;
        $order['coupon_discount'] = $request->coupon_discount;
        $order['dp'] = $request->dp;
        $order['commission'] = $commission;
        $order['payment_status'] = "Pending";
        $order['currency_sign'] = $curr->sign;
        $order['currency_value'] = $curr->value;
        $order['wallet_price'] = round($request->wallet_price / $curr->value, 2);
        if (Session::has('affilate')) {
            $val = $request->total / $curr->value;
            $val = $val / 100;
            $sub = $val * $gs->affilate_charge;
            $order['affilate_user'] = Session::get('affilate');
            $order['affilate_charge'] = $sub;
        }
        $order->save();

        if (Auth::check()) {
            if ($settings->is_reward == 1) {
                $num = $order->pay_amount;

                $rewards = Reward::get();
                foreach ($rewards as $i) {
                    $smallest[$i->order_amount] = abs($i->order_amount - $num);
                }

                asort($smallest);
                $final_reword = Reward::where('order_amount', key($smallest))->first();
                Auth::user()->update(['reward' => (Auth::user()->reward + $final_reword->reward)]);
            }

            $user_amount = Auth::user()->balance;
            $pay_amount = $order->wallet_price;
            $sub = $user_amount - $pay_amount;
            Auth::user()->update(['balance' => $sub]);
        }

        if ($order->user_id != 0 && $order->wallet_price != 0) {
            $transaction = new \App\Models\Transaction;
            $transaction->txn_number = Str::random(3) . substr(time(), 6, 8) . Str::random(3);
            $transaction->user_id = $order->user_id;
            $transaction->amount = $order->wallet_price;
            $transaction->currency_sign = $order->currency_sign;
            $transaction->currency_code = \App\Models\Currency::where('sign', $order->currency_sign)->first()->name;
            $transaction->currency_value = $order->currency_value;
            $transaction->details = 'Payment Via Wallet';
            $transaction->type = 'minus';
            $transaction->save();
        }

        $track = new OrderTrack;
        $track->title = 'Pending';
        $track->text = 'You have successfully placed your order.';
        $track->order_id = $order->id;
        $track->save();

        $notification = new Notification;
        $notification->order_id = $order->id;
        $notification->save();
        if ($request->coupon_id != "") {
            $coupon = Coupon::findOrFail($request->coupon_id);
            $coupon->used++;
            if ($coupon->times != null) {
                $i = (int) $coupon->times;
                $i--;
                $coupon->times = (string) $i;
            }
            $coupon->update();

        }

        foreach ($cart->items as $prod) {
            $x = (string) $prod['size_qty'];
            if (!empty($x)) {
                $product = Product::findOrFail($prod['item']['id']);
                $x = (int) $x;
                $x = $x - $prod['qty'];
                $temp = $product->size_qty;
                $temp[$prod['size_key']] = $x;
                $temp1 = implode(',', $temp);
                $product->size_qty = $temp1;
                $product->update();
            }
        }

        foreach ($cart->items as $prod) {
            $x = (string) $prod['stock'];
            if ($x != null) {

                $product = Product::findOrFail($prod['item']['id']);
                $product->stock = $prod['stock'];
                $product->update();
                if ($product->stock <= 5) {
                    $notification = new Notification;
                    $notification->product_id = $product->id;
                    $notification->save();
                }
            }
        }

        $notf = null;

        if (!empty($notf)) {
            $users = array_unique($notf);
            foreach ($users as $user) {
                $notification = new UserNotification;
                $notification->user_id = $user;
                $notification->order_number = $order->order_number;
                $notification->save();
            }
        }

        Session::put('temporder_id', $order->id);
        Session::put('tempcart', $cart);
        Session::forget('cart');
        Session::forget('already');
        Session::forget('coupon');
        Session::forget('coupon_total');
        Session::forget('coupon_total1');
        Session::forget('coupon_percentage');

        //Sending Email To Buyer
        if ($gs->is_smtp == 1) {
            $data = [
                'to' => $request->email,
                'type' => "new_order",
                'cname' => $request->name,
                'oamount' => "",
                'aname' => "",
                'aemail' => "",
                'wtitle' => "",
                'onumber' => $order->order_number,
            ];

            $mailer = new GeniusMailer();
            $mailer->sendAutoOrderMail($data, $order->id);
        } else {
            $to = $request->email;
            $subject = "Your Order Placed!!";
            $msg = "Hello " . $request->name . "!\nYou have placed a new order.\nYour order number is " . $order->order_number . ".Please wait for your delivery. \nThank you.";
            $headers = "From: " . $gs->from_name . "<" . $gs->from_email . ">";
            mail($to, $subject, $msg, $headers);
        }
        //Sending Email To Admin
        if ($gs->is_smtp == 1) {
            $data = [
                'to' => Pagesetting::find(1)->contact_email,
                'subject' => "New Order Recieved!!",
                'body' => "Hello Admin!<br>Your store has received a new order.<br>Order Number is " . $order->order_number . ".Please login to your panel to check. <br>Thank you.",
            ];

            $mailer = new GeniusMailer();
            $mailer->sendCustomMail($data);
        } else {
            $to = Pagesetting::find(1)->contact_email;
            $subject = "New Order Recieved!!";
            $msg = "Hello Admin!\nYour store has recieved a new order.\nOrder Number is " . $order->order_number . ".Please login to your panel to check. \nThank you.";
            $headers = "From: " . $gs->from_name . "<" . $gs->from_email . ">";
            mail($to, $subject, $msg, $headers);
        }

        return redirect($success_url);
    }

    // Capcha Code Image
    private function code_image()
    {
        $actual_path = str_replace('project', '', base_path());

        $image = imagecreatetruecolor(200, 50);
        $background_color = imagecolorallocate($image, 255, 255, 255);
        imagefilledrectangle($image, 0, 0, 200, 50, $background_color);

        $pixel = imagecolorallocate($image, 0, 0, 255);
        for ($i = 0; $i < 500; $i++) {
            imagesetpixel($image, rand() % 200, rand() % 50, $pixel);
        }

        $font = $actual_path . '/public/assets/front/fonts/NotoSans-Bold.ttf';

        $allowed_letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $length = strlen($allowed_letters);
        $letter = $allowed_letters[rand(0, $length - 1)];
        $word = '';
        //$text_color = imagecolorallocate($image, 8, 186, 239);
        $text_color = imagecolorallocate($image, 0, 0, 0);
        $cap_length = 6; // No. of character in image

        for ($i = 0; $i < $cap_length; $i++) {
            $letter = $allowed_letters[rand(0, $length - 1)];
            imagettftext($image, 25, 1, 35 + ($i * 25), 35, $text_color, $font, $letter);
            $word .= $letter;
        }
        $pixels = imagecolorallocate($image, 8, 186, 239);
        for ($i = 0; $i < 500; $i++) {
            imagesetpixel($image, rand() % 200, rand() % 50, $pixels);
        }
        session(['captcha_string' => $word]);
        imagepng($image, $actual_path . "/public/assets/images/capcha_code.png");
    }

    public function wallet(Request $request)
    {

        if ($request->pass_check) {
            $users = User::where('email', '=', $request->personal_email)->get();
            if (count($users) == 0) {
                if ($request->personal_pass == $request->personal_confirm) {
                    $user = new User;
                    $user->name = $request->personal_name;
                    $user->email = $request->personal_email;
                    $user->password = bcrypt($request->personal_pass);
                    $token = md5(time() . $request->personal_name . $request->personal_email);
                    $user->verification_link = $token;
                    $user->affilate_code = md5($request->name . $request->email);
                    $user->email_verified = 'Yes';
                    $user->save();
                    Auth::guard('web')->login($user);
                } else {
                    return redirect()->back()->with('unsuccess', "Confirm Password Doesn't Match.");
                }
            } else {
                return redirect()->back()->with('unsuccess', "This Email Already Exist.");
            }
        }

        if (!Session::has('cart')) {
            return redirect()->route('front.cart')->with('success', "You don't have any product to checkout.");
        }
        if (Session::has('currency')) {
            $curr = Currency::find(Session::get('currency'));
        } else {
            $curr = Currency::where('is_default', '=', 1)->first();
        }
        $gs = Generalsetting::findOrFail(1);
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $totalQty = 0;
        foreach ($cart->items as $key => $prod) {
            $totalQty += $prod['qty'];

            if (!empty($prod['item']['license']) && !empty($prod['item']['license_qty'])) {
                foreach ($prod['item']['license_qty'] as $ttl => $dtl) {
                    if ($dtl != 0) {
                        $dtl--;
                        $produc = Product::findOrFail($prod['item']['id']);
                        $temp = $produc->license_qty;
                        $temp[$ttl] = $dtl;
                        $final = implode(',', $temp);
                        $produc->license_qty = $final;
                        $produc->update();
                        $temp = $produc->license;
                        $license = $temp[$ttl];
                        $oldCart = Session::has('cart') ? Session::get('cart') : null;
                        $cart = new Cart($oldCart);
                        $cart->updateLicense($prod['item']['id'], $license);
                        Session::put('cart', $cart);
                        break;
                    }
                }
            }
        }
        $order = new Order;

        $success_url = action('Front\PaymentController@payreturn');

        $order['user_id'] = $request->user_id;
        $new_cart = [];
        $new_cart['totalQty'] = $totalQty;
        $new_cart['totalPrice'] = $cart->totalPrice;
        $new_cart['items'] = $cart->items;
        $new_cart = json_encode($new_cart, true);
        $order['totalQty'] = $totalQty;
        $order['cart'] = $new_cart;
        $order['pay_amount'] = round($request->total / $curr->value, 2);
        $order['method'] = 'Wallet';
        $order['shipping'] = $request->shipping;
        $order['pickup_location'] = $request->pickup_location;
        $order['customer_email'] = $request->email;
        $order['customer_name'] = $request->name;
        $order['shipping_cost'] = $request->shipping_cost;
        $order['packing_cost'] = $request->packing_cost;
        $order['tax'] = Session::get('current_tax');
        if ($request->tax_type == 'state_tax') {
            $order['tax_location'] = State::findOrFail($request['tax'])->state;
        } else {
            $order['tax_location'] = Country::findOrFail($request['tax'])->country_name;
        }
        $order['customer_phone'] = $request->phone;
        $order['order_number'] = Str::random(10);
        $order['customer_address'] = $request->address;
        $order['customer_country'] = $request->customer_country;
        $order['customer_city'] = $request->city;
        $order['customer_zip'] = $request->zip;
        $order['shipping_email'] = $request->shipping_email;
        $order['shipping_name'] = $request->shipping_name;
        $order['shipping_phone'] = $request->shipping_phone;
        $order['shipping_address'] = $request->shipping_address;
        $order['shipping_country'] = $request->shipping_country;
        $order['shipping_city'] = $request->shipping_city;
        $order['shipping_zip'] = $request->shipping_zip;
        $order['order_note'] = $request->order_notes;
        $order['coupon_code'] = $request->coupon_code;
        $order['coupon_discount'] = $request->coupon_discount;
        $order['dp'] = $request->dp;

        $order['payment_status'] = "Pending";
        $order['txnid'] = Str::random(8);
        $order['currency_sign'] = $curr->sign;
        $order['currency_value'] = $curr->value;
        $order['wallet_price'] = round($request->wallet_price / $curr->value, 2);

        if ($order['dp'] == 1) {
            $order['status'] = 'completed';
        }
        if (Session::has('affilate')) {

            $val = $request->total / $curr->value;
            $val = $val / 100;
            $sub = $val * $gs->affilate_charge;
            $user = User::find(Session::get('affilate'));
            if ($user) {
                if ($order['dp'] == 1) {
                    $user->affilate_income += $sub;
                    $user->update();
                }

                $order['affilate_user'] = $user->id;
                $order['affilate_charge'] = $sub;
            }
        }
        $order->save();

        if (Auth::check()) {
            $user_amount = Auth::user()->balance;
            $pay_amount = $order->wallet_price;
            $sub = $user_amount - $pay_amount;
            Auth::user()->update(['balance' => $sub]);
        }

        $track = new OrderTrack;
        $track->title = 'Pending';
        $track->text = 'You have successfully placed your order.';
        $track->order_id = $order->id;
        $track->save();

        $notification = new Notification;
        $notification->order_id = $order->id;
        $notification->save();
        if ($request->coupon_id != "") {
            $coupon = Coupon::findOrFail($request->coupon_id);
            $coupon->used++;
            if ($coupon->times != null) {
                $i = (int) $coupon->times;
                $i--;
                $coupon->times = (string) $i;
            }
            $coupon->update();

        }

        foreach ($cart->items as $prod) {
            $x = (string) $prod['size_qty'];
            if (!empty($x)) {
                $product = Product::findOrFail($prod['item']['id']);
                $x = (int) $x;
                $x = $x - $prod['qty'];
                $temp = $product->size_qty;
                $temp[$prod['size_key']] = $x;
                $temp1 = implode(',', $temp);
                $product->size_qty = $temp1;
                $product->update();
            }
        }

        foreach ($cart->items as $prod) {
            $x = (string) $prod['stock'];
            if ($x != null) {

                $product = Product::findOrFail($prod['item']['id']);
                $product->stock = $prod['stock'];
                $product->update();
                if ($product->stock <= 5) {
                    $notification = new Notification;
                    $notification->product_id = $product->id;
                    $notification->save();
                }
            }
        }

        $notf = null;

        if (!empty($notf)) {
            $users = array_unique($notf);
            foreach ($users as $user) {
                $notification = new UserNotification;
                $notification->user_id = $user;
                $notification->order_number = $order->order_number;
                $notification->save();
            }
        }

        if ($order->user_id != 0 && $order->wallet_price != 0) {
            $transaction = new Transaction();
            $transaction->txn_number = Str::random(3) . substr(time(), 6, 8) . Str::random(3);
            $transaction->user_id = $order->user_id;
            $transaction->amount = $order->wallet_price;
            $transaction->currency_sign = $order->currency_sign;
            $transaction->currency_code = Currency::where('sign', $order->currency_sign)->first()->name;
            $transaction->currency_value = $order->currency_value;
            $transaction->details = 'Payment Via Wallet';
            $transaction->type = 'minus';
            $transaction->save();
        }

        //Sending Email To Buyer

        if ($gs->is_smtp == 1) {
            $data = [
                'to' => $request->email,
                'type' => "new_order",
                'cname' => $request->name,
                'oamount' => "",
                'aname' => "",
                'aemail' => "",
                'wtitle' => "",
                'onumber' => $order->order_number,
            ];

            $mailer = new GeniusMailer();
            $mailer->sendAutoOrderMail($data, $order->id);
        } else {
            $to = $request->email;
            $subject = "Your Order Placed!!";
            $msg = "Hello " . $request->name . "!\nYou have placed a new order.\nYour order number is " . $order->order_number . ".Please wait for your delivery. \nThank you.";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= "From: " . $gs->from_name . "<" . $gs->from_email . ">";
            mail($to, $subject, $msg, $headers);
        }
        //Sending Email To Admin
        if ($gs->is_smtp == 1) {
            $data = [
                'to' => Pagesetting::find(1)->contact_email,
                'subject' => "New Order Recieved!!",
                'body' => "Hello Admin!<br>Your store has received a new order.<br>Order Number is " . $order->order_number . ".Please login to your panel to check. <br>Thank you.",
            ];

            $mailer = new GeniusMailer();
            $mailer->sendCustomMail($data);
        } else {
            $to = Pagesetting::find(1)->contact_email;
            $subject = "New Order Recieved!!";
            $msg = "Hello Admin!\nYour store has recieved a new order.\nOrder Number is " . $order->order_number . ".Please login to your panel to check. \nThank you.";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= "From: " . $gs->from_name . "<" . $gs->from_email . ">";
            mail($to, $subject, $msg, $headers);
        }

        Session::put('temporder_id', $order->id);
        Session::put('tempcart', $cart);
        Session::forget('cart');
        Session::forget('already');
        Session::forget('coupon');
        Session::forget('coupon_total');
        Session::forget('coupon_total1');
        Session::forget('coupon_percentage');

        return redirect($success_url);
    }

}