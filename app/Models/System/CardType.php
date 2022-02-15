<?php

namespace App\Models\System;

use Hyn\Tenancy\Traits\UsesSystemConnection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CardType extends Model
{
    use HasFactory, UsesSystemConnection;

    protected $fillable = [
        'id',
        'name',
        'name_short'
    ];

    public $timestamps = false;

    /**
     * List user with one card type
     *
     * @return BelongsTo
     */
    public function users_tenant(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Tenant\User::class);
    }

    /**
     * List user with one card type
     *
     * @return BelongsTo
     */
    public function users_system(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
