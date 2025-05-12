<?php
    session_start();
    //Compruebo que la sesion esta creada
    if (isset($_SESSION["usuario"])){
        //Redirijo al usaurio al menu.php
        header("Location: menu.php"); 
        exit();
    } else {
        //compruebo que se ha enviado el formulario
        if (isset($_POST["usuario"]) && !empty($_POST["usuario"])){           
                 // Comprobar si se ha enviado el formulario (método POST)
                if ($_SERVER['REQUEST_METHOD'] ==='POST'){
                    //Conectar con la base de datos
                    $coxb= mysqli_connect("localhost","root","","login");
                    //verifico la conexion
                    if (mysqli_connect_error()) {
                        printf("conexion fallida: %s\n", mysqli_connect_error());
                        exit();
                         }

                    //Obtengo los datos enviados desde el formulario
                    $user=$_POST['usuario'];
                    $pass=$_POST['password'];
                                            
                    //Creo la consulta para comprobar que existe el usurio
                    $consulta="SELECT * FROM datos where usuario= '$user'";

                    //Ejecuto la consulta
                    if ($resultado=mysqli_query($coxb,$consulta)) {
                        // Establezco la variable de sesión con el usuario
                        $_SESSION["usuario"]=$_POST["usuario"];
                        //verifico si el usuario fue encontrado
                        if(mysqli_num_rows($resultado) > 0){
                            //obtengo los datos del usurio
                            $fila=mysqli_fetch_assoc($resultado);
                            //verifico que la contraseña coicida
                            if ($fila["password"]== $pass){
                                //creo la session y lo redirijo al menu
                                $_SESSION["usuario"]=$user;
                                header("Location: menu.php");
                                exit();
                                } else {
                                    //No conciden contraseña con el usuario 
                                    echo "<h2>Usuario no válido</h2>";
                                    //Destruyo la sesion para evitar que se cree la sesion y muestre el menu.
                                    session_destroy();
                                    echo"<a href=index.php>volver</a>";
                                }  
                            } else {
                            //no conciden contraseña con el usuario 
                            echo "<h1>Acceso no Autorizado</h1>";
                            //Destruyo la sesion para evitar que se cree la sesion y muestre el menu.
                            session_destroy();
                            echo"<a href=index.php>volver</a>";                                
                            }
                        //Libero el resultado
                        mysqli_free_result($resultado);
                    } else {
                        //si la consulta falla
                        printf("Error en la consulta: %s\n", mysqli_error($coxb));
                    }
                     
                }
        } 
    }
?>