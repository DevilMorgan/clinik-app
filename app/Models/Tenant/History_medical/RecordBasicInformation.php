<?php

namespace App\Models\Tenant\History_medical;

use App\Models\Tenant\CardType;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class RecordBasicInformation extends Model
{
    use HasFactory, UsesTenantConnection, SoftDeletes;


    protected $fillable = [
        'id',
        'record_id',

        'patient_name',
        'patient_last_name',
        'patient_id_card',
        'patient_date_birth',
        'patient_place_birth',
        'patient_observation',
        'patient_blood_group',
        'patient_gender',
        'patient_occupation',
        'patient_marital_status',
        'patient_card_type_id',
        'patient_cellphone',
        'patient_email',
        'patient_phone',
        'patient_address',
        'patient_neighborhood',
        'patient_country',
        'patient_department',
        'patient_city',
        'patient_entity',
        'patient_contributory_regime',
        'patient_status_medical',

        'user_name',
        'user_last_name',
        'user_email',
        'user_id_card',
        'user_cellphone',
        'user_card_type_id',
        'user_code_profession',
        'user_profession',

        'responsable_relationship',
        'responsable_name',
        'responsable_last_name',
        'responsable_cellphone',
        'responsable_email',
        'responsable_address',
        'responsable_country',
        'responsable_department',
        'responsable_city',
        'responsable_id_card',
        'responsable_card_type_id',
    ];

    protected $table = 'record_basic_information';

    /**
     * @return BelongsTo
     */
    public function patient_card_type():BelongsTo
    {
        return $this->belongsTo(CardType::class, 'patient_card_type_id');
    }

    /**
     * @return BelongsTo
     */
    public function user_card_type():BelongsTo
    {
        return $this->belongsTo(CardType::class, 'user_card_type_id');
    }

    /**
     * @return BelongsTo
     */
    public function responsable_card_type():BelongsTo
    {
        return $this->belongsTo(CardType::class, 'responsable_card_type_id');
    }

    /**
     * @return BelongsTo
     */
    public function record():BelongsTo
    {
        return $this->belongsTo(Record::class, 'record_id');
    }

    /**
     * @return string
     */
    public function getFullNamePatientAttribute(): string
    {
        return "{$this->patient_name} {$this->patient_last_name}";
    }
}
