<?php

class CollatzSequence {
    public $results = [];

    public function __construct($start, $end, $step) {

        $isfixed=false;

        if($end<1){$end=1;$isfixed=true;} 
        if($start<1){$start=1;$isfixed=true;}
        if($step<1){$step=1;$isfixed=true;}

        if($end<$start){
            $temp=$end;
            $end=$start;
            $start=$temp;
            $isfixed=true;
        }

        if($isfixed){echo '<hr><hr><p>!!! Enter Values Are Inconsistend (Result Fixed Automatically) !!!</p><hr><hr>';}

        $maxIterationCount = 0;
        $minIterationCount = PHP_INT_MAX;
        $maxIterationNum = 0;
        $minIterationNum = 0;
        $maxmax=0;
        $maxmin=0;

        for ($currentNum = $start; $currentNum <= $end; $currentNum += $step) {
            $iterationCount = 0;
            $maxValue = $currentNum;
            $num = $currentNum;
            $numbers = [];

            while ($num != 1) {
                $num = ($num % 2 == 0) ? $num / 2 : $num * 3 + 1;
                $numbers[] = $num;
                $iterationCount++;
                $maxValue = max($numbers);
            }
            

            $response = [
                'num' => $currentNum,
                'nums' => $numbers,
                'max' => $maxValue,
                'count' => $iterationCount
            ];

            $this->results[] = $response;

            if ($iterationCount > $maxIterationCount) {
                $maxIterationCount = $iterationCount;
                $maxIterationNum = $currentNum;
                $maxmax=$maxValue;
            }

            if ($iterationCount < $minIterationCount) {
                $minIterationCount = $iterationCount;
                $minIterationNum = $currentNum;
                $maxmin=$maxValue;
            }
        }

        array_unshift($this->results, ['Title' => 'maxIterationCount', 'num' => $maxIterationNum, 'max' => $maxmax, 'count' => $maxIterationCount]);
        array_unshift($this->results, ['Title' => 'minIterationCount', 'num' => $minIterationNum, 'max' => $maxmin, 'count' => $minIterationCount]);

        $this->printResults($this->results);
    }

    public function printResults($results) {
        echo '<div><hr>';
        foreach ($results as $result) {
            foreach ($result as $key=>$value) {
                echo '<p>';
                if ($key=='Title') {
                    echo '<strong><u>' . $value . '</u></strong>';
                } elseif ($key=='num') {
                    echo 'Number: ' . $value;
                } elseif ($key=='nums') {
                    echo 'List: ' . implode(', ', $value);
                } elseif ($key=='max') {
                    echo 'Max Number: ' . $value;
                } elseif ($key=='count') {
                    echo 'Count: ' . $value;
                }
                echo '</p>';
            }
            echo '<hr></div>';
        }
    }
}
?>
