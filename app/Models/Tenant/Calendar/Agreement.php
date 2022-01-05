<?php

namespace App\Models\Tenant\Calendar;

use App\Models\Tenant\CardType;
use App\Models\Tenant\User;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Agreement extends Model
{
    use HasFactory, UsesTenantConnection;

    protected $fillable = [
        'name',
        'code',
        'code_agreement',
        'address',
        'department',
        'city',
        'card_type_id'
    ];

    /**
     * @return BelongsToMany
     */
    public function date_types(): BelongsToMany
    {
        return $this->belongsToMany(DateType::class, 'date_types_agreements')
            ->withPivot('agreement_fee', 'moderating_fee');
    }

    /**
     * @return BelongsTo
     */
    public function card_type(): BelongsTo
    {
        return $this->belongsTo(CardType::class, 'card_type_id', 'id');
    }
}
