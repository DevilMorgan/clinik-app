<?php

namespace App\Models\System;

use Hyn\Tenancy\Traits\UsesSystemConnection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CIE10 extends Model
{
    use HasFactory, UsesSystemConnection;

    protected $fillable = [
        'code',
        'description',
    ];

    public $timestamps = false;

    protected $table = 'cie10';
}
