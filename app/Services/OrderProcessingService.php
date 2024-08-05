<?php

namespace App\Services;

use App\Models\Order;
use App\Services\GoogleSheetsServices;

class OrderProcessingService
{
    protected $googleSheets;

    public function __construct(GoogleSheetsServices $googleSheets)
    {
        $this->googleSheets = $googleSheets;
    }

    public function processOrders()
    {
        $sheetData = $this->googleSheets->getSheetData();

        foreach ($sheetData as $row) {
            // Validate and transform data
            $orderId = isset($row[0]) ? intval($row[0]) : null;
            $clientEmail = isset($row[1]) ? filter_var($row[1], FILTER_VALIDATE_EMAIL) : null;
            $status = isset($row[2]) ? $row[2] : 'pending'; // Default status if missing
            $total = isset($row[3]) ? floatval($row[3]) : 0.0;
            $note = isset($row[4]) ? $row[4] : '';

            // Skip rows with invalid data
            if (is_null($orderId) || is_null($clientEmail)) {
                continue;
            }

            $orderData = [
                'order_id' => $orderId,
                'client_email' => $clientEmail,
                'status' => $status,
                'total' => $total,
                'note' => $note,
            ];

            Order::updateOrCreate(['order_id' => $orderId], $orderData);
        }
    }
}
