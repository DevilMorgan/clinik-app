<?php

namespace App\Models\Tenant\History_medical;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RecordAgreement extends Model
{
    use HasFactory, UsesTenantConnection;

    protected $fillable = [
        'id',
        'name_agreement',
        'second_name_agreement',
        'first_lastname_agreement',
        'second_lastname_agreement',
        'email_agreement',
        'email_optional_agreement',
        'code_agreement',
        'card_type_id_agreement',
        'id_card_agreement',
        'country_agreement',
        'department_agreement',
        'city_agreement',
        'neighborhood_agreement',
        'address_agreement',
        'address_type_agreement',
        'postcode_agreement',
        'code_agreement_agreement',
        'economic_activity_agreement',
        'business_type_agreement',
        'agreement_fee',
        'moderating_fee',
        'record_id'
    ];


    /**
     * @return BelongsTo
     */
    public function record(): BelongsTo
    {
        return $this->belongsTo(Record::class);
    }
}
