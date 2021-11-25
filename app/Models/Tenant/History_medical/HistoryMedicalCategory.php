<?php

namespace App\Models\Tenant\History_medical;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class HistoryMedicalCategory extends Model
{
    use HasFactory, SoftDeletes, UsesTenantConnection;

    protected $fillable = [
        'id',
        'name',
        'is_various',
        'end-records',
        'status'
    ];

    /**
     * @return BelongsToMany
     */
    public function history_medical_modules(): BelongsToMany
    {
        return $this->belongsToMany(HistoryMedicalModel::class, 'hm_models_hm_categories')
            ->withPivot('order')->orderByPivot('order');
    }

    /**
     * @return HasMany
     */
    public function history_medical_variables(): HasMany
    {
        return $this->hasMany(HistoryMedicalVariable::class);
    }

    /**
     * @return HasMany
     */
    public function record_categories(): HasMany
    {
        return $this->hasMany(RecordCategory::class);
    }


}
