@extends('layouts.app')

@section('title')
    Tech Blog | Users
@endsection

@section('content')
    <div class="container">
        <div class="jumbotron">
            <h1 class="text-center text-muted">Manage Users</h1>
        </div>
        <div class="container">
            <div class="col-md-6">
                <h2 class="my-3 font-weight-bold text-muted text-center" style="font-style: italic;">Users List</h2>
            </div>
            @foreach($users as $user)
                <div class="row mt-2">
                     <div class="col-md-6">
                         <form action="{{ route('users.update', $user->id) }}" method="post" >
                             {{ method_field('patch') }}
                             @csrf
                             <div class="form-group row">
                                 <label for="name" class="col-sm-2 col-form-label font-weight-bold">Name:</label>
                                 <div class="col-sm-10">
                                     <input class="form-control" name="name" value="{{ $user->name }}">
                                 </div>
                             </div>
                            <div class="form-group row">
                                <label for="role" class="col-sm-2 col-form-label font-weight-bold">Role:</label>
                                <div class="col-sm-10">
                                    <select name="role_id" class="form-control">
                                        @if($user->role->id === 1)
                                            <option value="" selected>{{ $user->role->name }}</option>
                                            <option value="2">Author</option>
                                            <option value="3">Subscriber</option>
                                        @elseif($user->role->id === 2)
                                            <option value="" selected>{{ $user->role->name }}</option>
                                            <option value="1">Admin</option>
                                            <option value="3">Subscriber</option>
                                        @elseif($user->role->id === 3)
                                            <option value="" selected>{{ $user->role->name }}</option>
                                            <option value="1">Admin</option>
                                            <option value="2">Author</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-2 col-form-label font-weight-bold">Email:</label>
                                <div class="col-sm-10">
                                    <input class="form-control" value="{{ $user->email }}" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="created_at" class="col-sm-2 col-form-label font-weight-bold">Created:</label>
                                <div class="col-sm-10">
                                    <input class="form-control" value="{{ $user->created_at->diffForHumans() }}" disabled>
                                </div>
                            </div>
                            <button class="btn btn-primary float-right col-md-2 mx-2">Update</button>
                            </form>
                         <form action="{{ route('users.destroy', $user->id) }}" method="post">
                             @csrf
                             {{ method_field('delete') }}
                             <button class="btn btn-danger float-right col-md-2">Delete</button>
                         </form>
                        </div>
                    </div>
        @endforeach
        </div>
    </div>
@endsection
