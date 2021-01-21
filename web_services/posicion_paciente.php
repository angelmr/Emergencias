<?php
  require_once '../admin/templates/funciones/funciones.php';

    $paciente = $_POST['cedula'];

    //$paciente="1";

$sentencia=$conn->prepare("SELECT p.*, g.nombre_contacto_emergencia,g.celular_contacto_emergencia FROM paciente p
INNER JOIN gestion_pandemia g ON p.cedula = g.cedula WHERE p.cedula = ?");
$sentencia->bind_param('s', $paciente);
$sentencia->execute();

$resultado = $sentencia->get_result();
if ($fila = $resultado->fetch_assoc()) {
         echo json_encode($fila,JSON_UNESCAPED_UNICODE);     
}
$sentencia->close();
$conn->close();
?>