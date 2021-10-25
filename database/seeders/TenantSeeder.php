<?php

namespace Database\Seeders;

use App\Models\Tenant\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $this->call(RolesTenatSeeder::class);
//        $this->call(ModulesTenatSeeder::class);
//
//        //\App\Models\Tenant\User::factory(1)->create();
        $faker = Faker::create();
        User::create([
            'name' => $faker->name,
            'email' => $faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // password
            'remember_token' => Str::random(10),
        ]);
    }
}
