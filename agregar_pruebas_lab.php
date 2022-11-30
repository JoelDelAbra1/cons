<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar</title>
    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
    <?php
    if(isset($_POST['enviar'])){ //presiona el boton
        include("conexion.php");    
        
        $nombre_prueba = $_POST['nombre_prueba'];
        $tipo_prueba = $_POST['tipo_prueba'];
        
        $sql="INSERT INTO prueba_lab(nombre_prueba, tipo_prueba) 
        VALUES ('$nombre_prueba', '$tipo_prueba')";
        $resultado = mysqli_query($conexion,$sql);
        if($resultado){
            echo" <script languaje = 'JavaScript'>
            alert('Los datos fueron guardados');
            location.assign('index_prueba_lab.php');
            </script>";
        }else{
            echo" <script languaje = 'JavaScript'>
            alert('ERROR: Los datos NO fueron guardados');
            location.assign('index_prueba_lab.php');
            </script>";
        }
        mysqli_close($conexion);
    }else{

    }
    ?>
<form action="" method="POST">
    
        <input type="text" name="nombre_prueba" placeholder="Nombre de la prueba">
        <input type="text" name="tipo_prueba" placeholder="Tipo de prueba">
        <button class="btn" type="submit" name="enviar">Enviar</button>
        <a  class="btn"href="index.php">Regresar</a>
</body>
</html>