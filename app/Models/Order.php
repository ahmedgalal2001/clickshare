<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Order extends Model
{
    use HasFactory, Searchable;
    protected $fillable = [
        'order_id',
        'order_date',
        'client_email',
        'status',
        'total',
        'note',
    ];

    // Define the fields to be indexed
    public function toSearchableArray()
    {
        return [
            'order_id' => $this->order_id,
            'client_email' => $this->client_email,
            'status' => $this->status,
            'total' => $this->total,
            'note' => $this->note,
        ];
    }
}
