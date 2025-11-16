<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require __DIR__ . '/../../../vendor/autoload.php';

if ($_SERVER['SERVER_NAME'] == 'localhost' || $_SERVER['SERVER_NAME'] == '127.0.0.1') {
    // Your correct local backend URL
    define('BASE_URL', 'http://localhost/Nedim_Kusturica_CarRental/backend');
} else {
    define('BASE_URL', 'https://your-production-domain.com/backend');
}

$openapi = \OpenApi\Generator::scan([
    __DIR__ . '/doc_setup.php',
    __DIR__ . '/../../../routes'
]);

header('Content-Type: application/json');
echo $openapi->toJson();
?>
