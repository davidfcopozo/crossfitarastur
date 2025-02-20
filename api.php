<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *'); // Solo para desarrollo, en producción especifica el dominio

include 'config.php';

$range = 'Sheet1!A1:G25';

$url = "https://sheets.googleapis.com/v4/spreadsheets/" . SPREADSHEET_ID . "/values/$range?key=" . GOOGLE_SHEETS_API_KEY;

$response = file_get_contents($url);
echo $response;
