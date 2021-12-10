<?php

namespace App\Models\Tenant\History_medical;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Procedure extends Model
{
    use HasFactory, UsesTenantConnection, SoftDeletes;

    protected $fillable = [
        'id',
        'code',
        'description',
        'amount',
        'diagnosis_id'
    ];

    /**
     * @return BelongsTo
     */
    public function diagnosis(): BelongsTo
    {
        return $this->belongsTo(Diagnosis::class);
    }
}
