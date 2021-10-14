<?php

namespace Database\Seeders;

use App\Models\Tenant\Autorization\Module;
use Illuminate\Database\Seeder;

class ModulesTenatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Module::create([
            'name' => 'Calendario',
            'slug' => 'calendario',
            'role_id' => 1,
            'status' => true,
        ]);
        Module::create([
            'name' => 'Pacientes',
            'slug' => 'pacientes',
            'role_id' => 1,
            'status' => true,
        ]);
        Module::create([
            'name' => 'Historia Clínica',
            'slug' => 'historia-clinica',
            'role_id' => 1,
            'status' => true,
        ]);
        Module::create([
            'name' => 'Usuarios',
            'slug' => 'usuarios',
            'role_id' => 1,
            'status' => true,
        ]);
        Module::create([
            'name' => 'Calendario',
            'slug' => 'calendario',
            'role_id' => 2,
            'status' => true,
        ]);
        Module::create([
            'name' => 'Pacientes',
            'slug' => 'pacientes',
            'role_id' => 2,
            'status' => true,
        ]);
    }
}
