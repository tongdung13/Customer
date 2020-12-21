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
                <div class="col-12">
                    <div class="row">
                        <div class="col-9">
                            <a href="{{ route('customers.create') }}" class="btn btn-primary">ADD</a>
                        </div>
                        <div class="col-3" style="width: 90px; font-size: 15px">
                            {{ $customers->links() }}
                        </div>
                    </div>
                </div>
            </div>
    


      <!-- Modal -->
      <div class="modal fade" id="cityModal" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <form action="{{ route('customers.filterByCity') }}" method="get">
               @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <!--Lọc theo khóa học -->
                        <div class="select-by-program">
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label border-right">Lọc khách hàng theo tỉnh thành</label>
                                <div class="col-sm-7">
                                    <select class="custom-select w-100" name="city_id">
                                        <option value="">Chọn tỉnh thành</option>
                                        @foreach($city as $value)
                                            @if(isset($cityFilter))
                                                @if($value->id == $cityFilter->id)
                                                    <option value="{{$value->id}}" selected >{{ $value->name }}</option>
                                                @else
                                                    <option value="{{$value->id}}">{{ $value->name }}</option>
                                                @endif
                                            @else
                                                <option value="{{$value->id}}">{{ $value->name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- </form> -->
                        </div>
                        <!--End-->

                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="submitAjax" class="btn btn-primary" >Chọn</button>
                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Hủy</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>






@endsection
