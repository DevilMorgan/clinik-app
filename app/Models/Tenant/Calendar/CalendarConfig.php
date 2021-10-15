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
        'schedule_on',
        'date_duration',
        'date_interval',
        'user_id'
    ];

    protected $casts = [
        'schedule_on'  => 'array'
    ];

    protected $table = 'calendar_config';
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
