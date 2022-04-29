<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Category;
use File;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // Category::truncate();

         $json = File::get("database/data/categories.json");
         $categories = json_decode($json);

         foreach ($categories as $key => $value) {
             Category::create([
                 "name" => $value->name
             ]);
         }
    }
}
