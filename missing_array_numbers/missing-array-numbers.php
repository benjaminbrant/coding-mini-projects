<?php 
/*
How do you find the missing number in a given integer array of 1 to 100?
*/


/**
 * Generate a string showing the missing numbers from the dataset
 * 
 * @param int $numberRange Number range to be compared against
 * @param array $data Dataset with missing values to be processed
 * 
 * @return string Result string
 * 
 */
function missingNumberFinder(int $numberRange, array $data)
{
    $completeNumberRange = [];
    $missingNumbers = [];

    for ($i = 1; $i <= $numberRange; $i++)
    {
        $completeNumberRange[] = $i;
    }

    foreach ($completeNumberRange as $number)
    {
        if (!in_array($number, $data))
        {
            $missingNumbers[] = $number;
        }
    }

    if (!empty($missingNumbers))
    {
        if(sizeof($missingNumbers) == 1)
        {
            return "Number: " . implode($missingNumbers) . " is missing from the dataset";
        }
        else
        {
            return "Numbers: " . implode(", ", $missingNumbers) . " are missing from dataset";
        }
        
    }
    else
    {
        return "No numbers are missing from the dataset";
    }
}

/**
 * Generate Dataset To Be Processed
 * 
 * @param int $range Number Range To Be Created
 * @param int $random Number Of Values To Be Removed
 * 
 * @return array Returned Dataset With Removed Values
 */
function generateRandomNumberDataset(int $range, int $random = 0)
{
    //generate dataset array
    $dataset = [];
    for ($i=1; $i <= $range; $i++)
    { 
        $dataset[] = $i;
    }

    //debug
    echo "Generated Raw Dataset: " . implode(", ", $dataset) . "<br>";

    if ($random > 0)
    {
        $randomSelectedPositions = [];
        for ($i=0; $i < $random ; $i++)
        {   
            $value = "";
            $value = random_int(1, $range);
            if (in_array($value, $randomSelectedPositions))
            {
                while(in_array($value, $randomSelectedPositions))
                {
                    $value = random_int(1, $range);
                }
            }
            $randomSelectedPositions[] = $value;
        }

        //debug
        echo "Random Selected Positions To Remove Avoiding Duplicates: " . implode(", ", $randomSelectedPositions) . "<br>";
    
        foreach ($randomSelectedPositions as $randomPosition)
        {
            unset($dataset[$randomPosition-1]);
        }
    }
    
    //debug
    echo "Revised DataSet With Removed Entries: " . implode(", ", $dataset) . "<br>";

    return $dataset;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Missing Array Numbers</title>
</head>
<body>
    <h1>Missing Array Numbers</h1>

    <form action="missing-array-numbers.php" method="POST">

    <label for="number-range">Number Range For Dataset</label>
    <input id="number-range" name="number-range" type="text">
    <label for="random-number">Number Of Random Values To Drop</label>
    <input id="random-number" name="random-number" type="text">

    <button type="submit">Execute</button>
    <button type="reset">Clear</button>
    
    </form>

    <h6>
    
    <?php
    if(!empty($_POST))
    {
        if (!empty($_POST["number-range"]))
        {
            $random = ($_POST["random-number"]) ? $_POST["random-number"] : 0;
            echo "Executed Result Showing Missing Values From Array: " . missingNumberFinder($_POST["number-range"], generateRandomNumberDataset($_POST["number-range"], $random));
        }
        else
        {
            echo "Please enter a valid number range and random number value and re-submit";
        }
    }
    
    ?>
    
    </h6>

</body>
</html>