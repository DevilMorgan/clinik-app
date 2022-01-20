<?php

namespace Database\Seeders;

use App\Models\Tenant\Autorization\Module;
use App\Models\Tenant\Autorization\Role;
use App\Models\Tenant\CardType;
use App\Models\Tenant\History_medical\VariableType;
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
        $faker = Faker::create();
        $user = User::create([
            'name' => $faker->name,
            'email' => $faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // password
            'remember_token' => Str::random(10),
        ]);

        $this->call([
            CardTypesSeeder::class
        ]);

        //add new roles
        $roles = [
            ['name' => 'Manager'],
            ['name' => 'Operative'],
            ['name' => 'Administrative']
        ];
        foreach ($roles as $role) Role::create($role);

        //add new modules
        $modules = [
            //Manager
            ['name'  => 'Users', 'slug'  => 'users', 'status'=> 1, 'role_id' => 1],
            ['name'  => 'Manager Medical History', 'slug'  => 'manager-medical-history', 'status'=> 1, 'role_id' => 1],
            ['name'  => 'Clinics', 'slug'  => 'clinics', 'status'=> 1, 'role_id' => 1],
            ['name'  => 'Provider Service', 'slug'  => 'provider-service', 'status'=> 1, 'role_id' => 1],
            ['name'  => 'Consents', 'slug'  => 'consents', 'status'=> 1, 'role_id' => 1],
            ['name'  => 'Agreements', 'slug'  => 'agreements', 'status'=> 1, 'role_id' => 2],

            //Operative
            ['name'  => 'Patients Operative', 'slug'  => 'patients-operative', 'status'=> 1, 'role_id' => 2],
            ['name'  => 'Personal Calendar', 'slug'  => 'calendar-operative', 'status'=> 1, 'role_id' => 2],
            ['name'  => 'Medical History', 'slug'  => 'medical-history', 'status'=> 1, 'role_id' => 2],
            ['name'  => 'Date Types', 'slug'  => 'date-types', 'status'=> 1, 'role_id' => 2],
            ['name'  => 'Information', 'slug'  => 'information', 'status'=> 1, 'role_id' => 2],
            ['name'  => 'Document Management', 'slug'  => 'document-management', 'status'=> 1, 'role_id' => 2],

            //Administrative
            ['name'  => 'Patients Administrative', 'slug'  => 'patients-administrative', 'status'=> 1, 'role_id' => 3],
            ['name'  => 'General Calendar', 'slug'  => 'calendar-administrative', 'status'=> 1, 'role_id' => 3],
            ['name'  => 'Billing', 'slug'  => 'billing', 'status'=> 0, 'role_id' => 3],
        ];
        foreach ($modules as $module) Module::create($module);



        //create variable types
        $variableTypes = [
            ['name' => 'numeric', 'status' => 1],
            ['name' => 'text', 'status' => 1],
            ['name' => 'text-short', 'status' => 1],
            ['name' => 'range', 'status' => 1],
            ['name' => 'boolean', 'status' => 1],
            ['name' => 'list', 'status' => 1],
        ];

        foreach ($variableTypes as $variableType) VariableType::create($variableType);


        //permission roles
        $user->roles()->sync([1=> ['name' => 'Manager'], 2 => ['name' => 'Operative'],3 => ['name' => 'Administrative']]);

        //permission modules
        $user->modules()->sync([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]);
    }
}
