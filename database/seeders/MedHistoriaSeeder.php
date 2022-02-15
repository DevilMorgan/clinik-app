<?php

namespace Database\Seeders;

use App\Models\Tenant\Autorization\Module;
use App\Models\Tenant\Autorization\Role;
use App\Models\Tenant\History_medical\VariableType;
use App\Models\Tenant\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class MedHistoriaSeeder extends Seeder
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
            'name_first' => $faker->name,
            'email' => $faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // password
            'remember_token' => Str::random(10),
        ]);

        //add new roles
        $roles = [
            ['name' => 'All'],
            ['name' => 'Manager'],
            ['name' => 'Operative'],
            ['name' => 'Administrative']
        ];
        foreach ($roles as $role) Role::create($role);

        //add new modules
        $modules = [
            //Manager
            ['name'  => 'Users', 'slug'  => 'users', 'status'=> 1, 'role_id' => 2],
            ['name'  => 'Manager Medical History', 'slug'  => 'manager-medical-history', 'status'=> 1, 'role_id' => 2],
            ['name'  => 'Clinics', 'slug'  => 'clinics', 'status'=> 1, 'role_id' => 2],
            ['name'  => 'My Surgery', 'slug'  => 'my-surgery', 'status'=> 1, 'role_id' => 2],
            ['name'  => 'Consents', 'slug'  => 'consents', 'status'=> 1, 'role_id' => 2],
            ['name'  => 'Agreements', 'slug'  => 'agreements', 'status'=> 1, 'role_id' => 2],
            ['name'  => 'Date Types', 'slug'  => 'date-types', 'status'=> 1, 'role_id' => 2],

            //Operative
            ['name'  => 'Calendar', 'slug'  => 'calendar', 'status'=> 1, 'role_id' => 3],
            ['name'  => 'Medical History', 'slug'  => 'medical-history', 'status'=> 1, 'role_id' => 3],

            //Administrative
            ['name'  => 'General Calendar', 'slug'  => 'calendar-administrative', 'status'=> 1, 'role_id' => 4],

            //All
            ['name'  => 'Patients', 'slug'  => 'patients', 'status'=> 1, 'role_id' => 1],
            ['name'  => 'Document Management', 'slug'  => 'document-management', 'status'=> 1, 'role_id' => 1],
            ['name'  => 'Information', 'slug'  => 'information', 'status'=> 1, 'role_id' => 3],
            ['name'  => 'Billing', 'slug'  => 'billing', 'status'=> 0, 'role_id' => 1],
        ];
        Module::query()->upsert($modules, ['name']);

        //permission roles
        $user->roles()->sync([1=> ['name' => 'Manager'], 2 => ['name' => 'Operative'],3 => ['name' => 'Administrative']]);

        //permission modules
        $moduleIds = Module::query()->where('status', '=', 1)->get(['id']);
        $user->modules()->sync($moduleIds->pluck('id'));

    }
}
