<?php
    //iniciamos sesion
    session_start(); 
    //Compruebo que la sesion ya esta creada
    if (isset($_SESSION["usuario"])) { 
        //cierro sesion
        session_destroy(); 
        //Redirijo al usaurio al index.php
        header("Location: index.php"); 
        exit();               
    }
?>