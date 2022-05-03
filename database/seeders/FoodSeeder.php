<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Food;
use File;

use App\Models\Category;

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

        foreach ($foods as $key => $value) {
            Food::create([
                "code" => $value->code,
                "description" => $value->description,
                "preparation_code" => $value->preparation_code
            ]);
        }
    }
}
