<?php

function collatzSequence($start, $end) {
    $results = [];
    $maxIterationCount = 0;
    $minIterationCount = PHP_INT_MAX;
    $maxIterationNum = 0;
    $minIterationNum = 0;

    for ($currentNum = $start; $currentNum <= $end; $currentNum++) {
        $iterationCount = 0;
        $maxValue = $start;
        $num = $start;

        while ($num != 1) {
            if ($num % 2 == 0) {
                $num /= 2;
            } else {
                $num = $num * 3 + 1;
            }
            $iterationCount++;
            $maxValue = max($maxValue, $num);
        }

        $response = [
            'num' => $start,
            'max' => $maxValue,
            'count' => $iterationCount
        ];

        $results[] = $response;

        if ($iterationCount > $maxIterationCount) {
            $maxIterationCount = $iterationCount;
            $maxIterationNum = $start;
        }

        if ($iterationCount < $minIterationCount) {
            $minIterationCount = $iterationCount;
            $minIterationNum = $start;
        }

        $start++;
    }

    array_unshift($results, ['maxIterationCount' => ' ', 'num' => $maxIterationNum, 'max' => $maxValue, 'count' => $maxIterationCount]);
    array_unshift($results, ['minIterationCount' => ' ', 'num' => $minIterationNum, 'max' => $maxValue, 'count' => $minIterationCount]);

    return $results;
}

function collatzSingularity($input) {
    $maxValue = 0;
    $iterationCount = 0;
    $numbers = [];

    while ($input != 1) {
        if ($input % 2 == 0) {
            $input /= 2;
        } else {
            $input = $input * 3 + 1;
        }

        if ($input > $maxValue) {
            $maxValue = $input;
        }

        $numbers[] = $input;
        $iterationCount++;
    }

    $result = [
        'Numbers' => $numbers,
        'Max' => $maxValue,
        'Iteration' => $iterationCount
    ];

    return $result;
}

?>
