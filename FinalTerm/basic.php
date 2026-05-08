
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>PHP Basic Task</h1>
    <?php
echo "Hello world!   ";
?>
<?php 
$name = "Nazu";
$age = 23;

echo " Name :$name, Age: $age";
?>
/*localScope*/
<?php
function test(){
    $x = 10;
    echo $x;
}
test();
?>
<?php
$x = 5;
function val(){
    global $x;
    echo $x;
}
val();
?>
<?php 
$x = 10;
$y = 10.5;
$z = "Hello";
$isTrue = true;

var_dump($x);
var_dump($z);
var_dump($y);
?>

 
<?php
$cars = array("Volvo", "BMW", "Toyota");
echo $cars[1];
?>

<?php
$car = array(
    "brand" => "Ford",
    "model" => "Mustang",
    "year" => 1964
);
echo $car["model"]; 
echo $car["brand"];
?>
<?php
$x = 5985;
var_dump($x);
?>

</body>
</html>