<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'iso_code',
        'currency_code',
        'currency_symbol',
        'usd_value',
        '_token',
    ];

    protected $appends = ['flag_emoji'];

    public function getFlagEmojiAttribute()
    {
        return collect(explode('-', $this->iso_code))
            ->map(fn ($char) => 
                mb_chr(ord($char) % 32 + 0x1F1E5)
            )
            ->join('');
    }

    public function users() : HasMany {
        return $this->hasMany(User::class);
    }
}
