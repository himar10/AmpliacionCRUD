
<html>
<body>

    <h1>Crear e insertar en la base de datos</h1>

    <form method="post" action="crear.php">
        Nombre:<br>
        <input type="text" name="nombre" value="" required>
        <br>Apellido:<br>
        <input type="text" name="apellido" value="" required>
        <br>DNI<br>
        <input type="text" name="dni" value="" required>
        <br>Email<br>
        <input type="text" name="email" value="" required>
        <br>Fecha Nacimiento<br>
        <input type="text" name="fecha" value="" required>
        <br><br>
        <input type="submit" value="Submit">
    </form>

</body>
</html>


<?php

require 'database.php';
   if( isset($_POST['nombre']) ) {
        $nombre = $_POST['nombre'];
    }
    if( isset($_POST['apellido']) ) {
        $apellido = $_POST['apellido'];
    }
    if( isset($_POST['dni']) ) {
        $dni = $_POST['dni'];
    }
    if( isset($_POST['email']) ) {
        $email = $_POST['email'];
    }
    if( isset($_POST['fecha']) ) {
        $fecha = $_POST['fecha'];
    }


/*
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$dni = $_POST['dni'];
$email = $_POST['email'];
$fecha = $_POST['fecha'];
*/

if (isset($nombre,$apellido, $dni, $email, $fecha)){
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO persona (Nombre,Apellidos,DNI,fNacimiento,Correo) values('" . $nombre . "' , '"  . $apellido . "' , '"  . $dni . "' , '"  .  $fecha  . "' , '" . $email ."')";
    try {
        $q = $pdo->prepare($sql);
        $q->execute();
    } catch (Exception $e) {
        echo ($e);
    }
    Database::disconnect();
}



?>

