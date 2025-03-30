<?php
include 'function.php';

$collatz = new Collatz(5);

// Test calculation for a single number
$sequence = $collatz->calculateSequence(5);
echo "Sequence for 5: " . implode(", ", $sequence) . "\n";

// Test calculation for a range
$rangeResults = $collatz->calculateInRange(25, 24658);
echo "Calculated sequence for range 25-24658\n";

// Test statistics
$stats = $collatz->getStatistics(25, 24658);
echo "Number with max iterations: " . $stats['numberWithMaxIterations'] . " (" . $stats['maxIterations'] . " steps)\n";
echo "Number with min iterations: " . $stats['numberWithMinIterations'] . " (" . $stats['minIterations'] . " steps)\n";
echo "Number with max reached value: " . $stats['numberWithMaxValue'] . " (Max value: " . $stats['maxValue'] . ")\n";
?>
