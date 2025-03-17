
<?php
echo "Index3.php";

$jsonData = file_get_contents("rooms.json");
$rooms = json_decode($jsonData, true);

if ($rooms === null) {
    die("Error al decodificar el JSON");
}

echo "<ol>";
for ($i = 0; $i <= count($rooms) - 1; $i++) {
    echo "<li>";
    print_r($rooms[$i]['_id']);
    echo "<br>";
    print_r($rooms[$i]['photos']);
    echo "<br>";
    print_r($rooms[$i]['number']);
    echo "<br>";
    print_r($rooms[$i]['type']);
    echo "<br>";
    print_r($rooms[$i]['amenities']);
    echo "<br>";
    print_r(number_format($rooms[$i]['price'], 2));
    echo "<br>";
    print_r(number_format($rooms[$i]['discount'], 2));
    echo "<br>";
    echo "<br>";
    echo "</li>";
}
echo "</ol>";

?>