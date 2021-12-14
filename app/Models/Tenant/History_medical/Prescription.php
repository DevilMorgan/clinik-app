<?php

namespace App\Models\Tenant\History_medical;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prescription extends Model
{
    use HasFactory, UsesTenantConnection, SoftDeletes;

    protected $fillable = [
        'id',
        'name',
        'dose',
        'frequency',
        'via_administration',
        'amount',
        'duration',
        'delivery',
        'indications',
        'recommendations',
        'diagnosis_id',
        'cums_id'
    ];


    /**
     * @return BelongsTo
     */
    public function diagnosis(): BelongsTo
    {
        return $this->belongsTo(Diagnosis::class);
    }
}
