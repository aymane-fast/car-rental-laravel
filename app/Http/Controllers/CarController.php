<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::where('booked', false)->get();
        return view('cars.index', compact('cars'));
    }
    public function show($id)
    {
        $car = Car::find($id);
        return view('cars.show', compact('car'));
    }
    public function create()
    {
        return view('cars.create');
    }
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'maker' => 'required',
            'model' => 'required',
            'year' => 'required|numeric',
            'transmission' => 'required | in:manual,automatic',
            'fuel' => 'required | in:petrol,diesel,electric,hybrid',
            'doors' => 'required|numeric|between:2,5',
            'mileage' => 'required|numeric',
            'engine' => 'required',
            'power' => 'required',
            'seats' => 'required|numeric',
            'description' => 'required',
            'image' => 'required',
        ]);
        $car = Car::create($validatedData);
        return redirect()->route('cars.index');
    }
}
