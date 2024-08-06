<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Order;
use Carbon\Carbon;

class OrderManagement extends Component
{
    public $dateRange;
    public $orderStatus;
    public $customerSegment;
    public $sortField = 'created_at';
    public $sortDirection = 'desc';

    public function render()
    {
        $orders = Order::query()
            ->when($this->dateRange, function ($query) {
                $dates = explode(' - ', $this->dateRange);
                $query->whereBetween('created_at', [Carbon::parse($dates[0]), Carbon::parse($dates[1])]);
            })
            ->when($this->orderStatus, function ($query) {
                $query->where('status', $this->orderStatus);
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->get();
        return view('livewire.order-management', ['orders' => $orders]);
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }
}
