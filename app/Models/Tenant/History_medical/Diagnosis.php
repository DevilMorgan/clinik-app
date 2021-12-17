<?php

namespace App\Models\Tenant\History_medical;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Diagnosis extends Model
{
    use HasFactory, UsesTenantConnection, SoftDeletes;

    protected $fillable = [
        'code',
        'description',
        'code_optional_one',
        'description_optional_one',
        'code_optional_two',
        'description_optional_two',
        'days_off',
        'description_days_off',
        'abstract',
        'record_id'
    ];

    protected $table = 'diagnosis';

    /**
     * @return BelongsTo
     */
    public function record(): BelongsTo
    {
        return $this->belongsTo(Record::class);
    }

    /**
     * @return HasMany
     */
    public function procedures(): HasMany
    {
        return $this->hasMany(Procedure::class);
    }

    /**
     * @return HasMany
     */
    public function prescription(): HasMany
    {
        return $this->hasMany(Prescription::class);
    }
}
