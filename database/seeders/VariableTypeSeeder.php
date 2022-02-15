<?php

namespace Database\Seeders;

use App\Models\System\HistoryClinic\HcVariableType;
use Illuminate\Database\Seeder;

class VariableTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create variable types
        $variableTypes = [
            ['name' => 'numeric', 'status' => 1],
            ['name' => 'text', 'status' => 1],
            ['name' => 'text-short', 'status' => 1],
            ['name' => 'range', 'status' => 1],
            ['name' => 'boolean', 'status' => 1],
            ['name' => 'list', 'status' => 1],
            ['name' => 'check-list', 'status' => 1],
            ['name' => 'date', 'status' => 1],
        ];

        HcVariableType::query()->truncate();
        HcVariableType::query()->upsert($variableTypes, ['name']);
    }
}
