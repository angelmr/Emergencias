<?php 
    $conn = new mysqli('localhost', 'root', '','emergencias');
    if($conn->connect_error){
        echo $error ->conn->connect_error;
    }
?>