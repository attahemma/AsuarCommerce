@extends('layouts.back')

@section('content')
<div class="container mt-5">
    <form action="{{route('book.update', $book->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        {{method_field('PUT')}}
    <div class="row justify-content-center mb-3">
        <img src="{{ asset('booksimg').'/'.$book->book_image }}" alt="book cover image" class="img-thumbnail">
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Book') }}</div>

                <div class="card-body">
                    <div class="form-group">
                        <label>Book Name</label>
                        <input type="text" class="form-control" name="name" value="{{$book->name}}">
                        <small id="emailHelp" class="form-text text-muted">Title of Book</small>
                    </div>

                    <div class="form-group">
                        <label>Publisher Date</label>
                        <input type="text" class="form-control" name="published_date" value="{{$book->published_date}}">
                        <small class="form-text text-muted">enter the year published</small>
                    </div>

                        <div class="form-group">
                            <label>Author (s)</label>
                            <input type="text" class="form-control"  name="authors" value="{{$book->authors}}">
                            <small class="form-text text-muted">Separate author list with comma if necessary</small>
                        </div>

                        <div class="form-group">
                            <label>Search Engine Keywords</label>
                            <input type="text" class="form-control" name="keywords" value="{{$book->keywords}}">
                            <small class="form-text text-muted">Separate keywords with comma</small>
                        </div>

                        <div class="form-group">
                            <label>Price</label>
                            <input type="text" class="form-control" name="price" value="{{$book->price}}">
                            <small class="form-text text-muted">Enter only the amount in numbers</small>
                        </div>

                        <div class="form-group">
                            <label>Change Front Cover</label>
                            <input type="file" class="form-control-file" name="book_image">
                        </div>
                            
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" id="editor" name="description">{{$book->description}}</textarea>
                        </div>
                </div>
                <div class="card-footer">
                    <a href="{{route('home')}}" class="btn btn-primary">Go Back</a>
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>
@endsection
