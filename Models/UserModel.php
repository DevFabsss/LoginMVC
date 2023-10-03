<?php
class UserModel {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
        /*try {
            $this->conexion = new PDO('mysql:host=localhost;dbname=login', 'root', '');
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Error de conexión a la base de datos: ' . $e->getMessage();
            die();
        }*/
    }

    public function verificarCredenciales($usuario, $contrasena) {
        $sql = "SELECT * FROM usuarios WHERE usuario = :usuario AND contrasena = :contrasena";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
        $stmt->bindParam(':contrasena', $contrasena, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function registrarUsuario($id, $usuario, $contrasena, $nombre, $correo) {
        $sql = "SELECT COUNT(*) FROM usuarios WHERE id = :id";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $count = $stmt->fetchColumn();
    
        if ($count > 0) {
            return false; // si el id ya existe, no se puede registrar
        }
    
        // Continuar con la inserción
        $sql = "INSERT INTO usuarios (id, usuario, contrasena, nombre, correo) VALUES (:id, :usuario, :contrasena, :nombre, :correo)";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
        $stmt->bindParam(':contrasena', $contrasena, PDO::PARAM_STR);
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
    
        return $stmt->execute();
    }
    
    

}
?>