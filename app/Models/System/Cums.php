<?php

namespace App\Models\System;

use Hyn\Tenancy\Traits\UsesSystemConnection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cums extends Model
{
    use HasFactory, UsesSystemConnection;

    protected $fillable = [
        'id',
        'record',
        'product',
        'holder',
        'health_register',
        'expedition_date',
        'expiration_date',
        'registration_status',
        'record_cum',
        'consecutive_cum',
        'commercial_description',
        'status_cum',
        'active_date',
        'inactive_date',
        'medical_sample',
        'unit',
        'atc',
        'description_atc',
        'via_administration',
        'concentration',
        'active_principle',
        'unit_measure',
        'amount',
        'reference_unit',
        'pharmaceutical_form',
        'role_name',
        'role_type',
        'modality'
    ];

    protected $table = 'cums';

    public $timestamps = false;

    protected $casts = [
        'amount' => 'float'
    ];
}
