<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Measurement;
use File;

class MeasurementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

    {
        // Measurement::truncate();

        $json = File::get("database/data/measurements.json");
        $measurements = json_decode($json);

        foreach ($measurements as $key => $value) {
            Measurement::create([
                "code" => $value->code,
                "name" => $value->name
            ]);
        }
    }
}
