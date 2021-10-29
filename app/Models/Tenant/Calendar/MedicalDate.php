<?php

namespace App\Models\Tenant\Calendar;

use App\Models\Tenant\Patient\Patient;
use App\Models\Tenant\User;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MedicalDate extends Model
{
    use HasFactory, UsesTenantConnection, SoftDeletes;

    protected $fillable = [
        'id',
        'start_date',
        'end_date',
        'type_date',
        'description',
        'place',
        'user_id',
        'patient_id',
        'money',
        'patient_id',
        'date_type_id',
        'consent_id',
        'agreement_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function patient(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }
}
