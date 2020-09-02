@extends('layouts.frontend.generic-head')

@section('content')
<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area">
    <div class="ht__bradcaump__container">

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="bradcaump__inner text-center">
                        <h2 class="bradcaump-title">Cart Page</h2>
                        <nav class="bradcaump-inner">
                          <a class="breadcrumb-item" href="index.html">Home</a>
                          <span class="brd-separetor"><img src="{{ asset('junior/images/icons/brad.png') }}" alt="separator images"></span>
                          <span class="breadcrumb-item active">Cart</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->
<!-- cart-main-area start -->
<div class="cart-main-area section-padding--lg bg--white">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 ol-lg-12">

                    <div class="table-content table-responsive">
                        <table>
                            <thead>
                                <tr class="title-top">
                                    <th class="product-thumbnail">Image</th>
                                    <th class="product-name">Books</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cartItems as $item)
                                <tr>
                                    <td class="product-thumbnail">
                                        <a href="#">
                                            <img src="{{ asset('booksimg').'/'.$item->associatedModel[0]['book_image']}}" alt="product img"  style="width: 50px;"/>
                                        </a>
                                    </td>

                                    <td class="product-name">
                                        <a href="#">
                                            {{ $item->name}}
                                        </a>
                                    </td>

                                    <td class="product-price">
                                        <span class="amount">&pound;
                                            @if (Auth::user())
                                            {{ Cart::session(auth()->id())->get($item->id)->getPriceSum() }}
                                            @else
                                            {{ Cart::get($item->id)->getPriceSum() }}
                                            @endif
                                        </span>
                                    </td>

                                    <td class="product-quantity">

                                        <form action="{{ route('cart.update', $item->id) }}" >

                                            <input type="number" name="quantity" value="{{ $item->quantity}}">

                                            <input type="submit" name="" value="Save">

                                        </form>

                                    </td>

                                    <td class="product-remove">
                                        <a href="{{ route('cart.destroy', $item->id) }}">X</a>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                <div class="cartbox__btn">
                    <ul class="cart__btn__list d-flex flex-wrap flex-md-nowrap flex-lg-nowrap justify-content-between">

                        <li><a href="{{ route('cart.checkout') }}">Proceed to CheckOut</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 offset-lg-6">
                <div class="cartbox__total__area">
                    <div class="cartbox-total d-flex justify-content-between">
                        <ul class="cart__total__list">
                            <li>Cart total</li>
                            <li>Delivery Charge</li>
                        </ul>
                        <ul class="cart__total__tk">
                            <li>&pound;
                                @auth
                                {{Cart::session(auth()->id())->getTotal()}}
                                @else
                                {{Cart::getTotal()}}
                                @endauth
                            </li>
                            <li>&pound; 3.99</li>
                        </ul>
                    </div>
                    <div class="cart__total__amount">
                        <span>Grand Total</span>
                        <span>
                            &pound;
                            @auth
                                {{Cart::session(auth()->id())->getTotal()+3.99}}
                            @else
                                {{Cart::getTotal()+3.99}}
                            @endauth
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- cart-main-area end -->
@endsection
