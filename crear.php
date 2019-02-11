
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
    if (validaRequerido($nombre) && validaRequerido($apellido) && validaRequerido($dni) && validaRequerido($email) && validaRequerido($fecha)){
        if (valida_texto($nombre) && valida_texto($apellido)) {
            if (validaEmail($email)) {
                $pdo = Database::connect();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "INSERT INTO persona (Nombre,Apellidos,DNI,fNacimiento,Correo) values('" . $nombre . "' , '" . $apellido . "' , '" . $dni . "' , '" . $fecha . "' , '" . $email . "')";
                try {
                    $q = $pdo->prepare($sql);
                    $q->execute();
                    echo("=======  FORMULARIO RECIBIDO CON ÉXITO  =======");
                } catch (Exception $e) {
                    echo($e);
                }
                Database::disconnect();
            } else {
                echo("Email no ha sido validado, inserte uno correcto");
            }
        }else{
            echo ("Tu nombre y apellidos deben tener 
					al menos 3 letras y únicamente caracteres alfabeticos");
        }
    }else{
        echo ("Tienes algun campo no válido o con espacios.");
    }
}



//FUNCIONES PARA VALIDACIÓN

function validaEmail($valor){
    if(filter_var($valor, FILTER_VALIDATE_EMAIL) === FALSE){
        return false;
    }else{
        return true;
    }
}

function validaRequerido($valor){
    if(trim($valor) == ''){
        return false;
    }else{
        return true;
    }
}

function valida_texto ($valor){
        //Añadir un mensaje de error si el nombre es corto.
        if (!preg_match("/[a-zA-Z]/", $valor)) {
            return false;
        }

        if (strlen($_POST["nombre"]) > 3) {
            return true;
        }
        else{
            return false;
        }
}

?>

