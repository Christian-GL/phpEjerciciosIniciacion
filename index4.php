
<?php
echo "Index4.php";

if (!isset($_GET['id'])) {
    die("Error: No se ha encontrado [ID] en la URL.");
}

$id = $_GET['id'];

$jsonData = file_get_contents("rooms.json");
$rooms = json_decode($jsonData, true);

if ($rooms === null) {
    die("Error al decodificar el JSON.");
}

$foundRoom = null;

foreach ($rooms as $room) {
    if ($room['_id'] == $id) {
        $foundRoom = $room;
        break;
    }
}

if (!$foundRoom) {
    die("<p>No se encontró ninguna habitación con el ID " . htmlspecialchars($id) . ".</p>");
}

echo "<pre>";
print_r($foundRoom['_id']);
echo "<br>";
print_r($foundRoom['photos']);
echo "<br>";
print_r($foundRoom['number']);
echo "<br>";
print_r($foundRoom['type']);
echo "<br>";
print_r($foundRoom['amenities']);
echo "<br>";
print_r(number_format($foundRoom['price'], 2));
echo "<br>";
print_r(number_format($foundRoom['discount'], 2));
echo "<br>";
echo "<br>";
echo "</pre>";

?>