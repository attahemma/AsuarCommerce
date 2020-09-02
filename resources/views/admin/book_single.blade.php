@extends('layouts.back')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center mb-3">
        <img src="{{ asset('booksimg').'/'.$book->book_image }}" alt="book cover image" class="img-thumbnail">
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Book Information') }}</div>

                <div class="card-body">
                    <table class="table table-striped table-dark">
                        <tbody>
                          <tr>
                            <th scope="row">Title</th>
                            <td>{{$book->name}}</td>
                          </tr>
                          <tr>
                            <th scope="row">Author (s)</th>
                            <td>{{$book->authors}}</td>
                          </tr>
                          <tr>
                            <th scope="row">Date Published</th>
                            <td>{{$book->published_date}}</td>
                          </tr>
                          <tr>
                            <th scope="row">Price</th>
                            <td>&pound;{{$book->price}}</td>
                          </tr>
                          <tr>
                            <th scope="row">Description</th>
                            <td>{{$book->description}}</td>
                          </tr>
                        </tbody>
                      </table>
                </div>
                <div class="card-footer">
                    <a href="{{route('home')}}" class="btn btn-primary">Go Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
