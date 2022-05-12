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
            //append  preparation_name
            $preparation = Preparation::where('code', $food->preparation_code)->first();
            $food->setAttribute('preparation_name', $preparation->name);

            //append amount
            $nutrients = FoodNutrient::where('food_id', $food->id)->get();
            $food->setAttribute('nutrients', $nutrients->toJson(JSON_PRETTY_PRINT));
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

        // $f = $food->load('nutrients');
        // $this->$f->nutrients[0]->append(['amount'=>'10']);

        $res = DB::table('food_nutrient')->join('nutrients', 'id', '=', 'nutrient_id')->where('food_id', '=', $food->id)->get();
        // dd(gettype($res));//objeto

        // $res->forget('0');//remove passando a key apenas, e nao o value, q nesse caso é um objeto json.
        // $res->forget('items[0]->updated_at');


        // $jj = $res->toJson();

        // dd($jj);
        // dd($jj->"'0' => food_id')
        $arr = Arr::except($res->toArray(), ['created_at']); //remove item de uma collection passando a chave
        // dd( Arr::exists($arr,'36'));
        // echo $arr[0][0];



        // dd($value->updated_at);

        // $newArr = [];
        $q = [];
        foreach ($arr as $key => $value) {

            // dd(gettype($value));//object
            // $json = json_encode($value,true);//converte pra json um objeto php
            // dd($array = (array) $value);//converte para array um objeto php

            $z = (array)$value;//object to array conversion
            $z = Arr::except($z, ['id','food_id','created_at','updated_at','nutrient_id']);//removes some keys

            // dd($z);
            array_push($q, $z);
        }

        // dd($q);
        $food->setAttribute('nutrients', (object)$q);
        //append nutrients
        // $food_nutrient = FoodNutrient::where('food_id',$food->id)->get();

        // foreach($food_nutrient as $f => $value){
        //     $food->setAttribute('nutrients', $f);
        // }



        //  $food = $food->load('nutrients');

        // return $food->nutrients;

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
