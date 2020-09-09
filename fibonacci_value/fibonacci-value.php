<?php

function generateFibonacci(string $sequencePosition)
{
    if($sequencePosition == "1")
    {
        return $fibonacci = ["0"];
    }
    elseif($sequencePosition == "2")
    {
        return $fibonacci = ["0", "1"];
    }
    else
    {
        $fibonacci = ["0", "1"];
        $precedingValue = '';

        for ($i=2; $i < $sequencePosition ; $i++) { 
            $newValue = $fibonacci[$i-1] + $fibonacci[$i-2];
            $fibonacci[] = $newValue;    
        }
    
        return $fibonacci;
    }
}

function getRequestedFibonacciValue(string $fibonacciPosition)
{
    $sequence = generateFibonacci($fibonacciPosition);

    return $sequence[(int)$fibonacciPosition-1];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fibonacci Value</title>
</head>
<body>
    <h1>Return the selected Fibonacci value</h1>
    <form action="" method="POST">
    <label for="fibonacci-value">Fibonacci Value</label>
    <input type="text" id="fibonacci-value" name="fibonacci-value">
    <button type="submit">Submit</button>
    </form>

    <?php
        if(!empty($_POST['fibonacci-value'])) {
            $fibonacci = generateFibonacci($_POST['fibonacci-value']);
            echo "<h6>Fibonacci Sequence Generated: " . implode(", ", $fibonacci) . "</h6>";
            echo "<h6>Fibonacci Value " . $_POST['fibonacci-value'] . " is: " . getRequestedFibonacciValue($_POST['fibonacci-value']) . "</h6>";
        }
    ?>
</body>
</html>