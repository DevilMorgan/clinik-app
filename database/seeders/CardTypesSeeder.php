<?php

namespace Database\Seeders;

use App\Models\Tenant\CardType;
use Illuminate\Database\Seeder;

class CardTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Create new cards type
        $cardTypes = [
            ['name' => 'Cédula de ciudadanía', 'name_short' => 'CC'],
            ['name' => 'Cédula extranjera', 'name_short' => 'CE'],
            ['name' => 'Carnet diplomático', 'name_short' => 'CD'],
            ['name' => 'Pasaporte', 'name_short' => 'PA'],
            ['name' => 'Salvo conducto de permanencia', 'name_short' => 'SC'],
            ['name' => 'Permiso temporal de permanencia', 'name_short' => 'PT'],
            ['name' => 'Permiso esencial de permanencia', 'name_short' => 'PE'],
            ['name' => 'Registro civil', 'name_short' => 'RC'],
            ['name' => 'Tarjeta de identidad', 'name_short' => 'TI'],
            ['name' => 'Certificado de Nacido Vivo', 'name_short' => 'CN'],
            ['name' => 'Adulto sin identificar', 'name_short' => 'AS'],
            ['name' => 'Menor sin identificar', 'name_short' => 'MS'],
            ['name' => 'Documento extranjero', 'name_short' => 'DE'],
            ['name' => 'Sin identificación', 'name_short' => 'SI'],
            ['name' => 'NIT', 'name_short' => 'NIT'],
        ];
        //foreach ($cardTypes as $cardType) CardType::create($cardType);

        CardType::query()->upsert($cardTypes, ['name_short']);
    }
}
