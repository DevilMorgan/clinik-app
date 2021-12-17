<?php

namespace App\Models\System;

use Hyn\Tenancy\Traits\UsesSystemConnection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cups extends Model
{
    use HasFactory, UsesSystemConnection;

    protected $fillable = [
        'code',
        'description'
    ];

    protected $table = 'cups';

    public $timestamps = false;

}
