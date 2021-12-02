<?php

namespace Database\Seeders;

use App\Models\System\CIE10;
use Illuminate\Database\Seeder;

class Cie10Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CIE10::query()->truncate();
        $csvFile = fopen(base_path("database/data/CIE10-08-02-2021.csv"), "r");

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ";")) !== FALSE) {
            if (!$firstline) {
                CIE10::query()->create([
                    "code" => $data['0'],
                    "description" => $data['1']
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
