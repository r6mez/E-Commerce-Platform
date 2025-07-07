<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    public function category() : HasOne {
        return $this->hasOne(Category::class);
    }

    public function photos() : HasMany {
        return $this->hasMany(Product::class);
    }
}
