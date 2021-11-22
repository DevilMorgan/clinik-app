<?php

namespace App\Models\Tenant\History_medical;

use App\Models\Tenant\User;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class HistoryMedicalModel extends Model
{
    use HasFactory, SoftDeletes, UsesTenantConnection;

    protected $fillable = [
        'id',
        'name',
        'status'
    ];

    /**
     * @return BelongsTo
     */
    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'users_history_medical_models');
    }

    /**
     * @return BelongsToMany
     */
    public function history_medical_categories(): BelongsToMany
    {
        return $this->belongsToMany(HistoryMedicalCategory::class, 'hm_models_hm_categories')
            ->withPivot('order')->orderByPivot('order');
    }

    /**
     * @return BelongsTo
     */
    public function history_medical_records(): BelongsTo
    {
        return $this->belongsTo(HistoryMedicalRecord::class);
    }


}
