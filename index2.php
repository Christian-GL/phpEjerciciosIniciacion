
<?php
echo "Index2.php";

$jsonData = file_get_contents("rooms.json");
$rooms = json_decode($jsonData, true);

if ($rooms === null) {
    die("Error al decodificar el JSON");
}

echo "<pre>";
print_r($rooms);
echo "</pre>";

?>