<?php

namespace App\Http\Controllers;

use App\Mail\OrderPaid;
use App\Mail\OrderReceived;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Srmklive\PayPal\Services\ExpressCheckout;

class PayPalController extends Controller
{

    //paypal express checkout initialization
    public function getExpressCheckout($orderId){

        $checkoutData = $this->checkoutData($orderId);
        //dd($checkoutData);
        $provider = new ExpressCheckout();
        $response = $provider->setExpressCheckout($checkoutData);
        //dd($response);
        return redirect($response['paypal_link']);

    }

    //paypal express checkout cancel url callback
    public function cancelPage(){
        return redirect()->route('index')->withError('Payment Unsuccessful');
    }

    //paypal express checkout billing
    public function getExpressCheckoutSuccess(Request $request, $orderId){
        $token = $request->get('token');
        $payerId = $request->get('PayerID');
        $checkoutData = $this->checkoutData($orderId);

        $provider = new ExpressCheckout();
        $response = $provider->getExpressCheckoutDetails($token);
        //dd($response);
        if(in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])){
            $payment_status = $provider->doExpressCheckoutPayment($checkoutData, $token, $payerId);
            //dd($payment_status);
            $status = $payment_status['PAYMENTINFO_0_PAYMENTSTATUS'];
            //dd($status);

                $order = Order::find($orderId);
                $order->is_paid = 1;
                $order->status = 'completed';
                $order->save();
                //dd($order);
                //sending mail
                $companyMail = 'asuarb@icloud.com';
                Mail::to($companyMail)->send(new OrderPaid($order));
                if(auth()->user()){
                    Mail::to($order->user->email)->send(new OrderReceived($order));

                    //empty the cart
                    \Cart::session(auth()->id())->clear();
                }else{
                    Mail::to($order->shipping_email)->send(new OrderReceived($order));
                    //empty the cart
                    \Cart::clear();
                }
            return redirect()->route('index')->withMessage('Payment Successful and Order Placed');
        }
    }

    private function checkoutData($orderId){
        if (auth()->user()) {
            $cartItems = array_map(function($item){
                return[
                    'name' => $item['name'],
                    'price' => $item['price'],
                    'qty' => $item['quantity']
                ];
            }, \Cart::session(auth()->id())->getContent()->toarray());
            $total = \Cart::session(auth()->id())->getTotal();
        }else{
            $cartItems = array_map(function($item){
                return[
                    'name' => $item['name'],
                    'price' => $item['price'],
                    'qty' => $item['quantity']
                ];
            }, \Cart::getContent()->toarray());
            $total = \Cart::getTotal();
        }
        //dd($cartItems);
        return $checkoutData = [
            'items' => $cartItems,
            'return_url' => route('paypal.success',$orderId),
            'cancel_url' => route('paypal.cancel'),
            'invoice_id' => uniqid(),
            'invoice_description' => "Book Purchase from Asuar Star Books Company",
            'total' => $total+3.99,
            'subtotal' => $total,
            'shipping' => 3.99
        ];
    }
}
