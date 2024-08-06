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
    protected static function booted()
    {
        static::updated(function ($order) {
            AuditLog::create([
                'order_id' => $order->id,
                'action' => 'updated',
                'changes' => json_encode($order->getChanges()),
            ]);
        });
    }

    public function auditLogs()
    {
        return $this->hasMany(AuditLog::class);
    }
}
