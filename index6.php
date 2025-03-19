
<?php
echo "Index6.php";

if (!isset($_GET['id'])) {
    die("Error: No se ha encontrado [ID] en la URL.");
}

$id = $_GET['id'];

$conn = new mysqli('localhost', 'root', '12345678', 'HotelMirandaDB');
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$stmt = $conn->prepare("SELECT _id, photos, number, type, amenities, price, discount FROM rooms WHERE _id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $room = $result->fetch_assoc();

    echo "<ol>";
        echo "<li>";
            echo "<strong>ID:</strong> " . $room['_id'] . "<br>";
            echo "<strong>Fotos:</strong> " . $room['photos'] . "<br>";
            echo "<strong>Número:</strong> " . $room['number'] . "<br>";
            echo "<strong>Tipo:</strong> " . $room['type'] . "<br>";
            echo "<strong>Servicios:</strong> " . $room['amenities'] . "<br>";
            echo "<strong>Precio:</strong> $" . number_format($room['price'], 2) . "<br>";
            echo "<strong>Descuento:</strong> " . number_format($room['discount'], 2) . "%<br>";
        echo "</li>";
    echo "</ol>";
} else {
    echo "<p>No se encontró habitación con el ID " . htmlspecialchars($id) . ".</p>";
}

$stmt->close();
$conn->close();

?>