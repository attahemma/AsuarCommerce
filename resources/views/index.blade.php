@extends('layouts.frontend.front')

@section('content')
<!-- Shop Ggrid Page -->
<section class="dcare__shop__grid  section-padding--lg bg--white">
    <div class="container">
        <div class="row">
             <!-- Start Sidebar -->
        	<div class="col-lg-3">
        		<div class="sidebar__widgets sidebar--right">
        			<!-- Single Widget -->
        			<div class="single__widget search">
        				<h4>Search</h4>
                        <form action="{{route('book.search')}}" method="GET">
                            @csrf
        					<input type="text" placeholder="Search keyword" name="query">
        					<button type="submit"><i class="fa fa-search"></i></button>
        				</form>
        			</div>
        			<!-- End Widget -->
        		</div>
        	</div>
        	<!-- End Sidebar -->
            <!-- Shop Grid -->
            <div class="col-lg-9">
                <div class="row shop-grid-page">
                    @if ($books->isNotEmpty())
                    @foreach ($books as $book)
                    <!-- Start Single Product -->
                    <div class="col-lg-4 col-sm-6 col-md-6 col-12">
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
                    @endif
                </div>
                <!-- Start Pagination -->
                <div class="row mt-5 ">
                    <div class="col-12">
                        <div class="single-input text-center ">
                            {{$books->links()}}
                        </div>
                    </div>
                </div>
                <!-- End Pagination -->
            </div>
            <!-- End Shop Grid -->
        </div>
    </div>
</section>
<!-- End Ggrid Page -->

@endsection
