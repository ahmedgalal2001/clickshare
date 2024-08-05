<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function attributes()
    {
        return $this->morphMany(AttributeValue::class, 'attributable');
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function bundles()
    {
        return $this->belongsToMany(Bundle::class);
    }
}
