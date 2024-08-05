<?php

use App\Services\GoogleSheetsServices;
use App\Services\OrderProcessingService;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Schedule::call(function () {
    $googleSheets = new GoogleSheetsServices();
    $processOrder =  new OrderProcessingService($googleSheets);
    $processOrder->processOrders();
})->hourly();
