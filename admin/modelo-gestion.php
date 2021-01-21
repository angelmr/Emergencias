<?php
  require_once 'templates/funciones/funciones.php';
  //Registrar
  //Leo el name='registro' del boton que se encuenta en el formulario vista-agregar-admin
  if ($_POST['registro'] == 'nuevo') {
    $paciente = $_POST['id_paciente'];
    $num_personas_vive = $_POST['num_personas_vive'];
    $trabaja = $_POST['trabaja'];
    $institucion_trabaja = $_POST['institucion_trabaja'];
    $estudia = $_POST['estudia'];
    $institucion_estudia = $_POST['institucion_estudia'];
    $enfermedad = $_POST['enfermedad'];
    $diabetes = $_POST['diabetes'];
    $sobrepeso = $_POST['sobrepeso'];
    $asegurado_IESS = $_POST['asegurado_IESS'];
    $nombre_contacto_emergencia = $_POST['nombre_contacto_emergencia'];
    $celular_contacto_emergencia = $_POST['celular_contacto_emergencia'];
    $mail_contacto_emergencia = $_POST['mail_contacto_emergencia'];
   try {  
    $stmt = $conn->prepare("INSERT INTO gestion_pandemia(id_paciente, num_personas_vive, trabaja, institucion_trabaja, estudia, institucion_estudia, enfermedad, diabetes, sobrepeso, asegurado_IESS, nombre_contacto_emergencia, celular_contacto_emergencia, mail_contacto_emergencia) VALUE (?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("sisssssssssss", $paciente, $num_personas_vive, $trabaja, $institucion_trabaja, $estudia, $institucion_estudia, $enfermedad, $diabetes, $sobrepeso, $asegurado_IESS, $nombre_contacto_emergencia, $celular_contacto_emergencia, $mail_contacto_emergencia);
    $stmt->execute();
    $id_registro = $stmt->insert_id;
    if($stmt->affected_rows){
        $respuesta = array(
            'respuesta' => 'exito',
            'id_registro' => $id_registro
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
        $stmt = $conn->prepare('DELETE FROM gestion_pandemia WHERE id_gestionp= ?');
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