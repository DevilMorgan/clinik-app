<?php

namespace App\Models\Tenant;

use App\Models\Tenant\Autorization\Module;
use App\Models\Tenant\Autorization\Role;
use App\Models\Tenant\Calendar\CalendarConfig;
use App\Models\Tenant\Calendar\MedicalDate;
use App\Models\Tenant\History_medical\HistoryMedicalModel;
use App\Models\Tenant\History_medical\HistoryMedicalRecord;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, UsesTenantConnection, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'last_name',
        'email',
        'id_card',
        'photo',
        'cellphone',
        'phone',
        'status',
        'card_type_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function modules(): \Illuminate\Database\Eloquent\Relations\MorphToMany
    {
        return $this->morphToMany(Module::class, 'users_models');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function roles(): \Illuminate\Database\Eloquent\Relations\MorphToMany
    {
        return $this->morphToMany(Role::class, 'users_roles');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function calendar_config(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(CalendarConfig::class);
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function medical_dates(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(MedicalDate::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function history_medical_models(): \Illuminate\Database\Eloquent\Relations\MorphToMany
    {
        return $this->morphToMany(HistoryMedicalModel::class, 'users_history_medical_models');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function history_medical_records(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(HistoryMedicalRecord::class);
    }
}
