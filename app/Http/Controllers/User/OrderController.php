<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Refund;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function orders()
    {
        $user = Auth::guard('web')->user();
        $orders = Order::where('user_id', '=', $user->id)->orderBy('id', 'desc')->get();
        return view('user.order.index', compact('user', 'orders'));
    }

    public function ordertrack()
    {
        $user = Auth::guard('web')->user();
        return view('user.order-track', compact('user'));
    }

    public function trackload($id)
    {
        $order = Order::where('order_number', '=', $id)->first();
        $datas = array('Pending', 'Processing', 'On Delivery', 'Completed');
        return view('load.track-load', compact('order', 'datas'));

    }

    public function orderCancel($order_id)
    {
        $user = Auth::user();
        $order = Order::where('user_id', $user->id)->where('id', $order_id)->first();
        $order->status = 'declined';
        $order->update();
        $addTotal = $order->pay_amount + $order->wellet_price;
        $user->balance = $user->balance + $addTotal;
        $user->update();
        return redirect(route('user-orders'))->with('success', 'Order Cancel Successfully');

    }

    public function orderRefund(Request $request)
    {

        $data = new Refund();
        $data->user_id = $request->user_id;
        $data->order_number = $request->order_number;
        $data->message = $request->message;
        $data->created_at = Carbon::now();
        $data->save();
        return redirect(route('user-orders'))->with('success', 'Order Refund Request Submit Successfully');
    }

    public function cancelRefund($order_number)
    {
        $data = Refund::where('order_number', $order_number)->first();
        if ($data) {
            $data->delete();
            return redirect(route('user-orders'))->with('success', 'Order Refund Request Cancel Successfully');
        } else {
            return redirect(route('user-orders'))->with('success', 'Somthing is wrong');
        }

    }

    public function order($id)
    {
        $user = Auth::guard('web')->user();
        $order = Order::findOrfail($id);
        $cart = json_decode($order->cart, true);
        return view('user.order.details', compact('user', 'order', 'cart'));
    }

    public function orderdownload($slug, $id)
    {
        $user = Auth::guard('web')->user();
        $order = Order::where('order_number', '=', $slug)->first();
        $prod = Product::findOrFail($id);
        if (!isset($order) || $prod->type == 'Physical' || $order->user_id != $user->id) {
            return redirect()->back();
        }
        return response()->download(public_path('assets/files/' . $prod->file));
    }

    public function orderprint($id)
    {
        $user = Auth::guard('web')->user();
        $order = Order::findOrfail($id);
        $cart = json_decode($order->cart, true);
        return view('user.order.print', compact('user', 'order', 'cart'));
    }

    public function trans()
    {
        $id = $_GET['id'];
        $trans = $_GET['tin'];
        $order = Order::findOrFail($id);
        $order->txnid = $trans;
        $order->update();
        $data = $order->txnid;
        return response()->json($data);
    }

}
