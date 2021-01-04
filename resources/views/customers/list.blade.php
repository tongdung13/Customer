
@extends('lists')

@section('title',__('messages.customer_list'))

@section('content')
<div class="col-12">
    <div class="row">
        <div class="col-12">
            @if(Session::has('success'))
            <p class="text-success">
                <i class="fa fa-check" aria-hidden="true"></i>
                {{ Session::get('success') }}
            </p>

            @endif
        </div>


            <div class="table">
                <table class="table tbale-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{ __('messages.name') }}</th>
                        <th scope="col">{{ __('messages.dob') }}</th>
                        <th scope="col">{{ __('messages.email') }}</th>
                        <th scope="col">{{ __('messages.city_id') }}</th>
                        <th scope="col">{{ __('messages.image') }}</th>
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
                                    <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-primary">{{ __('messages.update') }}</a>
                                </td>
                                <td>
                                    <a href="{{ route('customers.destroy', $customer->id) }}" onclick="return confirm('Do you want to delete ?')" class="btn btn-danger">{{ __('messages.delete') }}</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="col-12">
                    <div class="row">
                        <div class="col-9">
                            <a href="{{ route('customers.create') }}" class="btn btn-primary">{{ __('messages.add') }}</a>
                        </div>
                        <div class="col-3" style="text-align: right!important;">
                            {{ $customers->links() }}
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection
