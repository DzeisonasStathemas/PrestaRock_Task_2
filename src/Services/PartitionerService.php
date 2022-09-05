<?php 

declare (strict_types = 1);

namespace PrestaApp\Services;

class PartitionerService 
{
    private array $valuesSortedByDescending;
    public array $pairedValues;

    public function getPairedValues(int $groupsCount, array $data): array
    {
        $this->valuesSortedByDescending = $this->sortDataByDescending($data);
        $this->pairedValues = array_fill(0, $groupsCount, []);

        foreach ($this->valuesSortedByDescending as $valuesIndex => $values) {
            $smallestSumIndex = $this->getSmallestSumIndex();

            $this->pairedValues[$smallestSumIndex][] = $this->valuesSortedByDescending[$valuesIndex];
        }

        return $this->pairedValues;
    }

    private function getSmallestSumIndex(): int
    {
        $smallestSum = array_sum(reset($this->pairedValues));
        $smallestSumIndex = 0;

        foreach ($this->pairedValues as $pairedValueIndex => $values) {
            $sum = array_sum($values);

            if ($sum < $smallestSum) {
                $smallestSum = $sum;
                $smallestSumIndex = $pairedValueIndex;
            }
        }

        return $smallestSumIndex;
    }
    
    private function sortDataByDescending(array $data): array
    {
        rsort($data);

        return $data;
    }
}

?>