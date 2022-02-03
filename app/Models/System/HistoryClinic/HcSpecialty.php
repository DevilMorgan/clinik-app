<?php

namespace App\Models\System\HistoryClinic;

use Hyn\Tenancy\Traits\UsesSystemConnection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class HcSpecialty extends Model
{
    use HasFactory, UsesSystemConnection;

    protected $fillable = [
        'id',
        'name',
        'status'
    ];

    protected $table = 'hc_specialties';

    /**
     * @return BelongsToMany
     */
    public function hc_templates(): BelongsToMany
    {
        return $this->belongsToMany(HcTemplate::class, 'hc_specialties_hc_templates');
    }
}
