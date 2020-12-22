@extends('home')

@section('title', 'Update Customer')

@section('content')

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Update Customer</h1>
            </div>
            <div class="form-group">
                <form method="POST" action="{{ route('customers.update', $customer->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" value="{{ $customer->name }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Date Of Birth</label>
                        <input type="date" name="dob" value="{{ $customer->dob }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" value="{{ $customer->email }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>City</label>
                        <select class="form-control" name="city_id">
                            @foreach($city as $value)
                                <option @if($customer->city_id == $value->id)
                                    {{ "selected" }}
                                @endif
                                value="{{ $value->id }}">{{ $value->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Image</label><br>
                        <input type="file" name="image" class="form-control-file">
                    </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Cancel</button>
                </form>
            </div>
            <div class="error-message">
                @if($errors->any())
                @foreach($errors->all() as $nameError)
                <p style="color: red">{{ $nameError }}</p>

                @endforeach
                @else
                <p style="color: green">{{ (isset($success)) ? $success : '' }}</p>
                @endif
                </div>
        </div>
    </div>















@endsection
