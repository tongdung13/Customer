<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Customer;
use FFI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::paginate(5);
        $city = City::all();
        return view('customers.list', compact('customers', 'city'));
    }

    public function create()
    {
        $city = City::all();
        return view('customers.create', compact('city') );
    }

    public function store(Request $request)
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

    public function update(Request $request, $id)
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

        return redirect()->route('customers.index');
    }


    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        return redirect()->route('customers.index');
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



}
