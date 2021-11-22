<?php

namespace App\Models\Tenant\History_medical;

use App\Models\Tenant\Patient\Patient;
use App\Models\Tenant\User;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class HistoryMedicalRecord extends Model
{
    use HasFactory, UsesTenantConnection, SoftDeletes;

    protected $fillable = [
        'id',
        'date',
        'history_medical_model_id',
        'user_id',
        'patient_id'
    ];


    /**
     * @return BelongsTo
     */
    public function history_medical_model(): BelongsTo
    {
        return $this->belongsTo(HistoryMedicalModel::class);
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsTo
     */
    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }

    /**
     * @return HasMany
     */
    public function record_data(): HasMany
    {
        return $this->hasMany(RecordData::class);
    }
}
