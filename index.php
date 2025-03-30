<?php
include "function.php";

$startNumber = 5;
$collatz = new Collatz($startNumber);
$collatzHistogram = new CollatzHistogram($startNumber);

$startRange = 25;
$endRange = 24658;

// Test sequence for a single number
$sequence = $collatz->calculateSequence($startNumber);
echo "Collatz sequence for $startNumber: " . implode(", ", $sequence) . "\n";

// Test statistics
$stats = $collatz->getStatistics($startRange, $endRange);
echo "Number with max iterations: " .
    $stats["numberWithMaxIterations"] .
    " (" .
    $stats["maxIterations"] .
    " steps)\n";
echo "Number with min iterations: " .
    $stats["numberWithMinIterations"] .
    " (" .
    $stats["minIterations"] .
    " steps)\n";
echo "Number with max reached value: " .
    $stats["numberWithMaxValue"] .
    " (Max value: " .
    $stats["maxValue"] .
    ")\n";

// Test histogram
$histogram = $collatzHistogram->generateHistogram($startRange, $endRange);
echo "Histogram of iteration counts:\n";
foreach ($histogram as $iterations => $count) {
    echo "Iterations: $iterations, Count: $count\n";
}
?>
