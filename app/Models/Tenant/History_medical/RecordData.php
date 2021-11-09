<?php

namespace App\Models\Tenant\History_medical;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RecordData extends Model
{
    use HasFactory, SoftDeletes, UsesTenantConnection;

    protected $fillable = [
        'id',
        'value',
        'history_medical_record_id',
        'history_medical_variable_id'
    ];

    protected $casts = [
        'value' => 'array'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function history_medical_variable(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(HistoryMedicalVariable::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function history_medical_record(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(HistoryMedicalRecord::class);
    }
}
