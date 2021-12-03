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
        'name',
        'last_name',
        'id_card',
        'photo',
        'date_birth',
        'place_birth',
        'blood_group',
        'gender',
        'occupation',
        'marital_status',
        'cellphone',
        'email',
        'phone',
        'address',
        'neighborhood',
        'city',
        'entity',
        'contributory_regime',
        'status_medical',
        'code',
        'status',
        'observation',
        'card_type_id'
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

    public function getFullNameAttribute()
    {
        return "{$this->name} {$this->last_name}";
    }
}
