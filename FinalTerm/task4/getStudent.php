<?php
$student = [
    "name" => "Nadia",
    "id" => "CSE123",
    "department" => "CSE",
    "cgpa" => 3.75
];

header("Content-Type: application/json");

echo json_encode($student);
?>