<?php

namespace App\Models\System;

use Hyn\Tenancy\Traits\UsesSystemConnection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sgsss extends Model
{
    use HasFactory, UsesSystemConnection;

    protected $fillable = [
        'id',
        'code',
        'name',
        'regime',
    ];

    protected $table = 'sgsss';

    public $timestamps = false;

    /**
     * @return string
     */
    public function getCodeNameAttribute(): string
    {
        return "({$this->code}) {$this->name}";
    }
}
