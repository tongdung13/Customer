@extends('home')

@section('title', 'Registration User')

@section('content')


<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Add New Customer</h1>
        </div>
        <div class="form-group">
            <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control">
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control">
                </div>



                <button type="submit" class="btn btn-primary">Registration</button>
                <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Cancel</button>
            </form>
        </div>
    </div>
</div>














@endsection
