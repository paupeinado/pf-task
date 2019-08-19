<?php
require __DIR__ . '/../vendor/autoload.php';

use App\ApiService;
use App\FileCache;
use App\ShippingService;
use App\Structures\AddressItem;
use App\Structures\ProductItem;
use App\ErrorLogger;
use Dotenv\Dotenv;

$dotenv = Dotenv::create('../');
$dotenv->load();

$logger = new ErrorLogger();

$api = new ApiService(getenv('API_KEY'));

$product = new ProductItem(7679, 2);
$orderItems = [$product];

$address = new AddressItem('11025 Westlake Dr',
    'Charlotte', 28273, 'NC', 'US');

$cache = new FileCache($logger);
$service = new ShippingService($api, $cache, $logger);

$rates = $service->getRates($orderItems, $address);

print_r($rates);
