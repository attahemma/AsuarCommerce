@extends('layouts.frontend.generic-head')

@section('content')
<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area">
    <div class="ht__bradcaump__container">

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="bradcaump__inner text-center">
                        <h2 class="bradcaump-title">Our FAQ Page</h2>
                        <nav class="bradcaump-inner">
                          <a class="breadcrumb-item" href="{{route('index')}}">Home</a>
                          <span class="brd-separetor"><img src="{{ asset('junior/images/icons/brad.png') }}" alt="separator images"></span>
                          <span class="breadcrumb-item active">FAQ</span>
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
            <!-- Checkout Accordion Start -->
            <div class="col-lg-12">

                <!-- Shipping Method -->
                <div class="single-accordion">
                    <a class="accordion-head collapsed" data-toggle="collapse" data-parent="#checkout-accordion" href="#1">1. How to do I contact Asuar’s Star Book Company (ASB)?</a>
                    <div id="1" class="collapse show ">
                        <div class="accordion-body shipping-method fix">
                            <p>
                                You can contact our Customer Service Team by emailing <a href="mailto:asuarb@icloud.com">asuarb@icloud.com</a>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Payment Method -->
                <div class="single-accordion">
                    <a class="accordion-head collapsed" data-toggle="collapse" data-parent="#checkout-accordion" href="#2">2. What are your delivery times?</a>
                    <div id="2" class="collapse">
                        <div class="accordion-body payment-method fix">
                            <p>
                                Once an order has been received it will take between 3-5 working days for you to receive your item/s.
                            </p>

                        </div>
                    </div>
                </div>

                 <!-- Payment Method -->
                 <div class="single-accordion">
                    <a class="accordion-head collapsed" data-toggle="collapse" data-parent="#checkout-accordion" href="#3">3. How do I return Items?</a>
                    <div id="3" class="collapse">
                        <div class="accordion-body payment-method fix">
                            <p>
                                We will refund or exchange unwanted item/s that are returned to us within 30-day period, if they are in perfect condition. Returning any item for a refund can be done by dropping us an email at: <a href="mailto:asuarb@icloud.com">asuarb@icloud.com</a>.com and letting us know the reason for returning the item/s. Upon doing so, you will be provided with a return address. Please keep your proof of postage. And expect up to 14 days for item/s to be processed and to receive your refund or exchange.
                            </p>

                        </div>
                    </div>
                </div>


                <!-- Payment Method -->
                <div class="single-accordion">
                    <a class="accordion-head collapsed" data-toggle="collapse" data-parent="#checkout-accordion" href="#4">
                        4. Do you deliver outside of the United Kingdom?
                    </a>
                    <div id="4" class="collapse">
                        <div class="accordion-body payment-method fix">
                            <p>
                                We presently distribute within the United Kingdom only.
                            </p>

                        </div>
                    </div>
                </div>


                <!-- Payment Method -->
                <div class="single-accordion">
                    <a class="accordion-head collapsed" data-toggle="collapse" data-parent="#checkout-accordion" href="#5">
                        5. Can I modify my order once it’s been placed?
                    </a>
                    <div id="5" class="collapse">
                        <div class="accordion-body payment-method fix">
                            <p>
                                Currently we do not amend orders after they have been received. However, you have the choice to return unwanted goods for a refund.
                            </p>

                        </div>
                    </div>
                </div>

                <!-- Payment Method -->
                <div class="single-accordion">
                    <a class="accordion-head collapsed" data-toggle="collapse" data-parent="#checkout-accordion" href="#6">
                        6. How do I make a complaint?
                    </a>
                    <div id="6" class="collapse">
                        <div class="accordion-body payment-method fix">
                            <p>
                                We always endeavour to provide the best Customer Service. However, in the unlikely event that you would like to share feedback. Please write to us at: <a href="mailto:asuarb@icloud.com"> asuarb@icloud.com</a>
                            </p>

                        </div>
                    </div>
                </div>

                <!-- Payment Method -->
                <div class="single-accordion">
                    <a class="accordion-head collapsed" data-toggle="collapse" data-parent="#checkout-accordion" href="#7">
                        7. How long does it take to receive a refund?
                    </a>
                    <div id="7" class="collapse">
                        <div class="accordion-body payment-method fix">
                            <p>
                                Our Refund Policy will ensure that payments are returned to you by the payment process by which you paid for your goods. We aim to return payment in 5-7 days.
                            </p>

                        </div>
                    </div>
                </div>

                <!-- Payment Method -->
                <div class="single-accordion">
                    <a class="accordion-head collapsed" data-toggle="collapse" data-parent="#checkout-accordion" href="#8">
                        8. How do I book, Asuar’s Star Book Company (ASB)?
                    </a>
                    <div id="8" class="collapse">
                        <div class="accordion-body payment-method fix">
                            <p>
                                If you would like ASB, to attend your event in a stall holder capacity, or any other, please email us at: asuarb@icloud.com
                            </p>

                        </div>
                    </div>
                </div>

                <!-- Payment Method -->
                <div class="single-accordion">
                    <a class="accordion-head collapsed" data-toggle="collapse" data-parent="#checkout-accordion" href="#9">
                        9. How can I share a compliment?
                    </a>
                    <div id="9" class="collapse">
                        <div class="accordion-body payment-method fix">
                            <p>
                                We are happy to hear about your positive experiences while using our online services. You can do so by emailing us at: <a href="mailto:asuarb@icloud.com"> asuarb@icloud.com</a>
                            </p>

                        </div>
                    </div>
                </div>


                <!-- Payment Method -->
                <div class="single-accordion">
                    <a class="accordion-head collapsed" data-toggle="collapse" data-parent="#checkout-accordion" href="#10">
                        10.  What do I do if an item is missing from my delivery?
                    </a>
                    <div id="10" class="collapse">
                        <div class="accordion-body payment-method fix">
                            <p>
                                If we have made a mistake with your order, please inform us as soon as possible by emailing us at: asuarb@icloud.com and we will do our very best to rectify any mistakes as soon as possible.
                            </p>

                        </div>
                    </div>
                </div>


            </div><!-- Checkout Accordion Start -->
        </div>
    </div>
</div>
<!-- cart-main-area end -->
@endsection
