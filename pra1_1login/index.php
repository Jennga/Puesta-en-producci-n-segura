<?php
    session_start(); //iniciamos sesion
    if (isset($_SESSION["usuario"])) {  //comprobamos si la sesion ya fue creada
        echo"<a href=menu.php>Menu</a>"; //Si ya esta creada se llevara a menu
    } else { // si no 
        ?>
    <!DOCTYPE html> <!--Mostrara el formulario-->
        <!--    
        Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
        Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
        -->
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=, initial-scale=1.0">
            <style>
                div {
                    padding: 5px;
                    font-weight: bold;
                }
                input { border-radius: 5px;}
                #entrar { padding: 10px;
                          margin: 20px;
                          background-color: #39c5bb;
                          color: white; 
                          margin-left: 25%; }
                h3 { text-align: center;}
                fieldset { padding: 20px;
                           border-radius: 5px;
                           width: 50%;
                           margin-left: 23%;}
                legend { text-align: center;}
            </style>
            <title>Formulario</title>
        </head>
        <body>
            <h3>Acceso a la aplicacion</h3>
            <form action="procesa.php" method="post">
                <fieldset>
                    <legend>Para entrar debe identificarse</legend>
                    <div>
                    Nombre:
                        <input type="text" name="usuario" required>
                    </div>
                    <div>
                        Contraseña:
                        <input type="password" name="password" required>                    
                    </div>
                </fieldset>                
                <input type="submit" value="Entrar" id="entrar">
            </form>
        </body>
    </html>  
<?php
    }
?>