<?php
class Collatz {
    private $startNumber;

    public function __construct($startNumber) {
        $this->startNumber = $startNumber;
    }

    public function calculateSequence($num) {
        $sequence = [];
        while ($num != 1) {
            $sequence[] = $num;
            if ($num % 2 == 0) {
                $num /= 2;
            } else {
                $num = 3 * $num + 1;
            }
        }
        $sequence[] = 1;
        return $sequence;
    }

    public function calculateInRange($start, $end) {
        $results = [];
        foreach (range($start, $end) as $num) {
            $results[$num] = $this->calculateSequence($num);
        }
        return $results;
    }

    public function getStatistics($start, $end) {
        $maxIterations = 0;
        $minIterations = PHP_INT_MAX;
        $maxValue = 0;
        $numberWithMaxIterations = 0;
        $numberWithMinIterations = 0;
        $numberWithMaxValue = 0;

        foreach (range($start, $end) as $num) {
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
            'numberWithMaxIterations' => $numberWithMaxIterations,
            'maxIterations' => $maxIterations,
            'numberWithMinIterations' => $numberWithMinIterations,
            'minIterations' => $minIterations,
            'numberWithMaxValue' => $numberWithMaxValue,
            'maxValue' => $maxValue
        ];
    }
}
?>
