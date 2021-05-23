<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'name'
    ];

    public function setFunds(float $amount): void
    {
        $this->attributes['funds'] += $amount;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function transactionsOut(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }

    public function transactionsIn(): HasMany
    {
        return $this->hasMany(Transaction::class, 'beneficiary_id');
    }

    public function transactions(): HasMany
    {
        return $this->transactionsIn()->union($this->transactionsOut()->toBase());
    }
}
