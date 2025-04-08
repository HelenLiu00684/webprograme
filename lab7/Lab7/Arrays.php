<?php

// Define first array1
$array1 = [9, 3, 1, 0, 99, 2, 5, 6, 1, 1, 55];

// Calculate the average of array1 
function calculateAverage($array) {
  $sum = array_sum($array);
  $count = count($array);
  return round($sum / $count);
}

// check the maxmium vaule and return the index.
function CheckMax($array) {
  $maxValue = max($array);
  $maxIndex = array_search($maxValue, $array);
  return [$maxValue, $maxIndex];
}

// calculate the mode
function CheckMode($array) {
  $counts = array_count_values($array);
  arsort($counts); // Sort by count in descending order
  return key($counts); // Return the first key (mode)
}

// Function to Check the same of two arrays
function CheckArraysSame($array1, $array2) {
  for ($i = 0; $i < count($array1) && $i < count($array2); $i++) {
    if ($array1[$i] === $array2[$i]) {
		echo "The value at: " . $i . " match <br>";
    }else{
		echo "The value at: " . $i . " is not match <br>";	
	}
  }
}

// Calculate the average
$average = calculateAverage($array1);
echo "The average is: " . $average . "<br>";

// Check the maximum value and the index
list($maxValue, $maxIndex) = CheckMax($array1);
echo "The value at index " . $maxIndex . " is maximum which is: " . $maxValue . "<br>";

// Check the mode
$mode = CheckMode($array1);
echo "The mode of the array is: " . $mode . "<br>";

// Create the second array
$array2 = [9, 4, 1, 0, 23, 22, 4, 6, 4, 32, 55];

// Check the matching arrays
CheckArraysSame($array1, $array2);

?>