<?php

namespace App\Models\Tenant\Patient;

use App\Models\Tenant\Calendar\MedicalDate;
use App\Models\Tenant\History_medical\Record;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use HasFactory, SoftDeletes, UsesTenantConnection;

    protected $fillable = [
        'id',
        'name_first',
        'name_second',
        'lastname_first',
        'lastname_second',
        'id_card',
        'photo',
        'date_birth',
        //'place_birth',
        'country_birth',
        'code_country_birth',
        'department_birth',
        'code_department_birth',
        'city_birth',
        'code_city_birth',
        'blood_group',
        'gender',
        'gender_identity',
        'occupation',
        'code_occupation',
        'marital_status',
        'cellphone',
        'email',
        'phone',
        'address',
        'neighborhood',
        'locality',
        'postcode',
        'stratum',
        'ethnicity',
        'ethnic_community',
        'uptown',
        'country',
        'code_country',
        'department',
        'code_department',
        'city',
        'code_city',
        'entity',
        'code_entity',
        'contributory_regime',
        'opposition_organ_donation',
        'advance_directive',
        'code_advance_directive',
        'impairment',
        'status_medical',
        'code',
        'status',
        'observation',
        'card_type_id',
    ];

    protected $appends = [
        'full_name',
        'name',
        'lastname'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function medical_dates(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(MedicalDate::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function history_medical_records(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Record::class);
    }

    /**
     * @return string
     */
    public function getFullNameAttribute(): string
    {
        return "{$this->name_first} {$this->name_second} {$this->lastname_first} {$this->lastname_second}";
    }

    /**
     * @return string
     */
    public function getNameAttribute(): string
    {
        return "{$this->name_first} {$this->name_second}";
    }

    /**
     * @return string
     */
    public function getLastNameAttribute(): string
    {
        return "{$this->lastname_first} {$this->lastname_second}";
    }
}
