
<?php

// Hard-coded mapping of characters to numeric values
$json = file_get_contents('text-to-number.json');
$charToNumMap = json_decode($json);

// Function to translate a string to numeric values
function translateToNumeric($inputString, $charToNumMap) {
    $result = array();
    $inputArray = str_split($inputString);

    foreach ($inputArray as $char) {
        if (isset($charToNumMap->$char)) {
            $result[] = $charToNumMap->$char;
        } else {
            // If character not in map, set it to a default value (e.g., 0.00)
            $result[] = 0.00;
        }
    }

    return $result;
}

// Example usage
$inputString = 'hello';
$numericValues = translateToNumeric($inputString, $charToNumMap);

echo 'Input String: ' . $inputString . PHP_EOL;
echo 'Numeric Values: ' . implode(', ', $numericValues) . PHP_EOL;
?>