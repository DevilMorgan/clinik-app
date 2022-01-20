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
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                //dd($data[22]);
                Country::query()->create([
                    "name"      => !empty($data[1]) ? $data[1]:null,
                    "name_iso"  => !empty($data[2]) ? $data[2]:null,
                    "iso_2"     => !empty($data[3]) ? $data[3]:null,
                    "iso_3"     => !empty($data[4]) ? $data[4]:null,
                    "iso_numeric"  => !empty($data[5]) ? $data[5]:null
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
