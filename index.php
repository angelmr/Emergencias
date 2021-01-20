<?php 
	session_start();
	if(isset($_GET["cerrar_sesion"])){
		session_destroy();
	 }
    include_once 'includes/funciones/conexion.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Iniciar Sesion</title>

    <link rel="stylesheet" href="css/main.css">
    <link href="admin/css/sweetalert2.min.css" rel="stylesheet">

</head>
<body>
    
    <div class="login_contenedor">

        <div class="login_header">
            <img  class="header_img" src="img/user.png" alt="icon">
            <h2 class="header_title" >Iniciar Sesión</h2>
        </div>

        <form action="login.php" method="POST" name="login-admin-form" id="login-admin" class="login_form">
            <input type="text" id="UserName" name="ci" placeholder="&#128100; usuario" required autofocus>
            <input type="password" id="UserPassword" name="clave" placeholder="&#x1F512; contraseña">

            <input type="hidden" name="login-admin" value="1">
            <input type="submit" class="form_button">
        </form>

    </div>

    <script src="js/vendor/jquery-3.5.1.min.js"></script>
    <script src="admin/js/sweetalert2.min.js"></script>
    <script src="js/login-ajax.js"></script>
</body>
</html>