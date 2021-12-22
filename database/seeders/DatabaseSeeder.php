<?php

namespace Database\Seeders;

use App\Models\System\DocumentType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //\App\Models\System\User::factory(10)->create();
        $this->call([
            Cie10Seeder::class,
            CumsSeeder::class,
            CupsSeeder::class
        ]);

        DocumentType::query()->truncate();
        DocumentType::query()->upsert(
            [
                ['name' => 'Prescription', 'root_directory' => 'history_medical/'],
                ['name' => 'Days_off', 'root_directory' => 'history_medical/'],
                ['name' => 'procedure', 'root_directory' => 'history_medical/'],
                ['name' => 'History_medical', 'root_directory' => 'history_medical/'],
            ] ,
            ['name', 'root_directory']
        );

    }
}
