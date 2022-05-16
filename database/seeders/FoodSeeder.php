<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Food;
use File;

use App\Models\Category;
use Illuminate\Support\Arr;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Food::truncate();

        $json = File::get("database/data/foods.json");
        $foods = json_decode($json);

        $json2 = File::get("database/data/categories_x_foodsCode.json");
        $foods_categories = json_decode($json2);



        foreach ($foods as $key => $value) {
            $id = 0;

            foreach ($foods_categories as $k => $fc) {
                if ($fc->food_code == $value->code) {
                    $id = $fc->category_id;
                }
            }

            Food::create([
                "code" => $value->code,
                "description" => $value->description,
                "preparation_code" => $value->preparation_code,
                "category_id" => $id
            ]);
        }
    }
}
