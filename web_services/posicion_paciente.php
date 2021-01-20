<?php
  require_once '../admin/templates/funciones/funciones.php';

    $paciente = $_POST['id_paciente'];

    //$paciente="1";

$sentencia=$conn->prepare("SELECT p.*, g.nombre_contacto_emergencia,g.celular_contacto_emergencia FROM paciente p
INNER JOIN gestion_pandemia g ON p.id_paciente = g.id_paciente WHERE p.id_paciente = ?");
$sentencia->bind_param('i', $paciente);
$sentencia->execute();

$resultado = $sentencia->get_result();
if ($fila = $resultado->fetch_assoc()) {
         echo json_encode($fila,JSON_UNESCAPED_UNICODE);     
}
$sentencia->close();
$conn->close();
?>