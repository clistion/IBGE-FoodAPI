<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\FoodNutrient;
use File;

class FoodNutrientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/foods_nutrients.json");
        $nutrientsValues = json_decode($json);

        foreach ($nutrientsValues as $k => $value) {
            $k++;

            foreach ($value as $j => $v) {

                FoodNutrient::create([
                    "foods_id" => $k,
                    "nutrients_id" => $j,
                    "amount" => $v
                ]);

            // print_r($k);
            // print_r($j);
            // print_r($v);

            }
        }
    }
}
