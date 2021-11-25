<?php

namespace App\Models\Tenant\History_medical;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class RecordData extends Model
{
    use HasFactory, SoftDeletes, UsesTenantConnection;

    protected $fillable = [
        'id',
        'value',
        'record_category_id',
        'history_medical_variable_id'
    ];

    protected $casts = [
        'value' => 'array'
    ];

    /**
     * @return BelongsTo
     */
    public function history_medical_variable(): BelongsTo
    {
        return $this->belongsTo(HistoryMedicalVariable::class);
    }

    /**
     * @return BelongsTo
     */
    public function record_categories(): BelongsTo
    {
        return $this->belongsTo(RecordCategory::class);
    }
}
