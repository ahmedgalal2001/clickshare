<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SKU extends Model
{
    public function attributes()
    {
        return $this->morphMany(AttributeValue::class, 'attributable');
    }
}
