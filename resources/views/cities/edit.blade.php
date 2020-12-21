@extends('home')

@section('title', 'Update City')

@section('content')

    <div class="container">
        <div class="card">
            <div class="card-header">
                Updat City
            </div>
            <div class="form-group">
                <form method="POST" action="{{ route('cities.update', $city->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>name</label>
                        <input type="tel" name="name" value="{{ $city->name }}" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Cancel</button>
                </form>

            </div>
        </div>
    </div>








@endsection
