
<?php
echo "Index1.php";

$room1 = [
    "id" => 1,
    "name" => "Suite",
    "number" => 101,
    "price" => 150.00,
    "discount" => 10
];

$room2 = [
    "id" => 2,
    "name" => "Suite Deluxe",
    "number" => 102,
    "price" => 175.00,
    "discount" => 20
];

$room3 = [
    "id" => 3,
    "name" => "Suite Extra Deluxe",
    "number" => 103,
    "price" => 200.00,
    "discount" => 30
];

$habitaciones = [$room1, $room2, $room3];

echo "<pre>";
print_r($habitaciones);
echo "</pre>";

?>