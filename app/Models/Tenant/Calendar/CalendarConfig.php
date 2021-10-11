<?php

namespace App\Models\Tenant\Calendar;

use App\Models\Tenant\User;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalendarConfig extends Model
{
    use HasFactory, UsesTenantConnection;

    protected $fillable = [
        'id',
        'start_day',
        'end_day',
        'days_off',
        'hours_off',
        'date_duration',
        'date_interval',
        'user_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
