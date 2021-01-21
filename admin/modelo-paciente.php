<?php
  require_once 'templates/funciones/funciones.php';
  //Registrar
  //Leo el name='registro' del boton que se encuenta en el formulario vista-agregar-admin
  if ($_POST['registro'] == 'nuevo') {
    $nombres = $_GET['nombres'];
    $apellidos = $_GET['apellidos'];
    $fecha_nacimiento = $_GET['fecha_nacimiento'];
    $sexo = $_GET['sexo'];
    $direccion = $_GET['direccion'];
    $lat = $_GET['lat'];
    $lng = $_GET['lng'];
    $cedula = $_GET['cedula'];
    $convencional = $_GET['convencional'];
    $celular =$_GET['celular'];
    $correo = $_GET['correo'];    
   try {  
    $stmt = $conn->prepare("INSERT INTO paciente (nombres, apellidos, fecha_nacimiento, sexo, direccion, lat, lng, cedula, convencional, celular, correo) VALUE (?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("sssssssssss", $nombres, $apellidos, $fecha_nacimiento, $sexo,  $direccion, $lat,  $lng, $cedula, $convencional, $celular, $correo);
    $stmt->execute();
    $id_registro = $stmt->insert_id;
    if($id_registro > 0) {
       $respuesta = array(
           'respuesta' => 'exito',
           'id_paciente' => $id_registro
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

//Eliminar
if ($_POST['registro'] == 'eliminar'){
    $id_borrar = $_POST['id'];
    try {
        $stmt = $conn->prepare('DELETE FROM paciente WHERE cedula= ?');
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