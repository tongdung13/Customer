@extends('lists')

@section('title', 'List Customer')

@section('content')

            <div class="table">
                <table class="table tbale-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Date Of Birth</th>
                        <th scope="col">Email</th>
                        <th scope="col">City</th>
                        <th scope="col">Image</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>

                        @foreach($customers as $key => $customer)
                            <tr>
                                <th scope="col">{{ ++$key }}</th>
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->dob }}</td>
                                <td>{{ $customer->email }}</td>
                                <td>{{ $customer->city->name }}</td>
                                <td>
                                    <img src="{{ 'storage/' . $customer->image}}" style="width: 100px">
                                </td>
                                <td>
                                    <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-primary">Update</a>
                                </td>
                                <td>
                                    <a href="{{ route('customers.destroy', $customer->id) }}" onclick="return confirm('Do you want to delete ?')" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                        <div class="col-3" style="text-align: right!important;">
                            {{ $customers->links() }}
                        </div>
            </div>
            </div>
@endsection
