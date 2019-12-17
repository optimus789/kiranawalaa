@extends('layouts.master')

@section('title')
    Edit-Registered | lrvlApp
@endsection

@section('content')
    
    <div class="container" >
        <div class="row">
            <div class="card" >
                    <div class="card-header">
                        <h3>Edit Role for Registered User.</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                            <form action="/role-register-update/{{ $users->id }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('PUT') }}

                                            <div class="form-group">
                                                <label>Name</label>
                                            <input type="text" name="username" value="{{ $users->name }}" class="form-control">
                                            </div>

                                            @if (Auth::user()->usertype == 'su')
                                            <div class="form-group">
                                                <label>Give Role</label>
                                                <select name="usertype" class="form-control">
                                                    <option value="su">SuperUser</option>
                                                    <option value="admin">Admin</option>
                                                </select>
                                            </div>
                                            @else
                                            <div class="form-group">
                                                <label>Give Role</label>
                                                <select name="usertype" class="form-control">
                                                    <option value="admin">Admin</option>
                                                    <option value="customer">Customer</option>
                                                    <option value="dlvboy">Delivery Boy</option>
                                                </select>
                                            </div>
                                            @endif
        
                                            <button type="submit" class="btn btn-success"> Update</button>
                                            <a href="/role-register" class="btn btn-danger"> Cancel</a>
                                    </form>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    
@endsection