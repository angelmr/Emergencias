<?php
//Leo el name='login-admin' del boton que se encuenta en el formulario login-view
if (isset($_POST['login-admin'])) {
  $usuario = $_POST['ci'];
  $password = $_POST['clave'];
  try {
    include_once 'includes/funciones/conexion.php';
    $stmt = $conn->prepare("SELECT * FROM admins WHERE admin_ci = ?; ");
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $stmt->bind_result($id_admin, $usuario_admin, $nombre_admin, $apellido_admin, $password_admin, $nivel);
    if($stmt->affected_rows){
        $existe = $stmt->fetch();
        if($existe){
           if(password_verify($password, $password_admin)){
            session_start();
            $_SESSION['usuario'] = $usuario_admin;
            $_SESSION['nombre'] = $nombre_admin;
            $_SESSION['apellido'] = $apellido_admin;
            $_SESSION['nivel'] = $nivel;
            $_SESSION['id'] = $id_admin;
                $respuesta = array(
                'respuesta' => 'exito',
                'usuario' => $nombre_admin
                );
           }else{
            $respuesta = array(
                'respuesta' => 'error' 
            );
           }
         } else {
        $respuesta = array(
            'respuesta' => 'error'
        );
    }
 }
 $stmt->close();
 $conn->close();
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}  
die(json_encode($respuesta));
 die(json_encode($_POST));
}
