<?php
session_start(); 

try {
    $conexion = new PDO('mysql:host=localhost;dbname=login', 'root', '');
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Error de conexión a la base de datos: ' . $e->getMessage();
    die();
}

require_once 'Controllers/LoginController.php';
$controladorLogin = new LoginController($conexion);

require_once 'Controllers/RegisterController.php';
$controladorRegistro = new RegisterController($conexion);

$accion = $_GET['accion'] ?? 'mostrar_login';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    if ($accion === 'ingresar') {
        $usuarioValido = $controladorLogin->autenticarUsuario($usuario, $contrasena);

        if ($usuarioValido) {
            //$_SESSION['usuario'] = $usuario;
            header('Location: Resources/views/inicio.php');
            //exit();
        } else {
            echo "Usuario inválido";
        }
    } elseif ($accion === 'registrar_usuario') {
        $id = $_POST['id'];
        $usuario = $_POST['usuario'];
        $contrasena = $_POST['contrasena'];
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];

        $registroExitoso = $controladorRegistro->registrarUsuario($id, $usuario, $contrasena, $nombre, $correo);

        if ($registroExitoso) {
            //echo "<script>alert('Usuario registrado exitosamente.');</script>";
            header('Location: Resources/views/login.php');
            exit();
        } else {
            $mensajeError = "El registro no pudo completarse. Por favor, inténtelo de nuevo.";
        }
    }
} else {
    if ($accion === 'mostrar_registro') {
        $controladorRegistro->mostrarRegistro();
    } elseif ($accion === 'cerrar_sesion') {
        session_destroy();
        header('Location: Resources/views/login.php');
        exit();
    } else {
        $controladorLogin->mostrarLogin();
    }
}
?>