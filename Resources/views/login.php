<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" href="../Resources/css/Style.css">
    <link rel="shortcut icon" href="../Resources/img/userfavicon.png" type="image/x-icon">
</head>
<body>
    <div class="login-page">
        <div class="form">
            <form class="login-form" method="post" action="">
                <h2>Login</h2>
                <input type="text" placeholder="Usuario" required name="usuario"/>
                <input type="password" placeholder="Contraseña" required name="contrasena"/>
                <button class="btn" href="index.php?accion=ingresar" type="submit">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    Sign in
                </button>
                <p class="message">¿No está registrado? <a href="index.php?accion=mostrar_registro">Crear cuenta</a></p>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>$('.message a').click(function(){
            $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
            });</script>
</body>
</html>
