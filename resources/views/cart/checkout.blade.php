@extends('layouts.frontend.generic-head')

@section('content')
<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area">
    <div class="ht__bradcaump__container">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="bradcaump__inner text-center">
                        <h2 class="bradcaump-title">Checkout</h2>
                        <nav class="bradcaump-inner">
                          <a class="breadcrumb-item" href="{{route('cart.index')}}">Cart</a>
                          <span class="brd-separetor"><img src="{{asset('junior/images/icons/brad.png')}}" alt="separator images"></span>
                          <span class="breadcrumb-item active">Checkout</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->
 <section class="htc__checkout bg--white section-padding--lg">
    <!-- Checkout Section Start-->
    <div class="checkout-section">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-12 mb-30">

                        <!-- Checkout Accordion Start -->
                        <div id="checkout-accordion">

                            @if (!Auth::user())
                            <!-- Checkout Method -->
                            <div class="single-accordion">
                                <a class="accordion-head" data-toggle="collapse" data-parent="#checkout-accordion" href="#checkout-method">1. checkout method</a>

                                <div id="checkout-method" class="collapse show">
                                    <div class="checkout-method accordion-body fix">
                                        <p>You can Proceed to Checkout without Login, but Won't be able to <strong>manage orders</strong> </p>
                                        <ul class="checkout-method-list">
                                            <li class="active" data-form="checkout-login-form">Login</li>
                                            <li data-form="checkout-register-form">Register</li>
                                        </ul>

                                        <form method="POST" action="{{ route('login') }}" class="checkout-login-form" id="checkout-login">
                                            @csrf
                                            <div class="row">
                                                <div class="input-box col-md-6 col-12 mb--20"><input type="email" placeholder="Email Address" name="email"></div>
                                                <div class="input-box col-md-6 col-12 mb--20"><input type="password" placeholder="Password" name="password"></div>
                                                <div class="input-box col-12"><input type="submit" value="Login" form="checkout-login"></div>
                                            </div>
                                        </form>

                                        <form method="POST" action="{{ route('register') }}" id="checkout-register" class="checkout-register-form">
                                            @csrf

                                            <div class="row">
                                                <div class="input-box col-md-6 col-12 mb--20"><input type="text" placeholder="Your Name" name="name"></div>
                                                <div class="input-box col-md-6 col-12 mb--20"><input type="email" placeholder="Email Address" name="email"></div>
                                                <div class="input-box col-md-6 col-12 mb--20"><input type="password" placeholder="Password" name="password"></div>
                                                <div class="input-box col-md-6 col-12 mb--20"><input type="password" placeholder="Confirm Password" name="password_confirmation"></div>
                                                <div class="input-box col-12"><input type="submit" value="Register" form="checkout-register"></div>
                                            </div>
                                        </form>

                                    </div>
                                </div>

                            </div>
                            @endif

                            <!-- Billing Method -->
                            {{-- <div class="single-accordion">
                                <a class="accordion-head collapsed" data-toggle="collapse" data-parent="#checkout-accordion" href="#billing-method">2. billing informatioon</a>
                                <div id="billing-method" class="collapse">

                                    <div class="accordion-body billing-method fix">

                                        <form action="#" class="billing-form checkout-form">
                                            <div class="row">
                                                <div class="col-12 mb--20">
                                                    <select>
                                                      <option value="1">Select a country</option>
                                                      <option value="2">bangladesh</option>
                                                      <option value="3">Algeria</option>
                                                      <option value="4">Afghanistan</option>
                                                      <option value="5">Ghana</option>
                                                      <option value="6">Albania</option>
                                                      <option value="7">Bahrain</option>
                                                      <option value="8">Colombia</option>
                                                      <option value="9">Dominican Republic</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6 col-12 mb--20">
                                                    <input type="text" placeholder="First Name">
                                                </div>
                                                <div class="col-md-6 col-12 mb--20">
                                                    <input type="text" placeholder="Last Name">
                                                </div>
                                                <div class="col-12 mb--20">
                                                    <input type="text" placeholder="Company Name">
                                                </div>
                                                <div class="col-12 mb--20">
                                                    <input placeholder="Street address" type="text">
                                                </div>
                                                <div class="col-12 mb--20">
                                                    <input placeholder="Apartment, suite, unit etc. (optional)" type="text">
                                                </div>
                                                <div class="col-12 mb--20">
                                                    <input placeholder="Town / City" type="text">
                                                </div>
                                                <div class="col-md-6 col-12 mb--20">
                                                    <input type="text" placeholder="State / County">
                                                </div>
                                                <div class="col-md-6 col-12 mb--20">
                                                    <input placeholder="Postcode / Zip" type="text">
                                                </div>
                                                <div class="col-md-6 col-12 mb--20">
                                                    <input type="email" placeholder="Email Address">
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <input placeholder="Phone Number" type="text">
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div> --}}

                            <!-- Shipping Method -->
                            <div class="single-accordion">
                                <a class="accordion-head collapsed" data-toggle="collapse" data-parent="#checkout-accordion" href="#shipping-method">3. shipping informatioon</a>
                                <div id="shipping-method" class="collapse @if (Auth::user()) show @endif">
                                    <div class="accordion-body shipping-method fix">

                                        <button class="shipping-form-toggle">Click to Add Shipping address?</button>

                                        <form action="{{ route('orders.store') }}" method="POST" class="shipping-form checkout-form" id="placeOrder">
                                            @csrf

                                            <div class="row">
                                                <div class="col-12 mb--20">
                                                    <label style="color: red;">*</label>
                                                    <select name="country" required>
                                                      <option value="1" selected disabled>Select a country</option>
                                                      @foreach ($countries as $country)
                                                      <option value="{{$country->name}}">{{$country->name}}</option>
                                                      @endforeach

                                                    </select>
                                                </div>
                                                <div class="col-md-6 col-12 mb--20">
                                                    <label style="color: red;">*</label>
                                                    <input type="text" placeholder="First Name" name="firstname" required>
                                                </div>
                                                <div class="col-md-6 col-12 mb--20">
                                                    <label style="color: red;">*</label>
                                                    <input type="text" placeholder="Last Name"
                                                    name="lastname" required>
                                                </div>

                                                <div class="col-12 mb--20">
                                                    <label style="color: red;">*</label>
                                                    <input placeholder="Street address" type="text" name="street" required>
                                                </div>
                                                <div class="col-12 mb--20">
                                                    <input placeholder="Apartment, suite, unit etc. (optional)" type="text" name="apartment">
                                                </div>
                                                <div class="col-12 mb--20">
                                                    <label style="color: red;">*</label>
                                                    <input placeholder="Town / City" type="text" name="town" required>
                                                </div>
                                                <div class="col-md-6 col-12 mb--20">
                                                    <label style="color: red;">*</label>
                                                    <input type="text" placeholder="State / County" name="state" required>
                                                </div>
                                                <div class="col-md-6 col-12 mb--20">
                                                    <label style="color: red;">*</label>
                                                    <input placeholder="Postcode / Zip" type="text" name="postcode" required>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <label style="color: red;">*</label>
                                                    <input type="email" placeholder="Email Address" name="email" required>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <input placeholder="Phone Number" type="text" name="phone">
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>

                            <!-- Payment Method -->
                            <div class="single-accordion">
                                <a class="accordion-head collapsed" data-toggle="collapse" data-parent="#checkout-accordion" href="#payment-method">4. Payment method</a>
                                <div id="payment-method" class="collapse">
                                    <div class="accordion-body payment-method fix">

                                        <ul class="payment-method-list">
                                            <li class="active">PayPal</li>
                                        </ul>

                                    </div>
                                </div>
                            </div>

                        </div><!-- Checkout Accordion Start -->
                    </div>

                    <!-- Order Details -->
                    <div class="col-lg-6 col-12 mb-30">
                        @php
                            if (Auth::user()) {
                                $cartItems = Cart::session(auth()->id())->getContent();
                                $subtotal = Cart::session(auth()->id())->getTotal();
                            }else {
                                $cartItems = Cart::getContent();
                                $subtotal = Cart::getTotal();
                            }
                        @endphp
                        <div class="order-details-wrapper">
                            <h2>your order</h2>
                            <div class="order-details">

                                    <ul>
                                        <li>
                                            <p class="strong">product</p>
                                            <p class="strong">total</p>
                                        </li>
                                        @foreach ($cartItems as $item)
                                        <li>
                                            <p>{{$item->name}} x{{$item->quantity}}</p>
                                            <p>&pound; {{$item->price}}</p>
                                        </li>
                                        @endforeach
                                        <li>
                                            <p class="strong">cart subtotal</p>
                                            <p class="strong">{{$subtotal}}</p>
                                        </li>
                                        <li>
                                            <p class="strong">shipping</p>
                                            <p>
                                                <label for="flat">&pound; 3.99</label>
                                            </p>
                                        </li>
                                        <li><p class="strong">order total</p><p class="strong">&pound; {{$subtotal + 3.99}}</p></li>
                                        <li><button type="submit" form="placeOrder" class="dcare__btn">place order</button></li>
                                    </ul>

                            </div>
                        </div>

                    </div>

            </div>
        </div>
    </div><!-- Checkout Section End-->
 </section>
@endsection
