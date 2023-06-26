<?php

namespace App\Http\Controllers\User;

use App\Classes\GeniusMailer;
use App\Http\Controllers\Controller;
use App\Models\Currency;
use App\Models\Deposit;
use App\Models\Generalsetting;
use App\Models\PaymentGateway;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class DmercadopagoController extends Controller
{

    private $access_token;

    public function __construct()
    {
        //Set Spripe Keys
        $gs = Generalsetting::findOrFail(1);
        $this->access_token = $gs->mercado_token;
    }

    public function store(Request $request)
    {

        $user = Auth::user();
        if (Session::has('currency')) {
            $curr = Currency::find(Session::get('currency'));

        } else {
            $curr = Currency::where('is_default', '=', 1)->first();
        }
        $available_currency = array(
            'ARS',
            'BRL',
            'CLP',
            'MXN',
            'PEN',
            'UYU',
            'VEF',
            'USD',
        );
        if (!in_array($curr->name, $available_currency)) {
            return redirect()->back()->with('unsuccess', 'Invalid Currency For Mercadopago.');
        }

        $gateway_data = PaymentGateway::where('keyword', 'mercadopago')->first();
        $gateway = $gateway_data->convertAutoData();

        $cancel_url = action('User\DmercadopagoController@paycancle');
        $item_name = "Deposit via Mercadopago";

        $input = $request->all();

        $settings = Generalsetting::findOrFail(1);
        $success_url = action('User\DpaypalController@payreturn');
        $cancel_url = action('User\DpaypalController@paycancle');

        MercadoPago\SDK::setAccessToken($gateway['token']);
        $payment = new MercadoPago\Payment();
        $payment->transaction_amount = 100;
        $payment->token = $input['token'];
        $payment->description = $item_name;
        $payment->installments = 1;

        $payment->payer = array(
            "email" => Auth::user()->email,
        );
        $payment->save();

        if ($payment->status == 'approved') {

            $deposit = new Deposit;
            $deposit->user_id = $user->id;
            $deposit->currency = $curr->sign;
            $deposit->currency_code = $curr->name;
            $deposit->currency_value = $curr->value;
            $deposit->amount = $request->amount / $curr->value;
            $deposit->method = 'Stripe';
            $deposit->txnid = $payment->id;
            $deposit->status = 1;
            $deposit->save();

            $user = User::findOrFail($deposit->user_id);
            $balance = $user->balance + $deposit->amount;

            $user->update(['balance' => $balance]);

            // store in transaction table
            if ($deposit->status == 1) {
                $transaction = new Transaction;
                $transaction->txn_number = Str::random(3) . substr(time(), 6, 8) . Str::random(3);
                $transaction->user_id = $deposit->user_id;
                $transaction->amount = $deposit->amount;
                $transaction->user_id = $deposit->user_id;
                $transaction->currency_sign = $deposit->currency;
                $transaction->currency_code = $deposit->currency_code;
                $transaction->method = $deposit->method;
                $transaction->txnid = $deposit->txnid;
                $transaction->details = 'Payment Deposit';
                $transaction->type = 'plus';
                $transaction->save();
            }

            if ($settings->is_smtp == 1) {
                $maildata = [
                    'to' => $user->email,
                    'type' => "wallet_deposit",
                    'cname' => $user->name,
                    'damount' => ($deposit->amount * $deposit->currency_value),
                    'wbalance' => $user->balance,
                    'oamount' => "",
                    'aname' => "",
                    'aemail' => "",
                    'onumber' => "",
                ];
                $mailer = new GeniusMailer();
                $mailer->sendAutoMail($maildata);
            } else {
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headers .= "From: " . $settings->from_name . "<" . $settings->from_email . ">";
                mail($user->email, 'Balance has been added to your account. Your current balance is: $' . $user->balance, $headers);
            }

            return redirect($success_url);
        } else {
            return redirect($cancel_url);
        }

    }

}
