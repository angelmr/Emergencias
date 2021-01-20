<?php
require_once 'templates/funciones/funciones.php';

// Gets data from URL parameters.
if(isset($_GET['add_location'])) {
    add_location();
}
function add_location(){
    $con=mysqli_connect ("localhost", 'root', '','emergencias');
    if (!$con) {
        die('Not connected : ' . mysqli_connect_error());
    }
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
    // Inserts new row with place data.
    $query = sprintf("INSERT INTO paciente " .
        " (id_paciente,nombres,apellidos,fecha_nacimiento,sexo,direccion, lat, lng, cedula,convencional,celular,correo ) " .
        " VALUES (NULL, '%s', '%s', '%s','%s','%s','%s','%s','%s','%s','%s','%s');",
        mysqli_real_escape_string($con,$nombres),
        mysqli_real_escape_string($con,$apellidos),
        mysqli_real_escape_string($con,$fecha_nacimiento),
        mysqli_real_escape_string($con,$sexo),
        mysqli_real_escape_string($con,$direccion),
        mysqli_real_escape_string($con,$lat),
        mysqli_real_escape_string($con,$lng),
        mysqli_real_escape_string($con,$cedula),
        mysqli_real_escape_string($con,$convencional),
        mysqli_real_escape_string($con,$celular),
        mysqli_real_escape_string($con,$correo));
    $result = mysqli_query($con,$query);
    echo"Inserted Successfully";
    if (!$result) {
        die('Invalid query: ' . mysqli_error($con));
    }
}
function get_all_locations(){
    $con=mysqli_connect ("localhost", 'root', '','emergencias');
    if (!$con) {
        die('Not connected : ' . mysqli_connect_error());
    }
    // update location with location_status if admin location_status.
    $sqldata = mysqli_query($con,"select id_paciente,nombres,apellidos,fecha_nacimiento,sexo,direccion,lat,lng,cedula,convencional,celular,correo from paciente");

    $rows = array();
    while($r = mysqli_fetch_assoc($sqldata)) {
        $rows[] = $r;

    }
  $indexed = array_map('array_values', $rows);
  //  $array = array_filter($indexed);

    echo json_encode($indexed);
    if (!$rows) {
        return null;
    }
}
?>