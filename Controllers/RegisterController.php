<?php
require_once 'models/UserModel.php';

class RegisterController {
    private $modeloUsuario;
    private $conexion;

    public function __construct($conexion) {
        $this->modeloUsuario = new UserModel($conexion);
        $this->conexion = $conexion;
    }

    public function mostrarRegistro() {
        include 'Resources/views/register.php';
    }

    public function registrarUsuario($id, $usuario, $contrasena, $nombre, $correo) {
        $registroExitoso = $this->modeloUsuario->registrarUsuario($id, $usuario, $contrasena, $nombre, $correo);

        return $registroExitoso;
    }
}
?>