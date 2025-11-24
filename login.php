<?php session_start(); include 'conexion.php';
if ($_POST) {
    $u = $_POST['u'];
    $p = $_POST['p'];
    $q = $conn->query("SELECT * FROM usuarios WHERE usuario='$u' AND password='$p'");
    if ($q->num_rows > 0) {
        $_SESSION['login'] = true;
        header("Location: citas.php");
    } else {
        echo "<script>alert('Usuario o contraseña incorrectos');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Clínica Rural Neiva - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body">
                    <h4 class="text-center mb-4">Clínica Rural Neiva</h4>
                    <form method="post">
                        <input type="text" name="u" class="form-control mb-3" placeholder="Usuario" required>
                        <input type="password" name="p" class="form-control mb-3" placeholder="Contraseña" required>
                        <button class="btn btn-primary w-100">Ingresar</button>
                    </form>
                    <p class="text-center mt-3 text-muted"><small>admin / 1234</small></p>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>