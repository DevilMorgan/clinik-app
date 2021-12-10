<?php

namespace Database\Seeders;

use App\Models\System\Cups;
use Illuminate\Database\Seeder;

class CupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cups::query()->truncate();
        $csvFile = fopen(base_path("database/data/cups-2021-12-06.csv"), "r");

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ";")) !== FALSE) {
            if (!$firstline) {
                Cups::query()->create([
                    "code" => $data['0'],
                    "description" => $data['1']
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
