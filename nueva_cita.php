<?php session_start(); if(!isset($_SESSION['login'])) header("Location: login.php");
include 'conexion.php';
if($_POST){
    $p = $_POST['paciente'];
    $t = $_POST['telefono'];
    $m = $_POST['medico'];
    $f = $_POST['fecha'];
    $h = $_POST['hora'];
    $conn->query("INSERT INTO citas (paciente,telefono,medico_id,fecha,hora) VALUES ('$p','$t',$m,'$f','$h')");
    header("Location: citas.php");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nueva Cita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card mx-auto" style="max-width:500px;">
        <div class="card-header"><h4>Nueva Cita</h4></div>
        <div class="card-body">
            <form method="post">
                <input type="text" name="paciente" class="form-control mb-3" placeholder="Nombre del paciente" required>
                <input type="text" name="telefono" class="form-control mb-3" placeholder="Teléfono" required>
                <select name="medico" class="form-control mb-3" required>
                    <?php
                    $med = $conn->query("SELECT * FROM medicos");
                    while($m = $med->fetch_assoc()){
                        echo "<option value='".$m['id']."'>".$m['nombre']."</option>";
                    }
                    ?>
                </select>
                <input type="date" name="fecha" class="form-control mb-3" required>
                <input type="time" name="hora" class="form-control mb-3" required>
                <button class="btn btn-primary">Guardar Cita</button>
                <a href="citas.php" class="btn btn-secondary">Volver</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>