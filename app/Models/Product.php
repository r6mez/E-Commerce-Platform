<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $fillable = ['name', 'description', 'price', 'stock', 'user_id', 'category_id', 'discount'];
    
    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }


    public function category() : BelongsTo {
        return $this->belongsTo(Category::class);
    }

    public function photos() : HasMany {
        return $this->hasMany(Photo::class);
    }

    public function orders() : HasMany {
        return $this->hasMany(Order::class);
    }
}
