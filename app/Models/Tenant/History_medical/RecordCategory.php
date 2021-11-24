<?php

namespace App\Models\Tenant\History_medical;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class RecordCategory extends Model
{
    use HasFactory, UsesTenantConnection, SoftDeletes;

    protected $fillable = [
        'id',
        'record_id',
        'history_medical_category_id',
        'code',
    ];


    /**
     * @return BelongsTo
     */
    public function history_medical_category(): BelongsTo
    {
        return $this->belongsTo(HistoryMedicalCategory::class);
    }


    /**
     * @return HasMany
     */
    public function record_data(): HasMany
    {
        return $this->hasMany(RecordData::class);
    }
}
