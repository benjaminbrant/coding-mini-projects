<?php 
/*

"Write a program that prints the numbers from 1 to 100. But for multiples of three print “Fizz” instead of the number and for the multiples of five print “Buzz”. For numbers which are multiples of both three and five print “FizzBuzz”."

*/

function generateFizzBuzz()
{
    $results = [];

    for ($i=1; $i <= 100; $i++)
    { 
        
        switch($i)
        {
            case ($i % 3 == 0 && $i % 5 == 0):
                $results[$i] = "FizzBuzz";
            break;
            case $i % 3 == 0:
                $results[$i] = "Fizz";
            break;
            case $i % 5 == 0;
                $results[$i] = "Buzz";
            break;
            default:
                $results[$i] = $i;
        }
    }            

    return $results;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fizz Buzz</title>
</head>
<body>
    
<h1>Fizz Buzz</h1>

<?php

$results = generateFizzBuzz();

foreach ($results as $result)
{
    echo $result . "<br>";
}

?>

<h6>Fizz Buzz Ends</h6>

</body>
</html>

