<?php 

declare (strict_types = 1);

namespace PrestaApp\Services;

use Philo\Blade\Blade;

class PrinterService
{
    function __construct(
        private Blade $blade,
    ) {
    }

    public function printToConsole(array $data): void
    {
        $dataWithSum = array_map(
            fn($values) => array_merge(['groupSum' => array_sum($values)], $values),
            $data,
        );

        print_r($dataWithSum);
    }

    public function printToWebsite(array $partitionedData, int $maximumColumnCount): void 
    {
        echo $this
                ->blade
                ->view()
                ->make('index')
                ->with(compact(['partitionedData', 'maximumColumnCount']))
                ->render()
            ;
    }
}

?>