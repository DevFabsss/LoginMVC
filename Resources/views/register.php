<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../Resources/css/Style.css">
    <link rel="shortcut icon" href="./Resources/img/userfavicon.png" type="image/x-icon">
</head>
<body>
<div class="login-page">
        <div class="form">
            <form class="register-form" method="post" action="index.php?accion=registrar_usuario">
                <h2>Register</h2>
                <input type="number" name="id" placeholder="Cedula*" required/>
                <input type="text" name="usuario" placeholder="Usuario*" required/>
                <input type="password" name="contrasena" placeholder="Contraseña*" required/>
                <input type="text" name="nombre" placeholder="Nombre*" required/>
                <input type="email" name="correo" placeholder="Correo*" required/>
                <button class="btn" href="#" type="submit">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    Create
                </button>
                <p class="message">¿Ya está registrado/a? <a href="index.php?accion=mostrar_login">Iniciar Sesión</a></p>
                <?php if (isset($mensajeError)) : ?>
                    <div class="error-message"><?php echo $mensajeError; ?></div>
                <?php endif; ?>
            </form>
        </div>
    </div>
</body>
</html>