<?php

namespace Database\Seeders;

use App\Models\System\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::query()->truncate();
        $csvFile = fopen(base_path("database/data/departments.csv"), "r");

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                //dd($data[22]);
                Department::query()->create([
                    "code"          => !empty($data[1]) ? "$data[1]":null,
                    "name"          => !empty($data[2]) ? "$data[2]":null,
                    "country_id"    => !empty($data[3]) ? "$data[3]":null,
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
