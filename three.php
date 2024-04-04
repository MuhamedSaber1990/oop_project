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

        $childInstance = new ArrayPrinter();

        $childInstance->printResults_Histogram($this->results,$maxIterationCount);

        array_unshift($this->results, ['Title' => 'maxIterationCount', 'num' => $maxIterationNum, 'max' => $maxmax, 'count' => $maxIterationCount]);
        array_unshift($this->results, ['Title' => 'minIterationCount', 'num' => $minIterationNum, 'max' => $maxmin, 'count' => $minIterationCount]);

        $childInstance->printResults($this->results);
        
    }
}

class ArrayPrinter extends CollatzSequence{

    public function __construct() {}
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
            echo '<hr>';
        }
        echo '</div>';
    }

    public function printResults_Histogram($results, $maxIteration) {

        $BarWidth = 800 / count($results); // pixels
        $BarWidth = $BarWidth . 'px';
        $Step = ceil($maxIteration / 10);
        if ($Step === 0) {
            $Step = 1;
        }
    
        echo "<div style='height: 800px; width: 200px;'>";
    
        foreach ($results as $result) {
            $num = $result['num'];
            $count = $result['count'];
            $BarHeight = ($count / $maxIteration) * 95;
            $BarHeight = $BarHeight . '%';
    
            echo "<div class='bar' style='height: $BarWidth; width:$BarHeight ; transform: translateX(+120px); background-color: #007bff;' onmouseover='showDetails(this)' onmouseout='hideDetails(this)'>
            <div class='details' style='display: none; transform: translateX(-120px); height: 40px; width: 80px; background-color: white; text-align: center; position: absolute; z-index: 1;'>
                Number: $num<br>Iteration: $count
            </div>
            </div>";
        }
        echo '</div>';
        echo "<div style='height: 80px; width: 80px;'></div>";
    }
    
    
    
    
    
}
?>
    <script>
        function showDetails(element) {
            element.style.backgroundColor='#ff0000';
            element.getElementsByClassName('details')[0].style.display = 'block';
        }
        function hideDetails(element) {
            element.style.backgroundColor='#007bff';
            element.getElementsByClassName('details')[0].style.display = 'none';
        }
    </script>
