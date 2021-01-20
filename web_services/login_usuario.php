<?php
  require_once '../admin/templates/funciones/funciones.php';

$usu_usuario = $_POST['usuario'];
$usu_password= $_POST['password'];

//$usu_usuario="0650256050";
//$usu_password="0650256050";

$sentencia=$conn->prepare("SELECT * FROM paciente WHERE cedula=? AND cedula=?");
$sentencia->bind_param('ss',$usu_usuario,$usu_password);
$sentencia->execute();

$resultado = $sentencia->get_result();
if ($fila = $resultado->fetch_assoc()) {
         echo json_encode($fila,JSON_UNESCAPED_UNICODE);     
}
$sentencia->close();
$conn->close();
?>