<?php
    // 1. Iniciar la sesión al principio de todo
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
    </div>
    <form method="POST" action="">
        <label for="user">Nombre de usuario:</label>
        <br>
        <input type="string" step="any" name="user" id="user" required>
        <br><br>
        <label for="pass">Contraseña:</label>
        <br>
        <input type="string" step="any" name="pass" id="pass" required>
        <br><br>
        <button type="submit" name="login">login</button>
        <br><br>
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) { 
        $u = strval($_POST['user']); 
        $p = strval($_POST['pass']); 
        $datos = $_SESSION['usuario'];
        if ( ($datos[1] == $u) && ($datos[3] == $p) ){
            
        }else{

        }
    }
    ?>
</body>
</html>