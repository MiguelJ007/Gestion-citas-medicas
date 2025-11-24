<?php
$conn = new mysqli("localhost", "root", "", "citas_medicas");
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>