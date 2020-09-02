@extends('layouts.back')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center mb-3">
        {{-- <img src="" alt="profile image" class="img-thumbnail"> --}}
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('My Profile') }}</div>

                <div class="card-body">
                    <table class="table table-striped table-dark">
                        <tbody>
                          <tr>
                            <th scope="row">Name</th>
                            <td>{{$userDetail->name}}</td>
                          </tr>
                          <tr>
                            <th scope="row">Email</th>
                            <td>{{$userDetail->email}}</td>
                          </tr>
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
