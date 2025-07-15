<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = ['photo_url', 'product_id'];

    public function getPhotoUrlAttribute()
    {
        $path = $this->attributes['photo_url'];
        if (str_contains($path, 'http')) {
            return $path;
        }

        return asset("storage/{$path}");
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
