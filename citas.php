<?php session_start(); if(!isset($_SESSION['login'])) header("Location: login.php");
include 'conexion.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Citas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2 class="mb-4">Sistema de Citas Médicas - Neiva, Huila</h2>
    <a href="nueva_cita.php" class="btn btn-success mb-3">+ Nueva Cita</a>
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr><th>Paciente</th><th>Teléfono</th><th>Médico</th><th>Fecha</th><th>Hora</th></tr>
        </thead>
        <tbody>
        <?php
        $sql = "SELECT c.*, m.nombre as medico FROM citas c JOIN medicos m ON c.medico_id = m.id ORDER BY fecha, hora";
        $res = $conn->query($sql);
        while($row = $res->fetch_assoc()){ ?>
            <tr>
                <td><?= $row['paciente'] ?></td>
                <td><?= $row['telefono'] ?></td>
                <td><?= $row['medico'] ?></td>
                <td><?= $row['fecha'] ?></td>
                <td><?= $row['hora'] ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>