<?php

namespace App\Http\Controllers;

use App\Http\Requests\CitiesExampleRequest;
use App\Models\City;
use Illuminate\Http\Request;

class CitiesController extends Controller
{
    public function index()
    {
        $cities = City::all();
        return view('cities.list', compact('cities'));
    }

    public function create()
    {
        return view('cities.create');
    }

    public function store(CitiesExampleRequest $request)
    {
        $city = new City();
        $city->fill($request->all());
        $city->save();

        return redirect()->route('customers.index');

    }

    public function edit($id)
    {
        $city = City::findOrFail($id);
        return view('cities.edit', compact('city'));
    }

    public function update(CitiesExampleRequest $request, $id)
    {
        $city = City::findOrFail($id);
        $city->fill($request->all());
        $city->save();

        return redirect()->route('cities.index');
    }

    public function destroy($id)
    {
        $city = City::findOrFail($id);
        $city->delete();

        return redirect()->route('cities.index');
    }

    public function checkCreate(CitiesExampleRequest $request) {
        $success = "them du lieu thanh cong";
        return view('cities.create', compact('success'));
    }




}
