<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Services\OrderProcessingService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $orderProcessingService;

    public function __construct(OrderProcessingService $orderProcessingService)
    {
        $this->orderProcessingService = $orderProcessingService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Process orders
        $this->orderProcessingService->processOrders();

        // Check if there's a search query
        if ($request->has('query')) {
            $query = $request->input('query');
            $orders = Order::search($query)->get();
        } else {
            $orders = Order::all();
        }

        return view('orders.index', compact('orders'));
    }

    /**
     * Show charts of order status and total sales.
     */
    public function charts()
    {
        $this->orderProcessingService->processOrders();
        $orders = Order::all();
        $orderStatuses = $orders->groupBy('status')->map->count();
        $orderTotals = $orders->sum('total');
        return view('orders.charts', compact('orderStatuses', 'orderTotals'));
    }
    // public function export()
    // {
    //     return Excel::download(new OrdersExport, 'orders.xlsx');
    // }
    public function search(Request $request)
    {
        $query = $request->input('query');
        $orders = Order::search($query)->get();

        return view('orders.index', compact('orders'));
    }
}
