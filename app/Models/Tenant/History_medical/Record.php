<?php

namespace App\Models\Tenant\History_medical;

use App\Models\Tenant\Configuration\Surgery;
use App\Models\Tenant\Patient\Patient;
use App\Models\Tenant\User;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Record extends Model
{
    use HasFactory, UsesTenantConnection, SoftDeletes;

    protected $fillable = [
        'id',
        'date',
        'history_medical_model_id',
        'user_id',
        'patient_id',
        'surgery_id',
        'reference',
        'finished'
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
    public function record_categories(): HasMany
    {
        return $this->hasMany(RecordCategory::class);
    }

    /**
     * @return HasOne
     */
    public function basic_information():HasOne
    {
        return $this->hasOne(RecordBasicInformation::class);
    }

    /**
     * @return HasOne
     */
    public function diagnosis():HasOne
    {
        return $this->hasOne(Diagnosis::class);
    }

    /**
     * @return BelongsTo
     */
    public function surgery():BelongsTo
    {
        return $this->belongsTo(Surgery::class);
    }


}
