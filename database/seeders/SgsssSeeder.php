<?php

namespace Database\Seeders;

use App\Models\System\Sgsss;
use Illuminate\Database\Seeder;

class SgsssSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sgsss::query()->truncate();
        $csvFile = fopen(base_path("database/data/SGSSS.csv"), "r");

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ";")) !== FALSE) {
            if (!$firstline) {
                Sgsss::query()->create([
                    "code"  => $data['0'],
                    "name"  => $data['1'],
                    "regime"=> $data['2']
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
