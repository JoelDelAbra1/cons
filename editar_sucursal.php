<?php
include("conexion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <?php
    if(isset($_POST['enviar'])){ //presiona el boton
        include("conexion.php");    
        $id_sucursal=$_POST['id_sucursal'];
        $nombre_suc = $_POST['nombre_suc'];
        $direccion_suc = $_POST['direccion_suc'];
        $telefono_suc = $_POST['telefono_suc'];

        if(empty($_POST['nombre_suc']) || empty($_POST['direccion_suc']) || empty($_POST['telefono_suc'])){
            echo "<p>FALTAN COMPOR POR LLENAR</p>";
            
        }else{
        
        $sql="update sucursal set direccion_suc = '$direccion_suc', nombre_suc = '$nombre_suc',
         telefono_suc = '$telefono_suc' where id_sucursal = 1";
        $resultado = mysqli_query($conexion,$sql);
        if($resultado){
            echo" <script languaje = 'JavaScript'>
            alert('Los datos fueron guardados');
            location.assign('index_sucursal.php');
            </script>";
        }else{
            echo" <script languaje = 'JavaScript'>
            alert('ERROR: Los datos NO fueron guardados');
            location.assign('index_sucursal.php');
            </script>";
        }
        
    mysqli_close($conexion);
    } 
    }else{
        $id_sucursal=$_GET['id_sucursal'];
        $sql='SELECT * FROM sucursal WHERE id_sucursal="'.$id_sucursal.'"';
        $resultado=mysqli_query($conexion,$sql);
        $fila=(mysqli_fetch_assoc($resultado));   
        $nombre_suc= $fila["nombre_suc"];
        $telefono_suc= $fila["telefono_suc"];
        $direccion_suc=$fila["direccion_suc"];

        mysqli_close($conexion);
    
    ?>
<form action="" method="POST">
<input type="hidden" name="id_sucursal" placeholder="Id Sucursal" value="<?php /// Se debe agregar oara que lo actualiza
        if(isset($telefono_suc)) echo $telefono_suc?>">
<input type="text" name="nombre_suc" placeholder="Nombre Sucursal" value="<?php
        if(isset($nombre_suc)) echo $nombre_suc?>">
        <input type="tel" name="telefono_suc" placeholder="Teledono Sucursal" value="<?php
        if(isset($telefono_suc)) echo $telefono_suc?>">
        <input type="text" name="direccion_suc" placeholder="Direccion sucursal Materno" value="<?php
        if(isset($direccion_suc)) echo $direccion_suc?>">
        <button type="submit" name="enviar">Enviar</button>
        <a href="index_sucursal.php">Regresar</a>
        </form>
    <?php
    } 
    ?> 
</body>