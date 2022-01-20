<?php

namespace App\Models\System;

use Hyn\Tenancy\Traits\UsesSystemConnection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Occupations extends Model
{
    use HasFactory, UsesSystemConnection;

    protected $fillable = [
        'id',
        'code',
        'name'
    ];

    public $timestamps = false;

    /**
     * @return string
     */
    public function getCodeNameAttribute(): string
    {
        return "({$this->code}) {$this->name}";
    }
}
