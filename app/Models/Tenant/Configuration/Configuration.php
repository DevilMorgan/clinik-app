<?php

namespace App\Models\Tenant\Configuration;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Configuration extends Model
{
    use HasFactory, UsesTenantConnection;

    protected $fillable = [
        'id',
        'name',
        'modify',
        'config_data'
    ];

    protected $casts = [
        'config_data' => 'object',
    ];

    protected $table = 'configuration';
}
