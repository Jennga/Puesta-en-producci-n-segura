<?php
//iniciamos sesion
session_start(); 
    //compruebo que existe la session
    if (isset($_SESSION["usuario"])) { 
        //muestro el menu
        echo "<h1>Loggen in</h1>";
        echo "<hr>";
        //Nos llevara a desconectar la session
        echo"<a href=logout.php>Desconectar</a>"; 
    }
?>