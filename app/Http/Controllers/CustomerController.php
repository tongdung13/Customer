<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerExampleRequest;
use App\Models\City;
use App\Models\Customer;
use FFI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::paginate(5);
        $city = City::all();
        return view('customers.list', compact('customers', 'city'));
    }

    public function filterByCity(Request $request)
    {
        $idCity = $request->input('city_id');

        $cityFilter = City::findOrFail($idCity);

        $customers = Customer::where('city_id', $cityFilter->id)->get();
        $totalCustomerFilter = count($customers);

        $city = City::all();

        return view('customers.list', compact('customers', 'city', 'totalCustomerFilter', 'cityFilter'));
    }


    public function create()
    {
        $city = City::all();
        return view('customers.create', compact('city') );
    }

    public function store(CustomerExampleRequest $request)
    {
        $customer = new Customer();
        $customer->fill($request->all());

        if($request->hasFile('image')) {

            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $customer->image = $path;
        }

        $customer->save();

        return redirect()->route('customers.index');
    }

    public function edit($id) {

        $customer = Customer::findOrFail($id);
        $city = City::all();

        return view('customers.edit', compact('customer', 'city'));
    }

    public function update(CustomerExampleRequest $request, $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->fill($request->all());

        if($request->hasFile('image'))
        {
            $currentImg = $customer->image;
            if($currentImg)
            {
                Storage::delete('/public/' . $currentImg);
            }

            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $customer->image = $path;
        }

        $customer->save();
        Session::flash('success', 'cap nhap thanh cong');
        return redirect()->route('customers.index');
    }


    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        return redirect()->route('customers.index');
    }


    public function search(Request $request)
    {
        $search = $request->input('search');
        if (!$search) {
            return redirect()->route('customers.index');
        }

        $customers = Customer::where('name','LIKE', '%'. $search . '%')->paginate(5);

        $city = City::all();
        return view('customers.list', compact('customers', 'city'));
    }

    public function checkCreate(CustomerExampleRequest $request)
    {
        $success = "them du lieu thang cong";
        return view('customers.create', compact('success'));
    }

    public function checkUpdate(CustomerExampleRequest $request)
    {
        $success = "them du lieu thang cong";
        return view('customers.edit', compact('success'));
    }

}
