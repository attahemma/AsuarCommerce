@extends('layouts.frontend.generic-head')

@section('content')
<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area">
    <div class="ht__bradcaump__container">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="bradcaump__inner text-center">
                        <h2 class="bradcaump-title">Contact Us</h2>
                        <nav class="bradcaump-inner">
                          <a class="breadcrumb-item" href="index.html">Home</a>
                          <span class="brd-separetor"><img src="{{ asset('junior/images/icons/brad.png')}}" alt="separator images"></span>
                          <span class="breadcrumb-item active">Contact Us</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->


<!-- Start Contact Form -->
<section class="contact__box section-padding--lg bg-image--27">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-md-12">
                <div class="section__title text-center">
                    <h2 class="title__line">please write to us using the method below</h2>
                    <p> please use your order number in the subject box if necessary</p>
                </div>
            </div>
        </div>
        <div class="row mt--80">
            <div class="col-lg-12">
            <div class="contact-form-wrap">
                    <form id="contact" action="{{route('contact.store')}}" method="POST">
                        @csrf
                        <div class="single-contact-form name">
                            <input type="text" name="name" placeholder="Your Name*" required>
                            <input type="email" name="email" placeholder="Email*" required>
                        </div>
                        <div class="single-contact-form subject">
                               <input type="text" name="subject" placeholder="Subject*">
                        </div>
                        <div class="single-contact-form message">
                            <textarea name="message"  placeholder="Type your message here.."></textarea>
                        </div>
                        <div class="contact-btn">
                            <button type="submit" form="contact" class="dcare__btn">Send</button>
                        </div>
                    </form>
                </div>
                <div class="form-output">
                    <p class="form-messege"></p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Contact Form -->
@endsection
