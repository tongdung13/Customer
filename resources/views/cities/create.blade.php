@extends('home')

@section('title', 'Add City')

@section( 'content')

    <div class="container">
        <div class="card">
            <div class="card-header">
                ADD City
            </div>
            <div class="form-group">
                <form method="POST" action="{{ route('cities.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Add New</button>
                    <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">cancel</button>
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
    </div>



@endsection

