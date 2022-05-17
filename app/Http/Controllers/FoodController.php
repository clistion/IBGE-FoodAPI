<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Preparation;

use Illuminate\Database\Eloquent\Collection; //remover???
use Illuminate\Contracts\Support\Jsonable;
use App\Models\FoodNutrient;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use PHPUnit\Framework\MockObject\Stub\ReturnValueMap;
use App\Models\Category;

class FoodController extends Controller
{


    public function appendNutrients(Food $food)
    {
        $res = DB::table('food_nutrient')->join('nutrients', 'id', '=', 'nutrient_id')->where('food_id', '=', $food->id)->get();
        $arr = $res->toArray();
        $q = [];
        foreach ($arr as $key => $value) {
            $z = (array)$value; //object to array conversion
            $z = Arr::except($z, ['id', 'food_id', 'created_at', 'updated_at', 'nutrient_id']); //removes some keys
            array_push($q, $z);
        }
        $food->setAttribute('nutrients', (object)$q);
        return $food;
    }
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
            //append  preparation_name
            $preparation = Preparation::where('code', $food->preparation_code)->first();
            $food->setAttribute('preparation_name', $preparation->name);
            $food->setAttribute('category', Category::find($food->category_id));

            $foods[$index] = $this->appendNutrients($food);

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
        //append preparation_name
        $preparation = Preparation::where('code', $food->preparation_code)->first();
        $food->setAttribute('preparation_name', $preparation->name);

        $food->setAttribute('category', Category::find($food->category_id));

        $food = $this->appendNutrients($food);
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
