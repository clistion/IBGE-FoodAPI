<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Preparation;

use Illuminate\Database\Eloquent\Collection; //remover???
use Illuminate\Contracts\Support\Jsonable;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $url_params = $request->all();

        if ($request->isMethod('get') && $request->has('paginate')) {
            $foods = Food::paginate($url_params['paginate']);
        }
        else
            $foods = Food::all();

        foreach ($foods as $index => $food) {
            $preparation = Preparation::where('code', $food->preparation_code)->first();
            $food->setAttribute('preparation_name', $preparation->name);
        }

        return $foods->toJson(JSON_PRETTY_PRINT);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($code)
    {
        $food = Food::where('code', $code)->firstOrFail();
        $preparation = Preparation::where('code', $food->preparation_code)->first();
        $food->setAttribute('preparation_name', $preparation->name);
        return $food->toJson(JSON_PRETTY_PRINT);

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
    //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    //
    }
}
