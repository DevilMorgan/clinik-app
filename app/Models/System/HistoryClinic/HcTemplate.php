<?php

namespace App\Models\System\HistoryClinic;

use Hyn\Tenancy\Traits\UsesSystemConnection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class HcTemplate extends Model
{
    use HasFactory, UsesSystemConnection, SoftDeletes;

    protected $fillable = [
        'id',
        'name',
        'description',
        'code',
        'status'
    ];

    /**
     * @return BelongsToMany
     */
    public function hc_modules(): BelongsToMany
    {
        return $this->belongsToMany(HcModule::class, 'hc_modules_hc_templates')
            ->withPivot('order')
            ->orderBy('hc_modules_hc_templates.order');
    }

    /**
     * @return BelongsToMany
     */
    public function hc_specialties(): BelongsToMany
    {
        return $this->belongsToMany(HcSpecialty::class, 'hc_specialties_hc_templates');
    }
}
