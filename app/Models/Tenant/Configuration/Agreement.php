<?php

namespace App\Models\Tenant\Configuration;

use App\Models\Tenant\Calendar\DateType;
use App\Models\Tenant\CardType;
use App\Models\Tenant\History_medical\RecordAgreement;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Agreement extends Model
{
    use HasFactory, UsesTenantConnection;

    protected $fillable = [
        'name',
        'second_name',
        'first_lastname',
        'second_lastname',
        'email',
        'email_optional',
        'code',
        'card_type_id',
        'id_card',
        'country',
        'department',
        'city',
        'neighborhood',
        'address',
        'address_type',
        'postcode',
        'code_agreement',
        'economic_activity',
        'business_type'
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

    /**
     * @return string
     */
    public function getFullNameAttribute(): string
    {
        return "{$this->name} {$this->second_name} {$this->first_lastname} {$this->second_lastname}";
    }

    /**
     * @return HasOne
     */
    public function agreement(): HasOne
    {
        return $this->hasOne(RecordAgreement::class);
    }
}
