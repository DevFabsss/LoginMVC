<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Resources/css/Style.css">
    <title>Inicio</title>
</head>
<body>
    <h1>Felicidades, has iniciado sesión correctamente como <?php echo $_SESSION['usuario'];  ?></h1>
    <a href="index.php?accion=cerrar_sesion">Cerrar sesión</a>
</body>
</html>
