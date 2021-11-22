<?php

namespace App\Models\Tenant\History_medical;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function history_medical_modules(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(HistoryMedicalModel::class, 'hm_models_hm_categories')
            ->withPivot('order')->orderByPivot('order');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function history_medical_variables(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(HistoryMedicalVariable::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function history_medical_records(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Record::class);
    }


}
