<?php
/**
 * Created by PhpStorm.
 * User: MasterRace
 * Date: 10/02/2019
 * Time: 17:50
 */
?>

<html>
<head>
    <style>
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            width: 200px;
            background-color: #f1f1f1;
        }

        li a {
            display: block;
            color: #000;
            padding: 8px 16px;
            text-decoration: none;
        }

        /* Change the link color on hover */
        li a:hover {
            background-color: red;
            color: white;
        }
    </style>
</head>
    <body>

    <h2>CRUD con PHP</h2>

    <ul>
          <li><a href="conectar.php">Conectar Base de Datos</a></li>
          <li><a href="crear.php">Crear datos</a></li>
          <li><a href="modificar.php">Modificar datos</a></li>
          <li><a href="leer.php">Leer datos</a></li>
            <li><a href="eliminar.php">Eliminar datos</a></li>
    </ul>

    </body>
</html>
