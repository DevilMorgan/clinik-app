<?php

namespace Database\Seeders;

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

    }
}
