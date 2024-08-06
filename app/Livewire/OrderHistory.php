<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;

class OrderHistory extends Component
{
    public $orderId;

    public function render()
    {
        $order = Order::with('auditLogs')->find($this->orderId);
        return view('livewire.order-history', ['order' => $order]);
    }
}
