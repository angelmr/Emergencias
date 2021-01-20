<?php
  require_once 'templates/funciones/funciones.php';
  //Registrar
  //Leo el name='registro' del boton que se encuenta en el formulario vista-agregar-admin
  if ($_POST['registro'] == 'nuevo') {
    $cedula = $_POST['ci'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $clave = $_POST['clave'];
    $nivel = $_POST['nivel'];
   //encryptar Clave
   $opciones = array (
     'cost' => 12
   );
   $password_hashed = password_hash($clave, PASSWORD_BCRYPT, $opciones);
   try {  
    $stmt = $conn->prepare("INSERT INTO admins (admin_ci, admin_nombre, admin_apellido, admin_clave, admin_nivel) VALUE (?,?,?,?,?)");
    $stmt->bind_param("ssssi", $cedula, $nombre, $apellido, $password_hashed, $nivel);
    $stmt->execute();
    $id_registro = $stmt->insert_id;
    if($id_registro > 0) {
       $respuesta = array(
           'respuesta' => 'exito',
           'admin_id' => $id_registro
          );  
    }else {
        $respuesta = array(
            'respuesta' => 'error'
        );
    }
    $stmt->close();
    $conn->close();
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}  
die(json_encode($respuesta));
}

//Actualizar
if ($_POST['registro'] == 'actualizar') {
    $cedula = $_POST['ci'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $clave = $_POST['clave'];
    $id_actualizar = $_POST['id_registro'];

    try {
        if(empty($_POST['admin_clave'])){
            $opciones = array(
                'cost' => 12
           );   
            $hash_password = password_hash($clave, PASSWORD_BCRYPT, $opciones);
            $stmt = $conn->prepare('UPDATE admins SET admin_ci = ?, admin_nombre = ?, admin_apellido = ?, admin_clave = ? WHERE  admin_id = ? ');
            $stmt->bind_param("ssssi", $cedula, $nombre, $apellido, $hash_password, $id_actualizar);
            
        } else {

            $stmt = $conn->prepare("UPDATE admins SET admin_ci = ?, admin_nombre = ?, admin_apellido = ? WHERE admin_id = ?"); 
            $stmt->bind_param("sssi", $cedula, $nombre, $apellido, $id_actualizar );
           
        }

        $stmt->execute();
        if($stmt->affected_rows){
            $respuesta = array(
                'respuesta' => 'exito',
                'id_actulizado' => $stmt->insert_id
            );
        }else{
            $respuesta = array(
                'respuesta' => 'error'
            );

        }
        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        $respuesta = array(
            'respuesta' => $e->getMessage()
        );
    }
    die(json_encode($respuesta));

}

//Eliminar
if ($_POST['registro'] == 'eliminar'){
    $id_borrar = $_POST['id'];
    try {
        $stmt = $conn->prepare('DELETE FROM admins WHERE admin_id = ?');
        $stmt->bind_param('i', $id_borrar);
        $stmt->execute();
        if($stmt->affected_rows){
            $respuesta = array(
                'respuesta' => 'exito',
                'id_eliminado' => $id_borrar 
            );
        } else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
    } catch (Exception $e) {
        $respuesta = array(
        'respuesta' => $e->getMessage()
        );
    }
    die(json_encode($respuesta));
}