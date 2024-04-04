<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3x + 1 Function Calculator</title>
</head>
<body>
    <h2>Calculate 3x + 1 Function</h2>
    <form action="foorm.php" method="get">
        <label for="start">Start Number:</label>
        <input type="number" id="start" name="start" required>
        
        <label for="end">End Number:</label>
        <input type="number" id="end" name="end">
        
        <label for="step">Step:</label>
        <input type="number" id="step" name="step" value="1" required> <!-- Added a default value and set 'required' attribute -->

        <button type="submit" name="calculate">Calculate</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['calculate'])) {
        include("three.php");
        $start = isset($_GET['start']) ? $_GET['start'] : 1;
        $end = isset($_GET['end']) ? $_GET['end'] : $start;
        $step = isset($_GET['step']) ? $_GET['step'] : 1;

        $var = new CollatzSequence($start, $end, $step);
    }
    ?>
</body>
</html>
