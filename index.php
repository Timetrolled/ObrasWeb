<!DOCTYPE html>
<?php 


include("./config.php");
if (isset($_SESSION['usuario'])) {
    $usuario = $_SESSION['usuario'];

    $cookie_usuario= "cookieUsuario";
    $cookie_value = $usuario;
    setcookie($cookie_usuario, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
}else{
	header("Location: ./registro.php");
}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    
</head>
<body>
<?php
        echo "Bienvenido " . $usuario;

        

    ?>

<br><br>

</body>
</html>