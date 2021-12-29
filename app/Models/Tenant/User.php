<?php

namespace App\Models\Tenant;

use App\Models\Tenant\Autorization\Module;
use App\Models\Tenant\Autorization\Role;
use App\Models\Tenant\Calendar\Agreement;
use App\Models\Tenant\Calendar\CalendarConfig;
use App\Models\Tenant\Calendar\Consent;
use App\Models\Tenant\Calendar\DateType;
use App\Models\Tenant\Calendar\MedicalDate;
use App\Models\Tenant\History_medical\HistoryMedicalModel;
use App\Models\Tenant\History_medical\Record;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
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
        'code_profession',
        'profession',
        'surgery_id',
        'digital_signature',
        'status',
        'card_type_id',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [

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

    protected $with = ['modules'];

    /**
     * @return BelongsTo
     */
    public function card_type(): BelongsTo
    {
        return $this->belongsTo(CardType::class);
    }


    /**
     * @return BelongsToMany
     */
    public function modules(): BelongsToMany
    {
        return $this->belongsToMany(Module::class, 'users_modules');
    }

    /**
     * @return BelongsToMany
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'users_roles')->withPivot(['name', 'status']);
    }

    /**
     * @return HasOne
     */
    public function calendar_config(): HasOne
    {
        return $this->hasOne(CalendarConfig::class);
    }


    /**
     * @return HasMany
     */
    public function medical_dates(): HasMany
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
     * @return HasMany
     */
    public function history_medical_records(): HasMany
    {
        return $this->hasMany(Record::class);
    }

    /**
     * @return HasMany
     */
    public function date_types(): HasMany
    {
        return $this->hasMany(DateType::class);
    }
    /**
     * @return HasMany
     */
    public function agreements(): HasMany
    {
        return $this->hasMany(Agreement::class);
    }
    /**
     * @return HasMany
     */
    public function consents(): HasMany
    {
        return $this->hasMany(Consent::class);
    }

    /**
     * Validate access module
     *
     * @param $moduleSlug
     * @return bool
     */
    public function is_access($moduleSlug): bool
    {
        //return $this->modules()->where('slug', 'like', $moduleSlug)->where('status', '=', 1)->count() > 0;
        return in_array($moduleSlug, array_column($this->modules->toArray(), 'slug'));
    }

    /**
     * validate manager
     *
     * @return bool
     */
    public function is_manager(): bool
    {
        return $this->roles()->where('roles.id', '=', 1)->exists();
    }
}
