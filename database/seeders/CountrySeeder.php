<?php

namespace Database\Seeders;

use App\Models\System\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Country::query()->truncate();
        $csvFile = fopen(base_path("database/data/countries.csv"), "r");

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ";")) !== FALSE) {
            if (!$firstline) {
                //dd($data[22]);
                Country::query()->create([
                    //"id"    => !empty($data[0]) ? "$data[0]":null,
                    "iso"   => !empty($data[1]) ? "$data[1]":null,
                    "name"  => !empty($data[2]) ? $data[2]:null,
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
