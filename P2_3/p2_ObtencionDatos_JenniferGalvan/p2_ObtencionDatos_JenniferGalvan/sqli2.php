<html>
<head>
    <link rel="stylesheet" type="text/css">
</head>

<body>
<div class="form">
    <form  method="POST"> <!--cambiamos a metodo POST-->
        Artículo: <input type="text" name="articulo">
        <input type="submit">
</div>
<?php
if (isset($_POST["articulo"]) && !empty($_POST["articulo"])) {
    $conexion = mysqli_connect("localhost", "root", "", "demos");

    //verifico la conexion
    if (mysqli_connect_error()) {
        printf("conexion fallida: %s\n", mysqli_connect_error());
        exit();
     } 
         
    //Obtengo los datos enviados desde el formulario
    $articulo=$_POST['articulo'];

    //Creo una sentencia preparada
    if ($queEmp=$conexion->prepare("SELECT * FROM articulos where articulo= ? ")) {
        //Ligo parametros a la consulta
        $queEmp->bind_param("s",$articulo);

        //ejecuto la consulta
        if ($queEmp->execute() ) {
          //obtengo el resultado de la consulta
          $resEmp=$queEmp->get_result();   

            if ($resEmp->num_rows > 0) {
                echo '<div  class="table">';
                echo '<table>';
                echo "<tr><th>Artículo</th><th>Precio</th></tr>";
                while ($rowEmp = $resEmp-> fetch_assoc()) {
                    echo "<tr><td> " . $rowEmp['Nombre'] . "</td><td> " . $rowEmp['Precio'] . "</td></tr>";
                echo '</table>';
                echo '</div>';
                    } 
            } else {
                echo "Artículo no encontrado. :(";
            }
        } else {
            //si la consulta falla
            printf("Error en la consulta: %s\n", $queEmp->error);
            }
        //Cierro consulta
        $queEmp->close();
      } else {
        echo "Error al preparar la consulta";      
        } 

     //Cierro conexion
     $conexion->close();
    }  
?>

</form>
</body>

</html>
