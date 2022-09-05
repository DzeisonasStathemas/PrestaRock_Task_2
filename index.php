<?php

use PrestaApp\Controllers\PartitionerController;
use Philo\Blade\Blade;
use PrestaApp\Services\FileReaderService;
use PrestaApp\Services\PartitionerService;
use PrestaApp\Services\PrinterService;

require_once realpath("vendor/autoload.php");

$data = [1, 2, 4, 7, 1, 6, 2, 8];
$groupCount = 3;

$views = __DIR__ . '/src/resources/views';
$cache = __DIR__ . '/cache';

$blade = new Blade($views, $cache);
$partitionerService = new PartitionerService();
$printerService = new PrinterService($blade);

$partitionerController = new PartitionerController(
    $partitionerService,
    $printerService,
);

$partitionerController->getPartitioned($groupCount, $data);

?>