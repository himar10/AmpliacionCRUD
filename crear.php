
<html>
<body>

    <h1>Crear e insertar en la base de datos</h1>

    <form method="post" action="crear.php">
        Nombre:<br>
        <input type="text" name="nombre" value="">
        <br>Apellido:<br>
        <input type="text" name="apellido" value="">
        <br>DNI<br>
        <input type="text" name="dni" value="">
        <br>Email<br>
        <input type="text" name="email" value="">
        <br>Fecha Nacimiento<br>
        <input type="text" name="fecha" value="">
        <br><br>
        <input type="submit" value="Submit">
    </form>

</body>
</html>


<?php

require 'database.php';

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$dni = $_POST['dni'];
$email = $_POST['email'];
$fecha = $_POST['fecha'];


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

?>

