<?php

namespace App\Http\Controllers;

use App\Mail\OrderShipped;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Orders = Order::latest()->get();
        return view('admin.orders_index', ['Orders'=>$Orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'country' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'street' => 'required',
            'town' => 'required',
            'state' => 'required',
            'postcode' => 'required',
            'email' => 'required|email',
        ]);

        //dd($request);
        $order = new Order();

        $order->order_number = uniqid('OrderNum-');
        if(auth()->user()){
            $order->user_id = auth()->id();
            $order->order_by = auth()->user()->name;
            $subtotal = \Cart::session(auth()->id())->getTotal();
            $itemCount = \Cart::session(auth()->id())->getContent()->count();
            $cartItems = \Cart::session(auth()->id())->getContent();
        }else{
            $order->order_by = $request->input('lastname').' '.$request->input('firstname');
            $subtotal = \Cart::getTotal();
            $itemCount = \Cart::getContent()->count();
            $cartItems = \Cart::getContent();
        }
        $order->shipping_fullname = $request->input('lastname').' '.$request->input('firstname');
        $order->shipping_country = $request->input('country');
        $order->shipping_street = $request->input('street');
        $order->shipping_apartment = $request->input('apartment');
        $order->shipping_city = $request->input('town');
        $order->shipping_state = $request->input('state');
        $order->shipping_postcode = $request->input('postcode');
        $order->shipping_email = $request->input('email');
        $order->shipping_phone = $request->input('phone');


        if ($subtotal>0) {
            $grandTotal = $subtotal + 3.99;
        }else{
            return back()->withError('Add Items to Cart before Checkout');
        }
        $order->grand_total = $grandTotal;
        $order->item_count = $itemCount;

        //save order items
        $order->save();

        foreach ($cartItems as $item) {
            $order->items()->attach($item->id, ['price' => $item->price, 'quantity' => $item->quantity]);
         }

         //send email

         //payment
         return redirect()->route('paypal.checkout', $order->id);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $orderItems = $order->items()->get();
        //dd($orderItems);
        return view('admin.order_single', ['order'=>$order, 'orderItems'=>$orderItems]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //dd($request);
        if($request->input('shipped') == 1){
            $order->shipping_status = 'Processed';
            $order->save();
            Mail::to($order->shipping_email)->send(new OrderShipped($order));
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

}
