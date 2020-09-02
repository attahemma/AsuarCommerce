@extends('layouts.back')

@section('content')
<div class="container mt-5">
    <div class="row">
        <h3>Dashboard</h3>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-4 mb-2">
            <div class="card">
                <div class="card-header">{{ __('Manage Books') }}</div>

                <div class="card-body">
                    <button type="button" class="btn btn-success btn-lg btn-block" data-toggle="modal" data-target="#addbook">Add Book</button>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('All Books') }}</div>

                <div class="card-body">
                    <table id="example" class="display table table-hover" style="width:100%">
                        <thead class="thead-dark">
                            <tr>
                                <th>Name</th>
                                <th>Authors</th>
                                <th>Year</th>
                                <th>Price</th>
                                <th class="action">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($books->isNotEmpty())
                            @foreach ($books as $book)
                            <tr>
                                <td>{{ $book->name }}</td>
                                <td>{{$book->authors}}</td>
                                <td>{{$book->published_date}}</td>
                                <td>&pound;{{$book->price}}</td>
                                <td>
                                    <a href="{{ route('book.show', $book->id)}}" class="btn-sm btn-dark"><i class="fa fa-eye"></i></a>
                                    <a href="{{route('book.edit', $book->id)}}" class="btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                    <form action="{{route('book.destroy', $book)}}" method="POST">
                                        @csrf
                                        {{method_field('DELETE')}}
                                        <button class="btn-sm btn-danger mt-1"><i class="fa fa-times"></i></button>
                                    </form>

                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Vertically centered scrollable modal -->
<div class="modal" id="addbook">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-body">
                <form action="{{ route('book.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                    <label>Book Name</label>
                    <input type="text" class="form-control" name="name">
                    <small id="emailHelp" class="form-text text-muted">Title of Book</small>
                    </div>

                    <div class="form-group">
                        <label>Publisher Date</label>
                        <input type="text" class="form-control" name="published_date">
                        <small class="form-text text-muted">enter the year published</small>
                    </div>

                    <div class="form-group">
                        <label>Author (s)</label>
                        <input type="text" class="form-control"  name="authors">
                        <small class="form-text text-muted">Separate author list with comma if necessary</small>
                    </div>

                    <div class="form-group">
                        <label>Search Engine Keywords</label>
                        <input type="text" class="form-control" name="keywords">
                        <small class="form-text text-muted">Separate keywords with comma</small>
                    </div>

                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" class="form-control" name="price">
                        <small class="form-text text-muted">Enter only the amount in numbers</small>
                    </div>

                    <div class="form-group">
                        <label>Book Front Cover</label>
                        <input type="file" class="form-control-file" name="book_image">
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" id="editor" name="description"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection
