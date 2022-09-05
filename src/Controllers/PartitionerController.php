<?php 

declare (strict_types = 1);

namespace PrestaApp\Controllers;

use PrestaApp\Services\PartitionerService;
use PrestaApp\Services\PrinterService;

class PartitionerController
{
    private const CLI_NAME = 'cli';

    function __construct(
        private PartitionerService $partitionerService,
        private PrinterService $printerService,
    ) {
    }

    public function getPartitioned(int $groupCount, array $data): array
    {
         $partitionedData = $this->partitionerService->getPairedValues($groupCount, $data);
         $maximumColumnCount = max(array_keys($partitionedData));
               
         if (php_sapi_name() === self::CLI_NAME) {
            $this->printerService->printToConsole($partitionedData);
         } else {
            $this->printerService->printToWebsite($partitionedData, $maximumColumnCount);
         }
        
         return $partitionedData;
    }
}

?>