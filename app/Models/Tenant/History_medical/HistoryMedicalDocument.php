<?php

namespace App\Models\Tenant\History_medical;

use App\Models\Tenant\Calendar\Consent;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class HistoryMedicalDocument extends Model
{
    use HasFactory, UsesTenantConnection, SoftDeletes;

    protected $fillable = [
        'id',
        'code',
        'directory',
        'validity_at',
        'status',
        'document_type_id',
        'wait_authorization',
        'link_authorization',
        'remember_token',
        'consent_id',
        'record_id',
    ];

    /**
     * @return BelongsTo
     */
    public function record(): BelongsTo
    {
        return $this->belongsTo(Record::class);
    }


    /**
     * @return string
     */
    public function getReferenceAttribute(): string
    {
        return "{$this->code}{$this->id}";
    }

    /**
     * @return BelongsTo
     */
    public function consent(): BelongsTo
    {
        return $this->belongsTo(Consent::class);
    }
}
