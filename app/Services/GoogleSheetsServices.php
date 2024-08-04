<?php

namespace App\Services;

use Google\Client;
use Google\Service\Sheets;
use Google\Service\Sheets\ValueRange;

class GoogleSheetsServices
{
    public $client, $service, $spreadsheetId, $range;
    public function __construct()
    {
        $this->client = $this->getClient();
        $this->service = new Sheets($this->client);
        $this->spreadsheetId = '1O5aD5fsdJqJU6unPTl73XMBXq2Klq7dUCb74sbzRVVQ';
        $this->range = 'A:Z';
    }
    public function getClient()
    {
        $client = new Client();
        $client->setApplicationName('Google Sheets and PHP');
        $client->setRedirectUri('http://localhost:8000/google-sheets');
        $client->setScopes(Sheets::SPREADSHEETS);
        $client->setAuthConfig(storage_path('credentials.json'));
        $client->setAccessType('offline');
        return $client;
    }
    public function getSheetData()
    {
        $response = $this->service->spreadsheets_values->get($this->spreadsheetId, $this->range);
        return $response->getValues();
    }
}
