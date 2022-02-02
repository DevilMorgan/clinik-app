<?php

namespace App\Models\System\HistoryClinic;

use Hyn\Tenancy\Traits\UsesSystemConnection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HcTemplate extends Model
{
    use HasFactory, UsesSystemConnection, SoftDeletes;

    protected $fillable = [
        'id',
        'name',
        'description',
        'code',
        'status'
    ];


}
