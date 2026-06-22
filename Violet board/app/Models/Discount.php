<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Discount extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'type',
        'value',
        'starts_at',
        'ends_at',
    ];

    protected function casts(): array
    {
        return [
            'value'      => 'decimal:2',
            'starts_at'  => 'datetime',
            'ends_at'    => 'datetime',
            'created_at' => 'datetime',
        ];
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function isActive(): bool
    {
        $now = now();

        if ($this->starts_at && $now->lt($this->starts_at)) {
            return false;
        }

        if ($this->ends_at && $now->gt($this->ends_at)) {
            return false;
        }

        return true;
    }

    public function calculatePrice(float $originalPrice): float
    {
        if ($this->type === 'percentage') {
            return round($originalPrice * (1 - $this->value / 100), 2);
        }

        return max(0, round($originalPrice - $this->value, 2));
    }
}
