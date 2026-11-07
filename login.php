<?php
    //Iniciar la sesión al principio de todo
    session_start(); 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilitos.css" type="text/css">
    <title>Hola :D</title>
</head>
<body>
    <div class="titulo">
        <h1>Login</h1>
        <br>
    </div>
    <!-- ingresar info -->
    <form method="POST" action="" class="form">
        <img src="img/img_log.jpg" class="images" alt="">
        <div>
        <label for="user">Nombre de usuario:</label>
        <br>
        <input type="string" step="any" name="user" id="user" required>
        <br><br>
        <label for="pass">Contraseña:</label>
        <br>
        <input type="string" step="any" name="pass" id="pass" required>
        <br><br>
        <button type="submit" name="login">Login</button>
        <br><br>
        </div>
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) { 
        // guardar valores
        $u = strval($_POST['user']); 
        $p = strval($_POST['pass']);
        $user = 0;
        if (isset($_SESSION['user_reg'])) {
            // confirmar el usuario
            foreach ($_SESSION['user_reg'] as $us) {
                if ($us['user'] === $u && password_verify($p, $us['pass'])) {
                    $user = 1;
                    $_SESSION['user_act'] = $us['name'];
                    break;
                }
            }
        }
        if ($user) {
            // enviar a la pagina principal
            header("Location: principal.php");
            exit(); 
        } else {
            // mostrar error
            $error = "Usuario o contraseña incorrectos";
        }
    }
    ?>
    <!-- boton para volver al registro -->
    <br>
    <div class="btn">
        <a href="registro.php">
            <button type="button">Registrarse</button>
        </a>
    </div>
</body>
</html>