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
            CupsSeeder::class,
            CountrySeeder::class,
            DepartmentSeeder::class,
            CitySeeder::class,
        ]);

        DocumentType::query()->truncate();
        DocumentType::query()->upsert(
            [
                ['name' => 'History_medical', 'code' => '11'],
                ['name' => 'Prescription', 'code' => '12'],//
                ['name' => 'Days_off', 'code' => '13'],
                ['name' => 'procedure', 'code' => '14'],
            ],
            ['name', 'code']
        );

    }
}
