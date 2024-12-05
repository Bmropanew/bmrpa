<?php

include("conexion/cls_conectar.php");
$obj = new conexion();
session_start();

$nombre = mysqli_real_escape_string($obj->getConexion(), $_POST['nombre']);
$apellido = mysqli_real_escape_string($obj->getConexion(), $_POST['apellido']);
$correo = mysqli_real_escape_string($obj->getConexion(), $_POST['correo']);
$telefono = mysqli_real_escape_string($obj->getConexion(), $_POST['telefono']);
$direccion = mysqli_real_escape_string($obj->getConexion(), $_POST['direccion']);
$fecha = mysqli_real_escape_string($obj->getConexion(), $_POST['fecha_nacimiento']);
$genero = mysqli_real_escape_string($obj->getConexion(), $_POST['genero']);
$contraseña = mysqli_real_escape_string($obj->getConexion(), password_hash($_POST['contraseña'], PASSWORD_DEFAULT));

$query_check = "SELECT * FROM usuario WHERE correo = '$correo'";
$result_check = mysqli_query($obj->getConexion(), $query_check);

if (mysqli_num_rows($result_check) > 0) {
    echo "<script>alert('El correo electrónico ya está registrado. Por favor, utiliza otro correo.'); window.history.back();</script>";
    exit; 
} else {
    $query = "INSERT INTO usuario (nombre, apellidos, correo, telefono, direccion, fecha_nacimiento, genero, contraseña, rol, estado) 
              VALUES ('$nombre', '$apellido', '$correo', '$telefono', '$direccion', '$fecha', '$genero', '$contraseña', '1', '1')";

    $result = mysqli_query($obj->getConexion(), $query);

    if ($result) {
        $_SESSION['correo'] = $correo;
        header("Location: Principal.php"); 
        exit;
    } else {
        echo "Error en el registro: " . mysqli_error($obj->getConexion());
    }
}

?>
