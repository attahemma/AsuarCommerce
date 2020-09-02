@extends('layouts.frontend.generic-head')

@section('content')
<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area">
    <div class="ht__bradcaump__container">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="bradcaump__inner text-center">
                        <h2 class="bradcaump-title">Results For {{$search_text}}</h2>
                        <nav class="bradcaump-inner">
                          <a class="breadcrumb-item" href="{{route('index')}}">Home</a>
                          <span class="brd-separetor"><img src="{{ asset('junior/images/icons/brad.png')}}" alt="separator images"></span>
                          <span class="breadcrumb-item active">Results</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->

<!-- Shop Ggrid Page -->
<section class="dcare__shop__grid  section-padding--lg bg--white">
    <div class="container">
        <div class="row">
            <!-- Shop Grid -->
            <div class="col-lg-12">
                <div class="row shop-grid-page">
                    @if ($books->isNotEmpty())
                    @foreach ($books as $book)
                    <!-- Start Single Product -->
                    <div class="col-lg-3 col-sm-6 col-md-4 col-12">
                        <div class="product--2 product__grid">
                            <div class="product__imges">
                                    <img src="{{ asset('booksimg').'/'.$book->book_image }}" alt="product images" style="width: 100%;">
                                <div class="product__cart__wrapper">
                                    <ul class="cart__list">
                                        <li><a href="{{ route('cart.add', $book->id) }}"><span class="ti-shopping-cart"></span></a></li>
                                        <li><a data-toggle="modal" data-target="#{{$book->id}}" title="Quick View" class="quick-view modal-view detail-link" href="#"><span class="ti-search"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product__inner">
                                <div class="pro__title">
                                    <h4>{{ Str::limit($book->name, 30) }}</h4>
                                </div>
                                <div class="pro__prize">
                                    <span>&pound;{{$book->price}} </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product -->

                    <!-- QUICKVIEW PRODUCT -->
                    <div id="quickview-wrapper">
                        <!-- Modal -->
                        <div class="modal fade" id="{{$book->id}}" tabindex="-1" role="dialog">
                            <div class="modal-dialog modal__container" role="document">
                                <div class="modal-content">
                                    <div class="modal-header modal__header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="modal-product">
                                            <!-- Start product images -->
                                            <div class="product-images">
                                                <div class="main-image images">
                                                    <img alt="big images" src="{{ asset('booksimg').'/'.$book->book_image }}">
                                                </div>
                                            </div>
                                            <!-- end product images -->
                                            <div class="product-info">
                                                <h1>{{$book->name}}</h1>

                                                <div class="price-box-3">
                                                    <div class="s-price-box">
                                                        <span class="new-price">&pound;{{$book->price}}</span>

                                                    </div>
                                                </div>
                                                <div class="quick-desc">
                                                    {{$book->description}}
                                                </div>
                                                <div class="addtocart-btn">
                                                    <a href="{{ route('cart.add', $book->id) }}">Add to cart</a>
                                                </div>
                                            </div><!-- .product-info -->
                                        </div><!-- .modal-product -->
                                    </div><!-- .modal-body -->
                                </div><!-- .modal-content -->
                            </div><!-- .modal-dialog -->
                        </div>
                        <!-- END Modal -->
                    </div>
                    <!-- END QUICKVIEW PRODUCT -->
                    @endforeach
                    @else
                    <h4>No Such Book Exists in Our Collection</h4>
                    @endif
                </div>
            </div>
            <!-- End Shop Grid -->
        </div>
    </div>
</section>
<!-- End Ggrid Page -->
@endsection
