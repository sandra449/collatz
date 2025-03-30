<?php
class Collatz
{
    protected $startNumber;
    const MIN_VALUE = 1;
    const MAX_RANGE = 100;

    public function __construct($startNumber)
    {
        $this->startNumber = $startNumber;
    }

    public function calculateSequence($num)
    {
        $sequence = [];
        while ($num != self::MIN_VALUE) {
            $sequence[] = $num;
            if ($num % 2 == 0) {
                $num /= 2;
            } else {
                $num = 3 * $num + 1;
            }
        }
        $sequence[] = self::MIN_VALUE;
        return $sequence;
    }

    public function calculateInRange($start, $end)
    {
        $results = [];
        foreach (range($start, min($end, self::MAX_RANGE)) as $num) {
            $results[$num] = $this->calculateSequence($num);
        }
        return $results;
    }

    public function getStatistics($start, $end)
    {
        $maxIterations = 0;
        $minIterations = PHP_INT_MAX;
        $maxValue = 0;
        $numberWithMaxIterations = 0;
        $numberWithMinIterations = 0;
        $numberWithMaxValue = 0;

        foreach (range($start, min($end, self::MAX_RANGE)) as $num) {
            $sequence = $this->calculateSequence($num);
            $iterations = count($sequence) - 1;
            $maxReachedValue = max($sequence);

            if ($iterations > $maxIterations) {
                $maxIterations = $iterations;
                $numberWithMaxIterations = $num;
            }
            if ($iterations < $minIterations) {
                $minIterations = $iterations;
                $numberWithMinIterations = $num;
            }
            if ($maxReachedValue > $maxValue) {
                $maxValue = $maxReachedValue;
                $numberWithMaxValue = $num;
            }
        }

        return [
            "numberWithMaxIterations" => $numberWithMaxIterations,
            "maxIterations" => $maxIterations,
            "numberWithMinIterations" => $numberWithMinIterations,
            "minIterations" => $minIterations,
            "numberWithMaxValue" => $numberWithMaxValue,
            "maxValue" => $maxValue,
        ];
    }
}

class CollatzHistogram extends Collatz
{
    public function generateHistogram($start, $end)
    {
        $histogram = [];
        foreach (range($start, min($end, self::MAX_RANGE)) as $num) {
            $iterations = count($this->calculateSequence($num)) - 1;
            if (!isset($histogram[$iterations])) {
                $histogram[$iterations] = 0;
            }
            $histogram[$iterations]++;
        }
        ksort($histogram);
        return $histogram;
    }
}
?>
