<?php

namespace App\Models\Tenant\Calendar;

use App\Models\Tenant\User;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Agreement extends Model
{
    use HasFactory, UsesTenantConnection;

    protected $fillable = [
        'name',
        'code',
        'user_id'
    ];

    /**
     * @return BelongsToMany
     */
    public function date_types(): BelongsToMany
    {
        return $this->belongsToMany(DateType::class, 'date_types_agreements')
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
