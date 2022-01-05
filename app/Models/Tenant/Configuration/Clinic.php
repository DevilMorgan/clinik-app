<?php

namespace App\Models\Tenant\Configuration;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Clinic extends Model
{
    use HasFactory, UsesTenantConnection, SoftDeletes;

    protected $fillable = [
        'id',
        'name',
        'address',
        'country',
        'department',
        'city',
        'schedule',
        'phone',
        'cellphone',
    ];

    /**
     * @return HasMany
     */
    public function surgeries(): HasMany
    {
        return $this->hasMany(Surgery::class);
    }
}
