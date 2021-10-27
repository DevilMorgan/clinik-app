<?php

namespace App\Models\Tenant\Calendar;

use App\Models\Tenant\User;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class DateType extends Model
{
    use HasFactory, UsesTenantConnection;

    protected $fillable = [
        'name',
        'price',
        'user_id'
    ];

    /**
     * @return BelongsToMany
     */
    public function agreements(): BelongsToMany
    {
        return $this->belongsToMany(Agreement::class, 'date_types_agreements')
            ->withPivot('price');
    }


    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
