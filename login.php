<?php
include("./config.php");
   
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['loginUser'];
    $password = md5($_POST['loginPassword']);

    $sql = "SELECT * FROM usuarios WHERE usuario_nick = '$usuario' AND usuario_clave = '$password' AND usuario_bloqueado = 0";

    $resultado = mysqli_query($con, $sql);
    $devuelto = mysqli_num_rows($resultado);

    if ($devuelto>0) {
        echo "encontrado la cuenta";
        $_SESSION["usuario"] = $usuario;
        print_r($_SESSION["usuario"]);
        
        $sqlFechaConexion = "UPDATE usuarios set usuario_fecha_ultima_conexion = CURRENT_TIMESTAMP() WHERE usuario_nick = '$usuario'";

        mysqli_query($con,$sqlFechaConexion);

        header("Location:index.php");


    }else{
		header("Location:registro.php?errorLogin=Error en el login");
		
	}
}


?>