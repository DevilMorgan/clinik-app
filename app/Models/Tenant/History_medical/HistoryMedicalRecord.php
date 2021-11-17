<?php

namespace App\Models\Tenant\History_medical;

use App\Models\Tenant\Patient\Patient;
use App\Models\Tenant\User;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HistoryMedicalRecord extends Model
{
    use HasFactory, UsesTenantConnection, SoftDeletes;

    protected $fillable = [
        'id',
        'date',
        'history_medical_category_id',
        'user_id',
        'patient_id'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function history_medical_model(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(HistoryMedicalModel::class);
    }

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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function record_data(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(RecordData::class);
    }
}
