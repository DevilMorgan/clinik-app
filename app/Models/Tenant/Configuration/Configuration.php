<?php

namespace App\Models\Tenant\Configuration;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'config_data'
    ];

    protected $casts = [
        'config_data' => 'array',
    ];

    protected $table = 'configuration';
}
