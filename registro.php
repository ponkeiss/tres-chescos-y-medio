<?php 
    // 1. Iniciar la sesión al principio de todo
    session_start(); 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css" type="text/css">
    <title>Hola :D</title>
</head>
<body class="body-index">
    <div class="titulo">
        <h1>Registro</h1>
    </div>
    <div class="texto">
        <p>Completa el formulario de registro</p>
    </div>
    <form method="POST" action="">
        <label for="string">Nombre:</label>
        <br>
        <input type="string" step="any" name="name" id="name" required>
        <br><br>
        <label for="user">Nombre de usuario:</label>
        <br>
        <input type="string" step="any" name="user" id="user" required>
        <br><br>
        <label for="pass">Contraseña:</label>
        <br>
        <input type="string" step="any" name="pass" id="pass" required>
        <br><br>
        <label for="pass_cf">Confirmación de contraseña:</label>
        <br>
        <input type="string" step="any" name="pass_cf" id="pass_cf" required>
        <br><br>
        <button type="submit" name="registrar">Registrar</button>
        <br><br>
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['registrar'])) {
        $n = strval($_POST['name']); 
        $u = strval($_POST['user']); 
        $p = strval($_POST['pass']); 
        $pc = strval($_POST['pass_cf']); 
        if ( (strlen($p) >= 6) && ($p == $pc) ){
            $datos = [$n, $u, $p, $pc];
            foreach ($datos as $r) {
                echo $r . "\n";
            }
            // 2. Guardamos el arreglo dentro de una variable de sesión
            $_SESSION['usuario'] = $datos;
        }else{

        }
    }
    ?>
</body>
</html>