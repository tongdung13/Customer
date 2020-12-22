@extends('lists')

@section('title', 'City List')


@section('content')


            <div class="table">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Number of customer</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($cities) == 0)
                        <tr>
                            <td colspan="4"> no customer</td>
                        </tr>
                        @else

                        @foreach($citis as $key => $citie)
                            <tr>
                                <th scope="row">{{ ++$key }}</th>
                                <td>{{ $citie->name }}</td>
                                <td>{{ count($citie->customers) }}</td>
                                <td>
                                    <a href="{{ route('cities.edit', $citi->id) }}" class="btn btn-primary">Update</a>
                                </td>
                                <td>
                                    <a href="{{ route('cities.destroy', $citi->id) }}" onclick="return confirm('Do you want to delete ?')" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach

                        @endif
                    </tbody>
                </table>
                <a href="{{ route('cities.create') }}" class="btn btn-success">Add</a>
            </div>












@endsection
