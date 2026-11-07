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
        <h1>Registro</h1>
    </div>
    <div class="texto">
        <p>Completa el formulario de registro</p>
    </div>
    <!-- formulario de registro -->
    <form method="POST" action="" class="form">
        <img src="img/img_reg.jpg" class="images" alt="">
        <div>
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
        </div>
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['registrar'])) {
        // guardar valores
        $n = strval($_POST['name']); 
        $u = strval($_POST['user']); 
        $p = strval($_POST['pass']);
        $pc = strval($_POST['pass_cf'],); 
        
        if ( (strlen($p) >= 6) && ($p == $pc) ){
            $p = password_hash($p, PASSWORD_DEFAULT);
            // hacer el registro
            if (isset($_SESSION['user_reg']) && in_array($u, array_column($_SESSION['user_reg'], 'user'))) {
                echo "<p>El nombre de usuario ' $u ' no esta disponible</p>";
            } else {
                $datos = ['name' => $n, 'user' => $u, 'pass' => $p ];
                // Guardamos en una lista de usuarios dentro de la sesión
                $_SESSION['user_reg'][] = $datos;
                echo "<p>Se registró correctamente el usuario</p>";
            }
        }else{
            echo "<p>Revisa que tu contraseña y la confirmación coincidan y que incluya al menos 6 caracteres.</p>";
        }
    }
    ?>
    <br>
    <div class="btn">
        <a href="login.php">
            <button type="button">Ir al login</button>
        </a>
    </div>
</body>
</html>