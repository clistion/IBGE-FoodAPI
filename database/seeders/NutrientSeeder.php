<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Nutrient;
use File;

class NutrientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // Food::truncate();

       $json = File::get("database/data/nutrients.json");
       $nutrients = json_decode($json);

       foreach ($nutrients as $key => $value) {
           Nutrient::create([
               "name" => $value->name,
               "simbol" => $value->simbol
           ]);
       }
    }
}
