<?php

namespace App\Http\Controllers;

use App\Book;
use App\Country;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index(){
        if(auth()->user()){
            $cartItems = \Cart::session(auth()->id())->getContent();
        }else{
            $cartItems = \Cart::getContent();
        }
        //dd($cartItems);
        return view('cart.index', compact('cartItems'));
    }

    public function add($bookId){
        //dd($bookId);
        $book = Book::where('id',$bookId)->get();
        $book = $book->toArray();
        //dd($book);
        if(auth()->user()){
            \Cart::session(auth()->id())->add(array(
                'id' => $book[0]['id'],
                'name' => $book[0]['name'],
                'price' => $book[0]['price'],
                'quantity' => 1,
                'attributes' => array(),
                'associatedModel' => $book
            ));
        }
        else{
            \Cart::add(array(
                'id' => $book[0]['id'],
                'name' => $book[0]['name'],
                'price' => $book[0]['price'],
                'quantity' => 1,
                'attributes' => array(),
                'associatedModel' => $book
            ));
        }
        return back();
    }

    public function destroy($itemId){
        if(auth()->user()){
            \Cart::session(auth()->id())->remove($itemId);
        }else{
            \Cart::remove($itemId);
        }
        return back();
    }

    //updating quantity of items in cart page
    public function update($rowId){
        //dd(request('quantity'));
        if(auth()->user()){
        \Cart::session(auth()->id())->update($rowId,[
            'quantity' => array(
                'relative' => false,
                'value' => request('quantity')
            )
        ]);
        }else{
            \Cart::update($rowId,[
                'quantity' => array(
                    'relative' => false,
                    'value' => request('quantity')
                )
            ]);
        }
        return back();
    }


    public function clearall(){
        \Cart::session(auth()->id())->clear();
        return back();
    }

    public function checkout(){
        $countries = Country::all();
        //$countries = json_decode($countries);
        //dd($countries);
        return view('cart.checkout',compact('countries'));
    }
}
