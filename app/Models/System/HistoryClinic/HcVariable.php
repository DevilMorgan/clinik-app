<?php

namespace App\Models\System\HistoryClinic;

use Hyn\Tenancy\Traits\UsesSystemConnection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class HcVariable extends Model
{
    use HasFactory, UsesSystemConnection, SoftDeletes;

    protected $fillable = [
        'id',
        'name',
        'description',
        'code',
        'config',
        'status',
        'hc_variable_type_id'
    ];

    protected $casts = [
        'config' => 'array',
    ];

    /**
     * @return BelongsTo
     */
    public function hc_variable_type(): BelongsTo
    {
        return $this->belongsTo(HcVariableType::class);
    }

    /**
     * @return BelongsTo
     */
    public function hc_modules(): BelongsToMany
    {
        return $this->belongsToMany(HcModule::class, 'hc_modules_hc_variables');
    }
}
