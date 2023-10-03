<?php
require_once 'Models/UserModel.php';

class LoginController {
    private $modeloUsuario;
    private $conexion;

    public function __construct($conexion) {
        $this->modeloUsuario = new UserModel($conexion);
        $this->conexion = $conexion;
    }

    public function mostrarLogin() {
        include 'Resources/views/login.php';
    }

    public function autenticarUsuario($usuario, $contrasena) {
        $usuarioValido = $this->modeloUsuario->verificarCredenciales($usuario, $contrasena);

        if ($usuarioValido) {
            header('Location: Resources/views/inicio.php');
            return $usuarioValido;
            
        } else {
            return false;
        }
    }
}
?>
