
<?php
echo "Index7.php";

$conn = new mysqli('localhost', 'root', '12345678', 'HotelMirandaDB');
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$search = isset($_GET['search']) ? $_GET['search'] : '';
$query = "SELECT _id, photos, number, type, amenities, price, discount FROM rooms";

if (!empty($search)) {
    $query .= " WHERE type LIKE ?";
}

$stmt = $conn->prepare($query);

if (!empty($search)) {
    $searchParam = "%" . $search . "%";
    $stmt->bind_param("s", $searchParam);
}

$stmt->execute();
$result = $stmt->get_result();

echo '<form>';
echo '<input type="text" name="search" placeholder="Buscar por tipo..." value="' . htmlspecialchars($search) . '">';
echo '<button type="submit">Buscar</button>';
echo '</form>';

if ($result->num_rows > 0) {
    echo "<ol>";
    while ($room = $result->fetch_assoc()) {
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
    echo "<p>No se encontraron habitaciones.</p>";
}

$stmt->close();
$conn->close();

?>