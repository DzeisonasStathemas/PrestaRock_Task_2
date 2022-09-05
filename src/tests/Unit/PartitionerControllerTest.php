<?php 

declare (strict_types = 1);

namespace PrestaApp\Tests\Unit;

use PHPUnit\Framework\TestCase;
use PrestaApp\Services\PartitionerService;
use PrestaApp\Services\PrinterService;
use PrestaApp\Controllers\PartitionerController;

class PartitionerControllerTest extends TestCase
{
    private MockObject|PartitionerService $partitionerService;
    private MockObject|PrinterService $printerService;

    private PartitionerController $partitionerController;

    public function setUp(): void
    {
        $this->partitionerService = $this->createMock(PartitionerService::class);
        $this->printerService = $this->createMock(PrinterService::class);

        $this->partitionerController = new PartitionerController(
            $this->partitionerService,
            $this->printerService,
        );
    }

    public function testGetPartitioned(): void
    {
        $data = [1, 2, 4, 7, 1, 6, 2, 8];
        $groupCount = 3;
        $expectedResult = [8, 2, 1];

        $this
            ->partitionerService
            ->expects($this->once())
            ->method('getPairedValues')
            ->willReturn($expectedResult)
        ;

        $this
            ->printerService
            ->expects($this->once())
            ->method('printToConsole')
        ;

        $this->assertSame($expectedResult, $this->partitionerController->getPartitioned($groupCount, $data));
    }
}

?>