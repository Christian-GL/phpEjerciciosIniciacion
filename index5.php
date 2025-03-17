
<?php
echo "Index5.php";

$conn = new mysqli('localhost', 'root', '12345678', 'HotelMirandaDB');
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$sql = "SELECT _id, photos, number, type, amenities, price, discount FROM rooms";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $rooms = [];
    while ($row = $result->fetch_assoc()) {
        $rooms[] = $row;
    }

    echo "<ol>";
    foreach ($rooms as $room) {
        echo "<li>";
        echo "<strong>ID:</strong> " . $room['_id'] . "<br>";
        echo "<strong>Fotos:</strong> " . $room['photos'] . "<br>";
        echo "<strong>Número:</strong> " . $room['number'] . "<br>";
        echo "<strong>Tipo:</strong> " . $room['type'] . "<br>";
        echo "<strong>Servicios:</strong> " . $room['amenities'] . "<br>";
        echo "<strong>Precio:</strong> $" . number_format($room['price'], 2) . "<br>";
        echo "<strong>Descuento:</strong> " . number_format($room['discount'], 2) . "%<br>";
        echo "</li>";
    }
    echo "</ol>";
}
else {
    echo "<p>No se encontraron habitaciones en la base de datos.</p>";
}

$conn->close();

?>