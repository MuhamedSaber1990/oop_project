<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3x + 1 Function Calculator</title>
</head>
<body>
    <h2>Calculate 3x + 1 Function</h2>
    <form action="foorm.php" method="get"> <!-- Corrected the form action -->
        <label for="start">Start Number:</label>
        <input type="number" id="start" name="start" >
        <label for="end">End Number:</label>
        <input type="number" id="end" name="end" >
        <button type="submit">Calculate</button>
    </form>

    <?php
        include("function.php");

        $from = isset($_GET['start']) ? $_GET['start'] : 1; // Corrected the key to 'start'
        $to = $_GET['end']; // Corrected the key to 'end'
    
        if ($to==null) {
            $result = collatzSingularity($from);
        } else {
            $result = collatzSequence($from, $to);
        }
    
        foreach($result as $key=>$value){
            echo "<p>".$key."</p>";
            if(is_array($value)){
                foreach($value as $element=>$elementval){
                    echo $element."-   ".$elementval."<br>";
                }
            }else{
                echo $value."<br>";
            }

        }

    
    ?>
</body>
</html>
