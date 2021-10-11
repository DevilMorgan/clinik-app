<?php

namespace Database\Seeders;

use App\Models\Tenant\Autorization\Role;
use Illuminate\Database\Seeder;

class RolesTenatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'Operativo'
        ]);
        Role::create([
            'name' => 'Administrativo'
        ]);
    }
}
