<?php

namespace App\Models\System\HistoryClinic;

use Hyn\Tenancy\Traits\UsesSystemConnection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class HcModule extends Model
{
    use HasFactory, UsesSystemConnection, SoftDeletes;

    protected $fillable = [
        'id',
        'name',
        'description',
        'code',
        'type',
        'is_required',
        'is_end_records',
        'status'
    ];

    /**
     * @return BelongsToMany
     */
    public function hc_variables(): BelongsToMany
    {
        return $this->belongsToMany(HcVariable::class, 'hc_modules_hc_variables')
            ->withPivot('order')
            ->orderBy('hc_modules_hc_variables.order');
    }

    /**
     * @return BelongsToMany
     */
    public function hc_templates(): BelongsToMany
    {
        return $this->belongsToMany(HcTemplate::class, 'hc_modules_hc_templates');
    }
}
