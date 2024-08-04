<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Services\GoogleSheetsServices;
use Illuminate\Http\Request;

class GoogleSheetsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $googleSheetsService = new GoogleSheetsServices();
        $sheetData = $googleSheetsService->getSheetData();
        foreach ($sheetData as $row) {
            $orderData = [
                'order_id' => $row[0],
                'client_email' => $row[1],
                'status' => $row[2],
                'total' => $row[3],
                'note' => $row[4],
            ];
            Order::updateOrCreate(['order_id' => $row[0]], $orderData);
        }
        return view('google-sheets.index', compact('sheetData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
