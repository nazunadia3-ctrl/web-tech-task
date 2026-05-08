<?php
// Step 1: Superglobal variable using $_GET
$inputName = isset($_GET["student_name"]) ? $_GET["student_name"] : "No name given";

// Step 2: Indexed array of marks
$marks = [75, 45, 88, 60, 39];

// Step 3: Display all marks using foreach loop
echo "<h2>Student Marks</h2>";

foreach ($marks as $mark) {
    echo "Mark: " . $mark . "<br>";
}

// Step 4: Variables for calculation
$total = 0;
$maximum = $marks[0];
$minimum = $marks[0];

// Step 5: Calculate total, maximum, and minimum
foreach ($marks as $mark) {
    $total = $total + $mark;

    if ($mark > $maximum) {
        $maximum = $mark;
    }

    if ($mark < $minimum) {
        $minimum = $mark;
    }
}

// Step 6: Built-in array function count()
$totalStudents = count($marks);

// Step 7: User-defined function
function calculateAverage($total, $count) {
    return $total / $count;
}

// Step 8: Type casting
$average = (float) calculateAverage($total, $totalStudents);

// Step 9: Display calculation result
echo "<h2>Calculation Result</h2>";
echo "Total Marks: " . $total . "<br>";
echo "Average Marks: " . $average . "<br>";
echo "Maximum Mark: " . $maximum . "<br>";
echo "Minimum Mark: " . $minimum . "<br>";

// Step 10: Count pass and fail students
$passCount = 0;
$failCount = 0;

foreach ($marks as $mark) {
    if ($mark >= 50) {
        $passCount++;
    } else {
        $failCount++;
    }
}

// Step 11: Display pass and fail count
echo "<h2>Pass and Fail Count</h2>";
echo "Passed Students: " . $passCount . "<br>";
echo "Failed Students: " . $failCount . "<br>";

// Step 12: Associative array
$student = [
    "name" => "Asif",
    "id" => "CSE123",
    "cgpa" => 3.75
];

// Step 13: Print associative array using foreach loop
echo "<h2>Student Details</h2>";

foreach ($student as $key => $value) {
    echo $key . " : " . $value . "<br>";
}

// Step 14: String operations
echo "<h2>String Operations</h2>";
echo "Name in Uppercase: " . strtoupper($student["name"]) . "<br>";
echo "Length of Name: " . strlen($student["name"]) . "<br>";

// Step 15: Built-in array function sort()
sort($marks);

echo "<h2>Sorted Marks</h2>";

foreach ($marks as $mark) {
    echo $mark . "<br>";
}

// Step 16: Display input from superglobal variable
echo "<h2>Input from Superglobal Variable</h2>";
echo "Student Name from URL: " . $inputName . "<br>";
?>