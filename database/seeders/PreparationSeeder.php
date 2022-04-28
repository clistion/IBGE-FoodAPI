<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Preparation;
use File;

class PreparationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Preparation::truncate();

        $json = File::get("database/data/preparations.json");
        $reparations = json_decode($json);

        foreach ($reparations as $key => $value) {
            Preparation::create([
                "code" => $value->code,
                "name" => $value->name
            ]);
        }
    }
}
