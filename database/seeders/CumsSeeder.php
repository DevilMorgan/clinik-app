<?php

namespace Database\Seeders;

use App\Models\System\Cums;
use Illuminate\Database\Seeder;

class CumsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cums::query()->truncate();
        $csvFile = fopen(base_path("database/data/cums-2021-12-10.csv"), "r");

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ";")) !== FALSE) {
            if (!$firstline) {
                //dd($data[22]);
                Cums::query()->create([
                    "record"    => !empty($data[0]) ? "$data[0]":null,
                    "product"   => !empty($data[1]) ? $data[1]:null,
                    "holder"    => !empty($data[2]) ? $data[2]:null,
                    "health_register" => !empty($data[3]) ? $data[3]:null,
                    "expedition_date" => !empty($data[4]) ? $data[4]:null,
                    "expiration_date" => !empty($data[5]) ? $data[5]:null,
                    "registration_status"   => !empty($data[6]) ? $data[6]:null,
                    "record_cum"            => !empty($data[7]) ? $data[7]:null,
                    "consecutive_cum"       => !empty($data[8]) ? $data[8]:null,
                    "amount_cum"            => !empty($data[9]) ? $data[9]:null,
                    "commercial_description"=> !empty($data[10]) ? $data[10]:null,
                    "status_cum"            => !empty($data[11]) ? $data[11]:null,
                    "active_date"           => !empty($data[12]) ? $data[12]:null,
                    "inactive_date"         => !empty($data[13]) ? $data[13]:null,
                    "medical_sample"        => !empty($data[14]) ? $data[14]:null,
                    "unit"                  => !empty($data[15]) ? $data[15]:null,
                    "atc"                   => !empty($data[16]) ? $data[16]:null,
                    "description_atc"       => !empty($data[17]) ? $data[17]:null,
                    "via_administration"    => !empty($data[18]) ? $data[18]:null,
                    "concentration"         => !empty($data[19]) ? $data[19]:null,
                    "active_principle"      => !empty($data[20]) ? $data[20]:null,
                    "unit_measure"          => !empty($data[21]) ? $data[21]:null,
                    "amount"                => !empty($data[22]) ? $data[22]:null,
                    "reference_unit"        => !empty($data[23]) ? $data[23]:null,
                    "pharmaceutical_form"   => !empty($data[24]) ? $data[24]:null,
                    "role_name"             => !empty($data[25]) ? $data[25]:null,
                    "role_type"             => !empty($data[26]) ? $data[26]:null,
                    "modality"              => !empty($data[27]) ? $data[27]:null,
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
