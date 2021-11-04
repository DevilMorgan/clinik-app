<?php

namespace App\Models\Tenant\Autorization;

use App\Models\Tenant\User;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory, UsesTenantConnection;

    protected $fillable = [
        'id',
        'name',
    ];

    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(User::class, 'users_roles');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function modules(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Module::class);
    }
}
