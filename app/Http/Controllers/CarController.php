<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use Symfony\Component\HttpFoundation\JsonResponse;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return Car::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $validatedData = $request->validate([
          'brand' => 'required|string|min:2',  
          'model' => 'required|string|min:2',
          'year' => 'required',
          'maxSpeed' => 'integer|between:20,300',
          'isAutomatic' => 'required',
          'engine' => 'required',
          'numberOfDoors' => 'required|integer|between:2,5',




         ]);

        $car = new Car();

        $car->brand = $request->input('brand');
        $car->model = $request->input('model');
        $car->year = $request->input('year');
        $car->maxSpeed = $request->input('maxSpeed');
        $car->isAutomatic = $request->input('isAutomatic');
        $car->engine = $request->input('engine');
        $car->numberOfDoors = $request->input('numberOfDoors');

        

        $car->save();

        return $car;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         return Car::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $car = Car::findOrFail($id);

        $validatedData = $request->validate([
          'brand' => 'required|string|min:2',  
          'model' => 'required|string|min:2',
          'year' => 'required',
          'maxSpeed' => 'integer|between:20,300',
          'isAutomatic' => 'required',
          'engine' => 'required',
          'numberOfDoors' => 'required|integer|between:2,5',




         ]);

        

        $car->brand = $request->input('brand');
        $car->model = $request->input('model');
        $car->year = $request->input('year');
        $car->maxSpeed = $request->input('maxSpeed');
        $car->isAutomatic = $request->input('isAutomatic');
        $car->engine = $request->input('engine');
        $car->numberOfDoors = $request->input('numberOfDoors');

        

        $car->save();

        return $car;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car = Car::find($id);

        $car->delete();

        return new JsonResponse(true);
    }
}
