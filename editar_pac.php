<?php
include("conexion.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>editar</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <?php
    if(isset($_POST['enviar'])){
        $nombre_paciente = $_POST['nombre_paciente'];
        $apellido_paterno = $_POST['apellido_paterno'];
        $apellido_materno = $_POST['apellido_materno'];
        $colonia_paciente = $_POST['colonia_paciente'];
        $calle_paciente = $_POST['calle_paciente'];
        $telefono_paciente = $_POST['telefono_paciente'];
$id_paciente= $_POST['Id_paciente'];
      
    ////////////////////////////no jalaaa
        $sql="update paciente set nombre_paciente='".$nombre_paciente."',apellido_paterno='".$apellido_paterno."' where id_paciente='".$id_paciente."'";
        $resultado = mysqli_query($conexion,$sql);
        if($resultado){
            echo" <script languaje = 'JavaScript'>
            alert('Los datos fueron actualizados');
            location.assign('index_paciente.php');
            </script>";
        }else{
            echo" <script languaje = 'JavaScript'>
            alert('ERROR: Los datos NO fueron actualizados');
            location.assign('index_paciente.php');
            </script>";
        }
        mysqli_close($conexion);
    }else{

        $id_paciente=$_GET['Id_paciente']; //recupera el valor del otro
        $sql='SELECT * FROM paciente WHERE id_paciente="'.$id_paciente.'"';
        $resultado = mysqli_query($conexion,$sql);

        $fila= mysqli_fetch_assoc($resultado);
         
        $nombre_paciente= $fila["nombre_paciente"];
        $apellido_paterno=$fila["apellido_paterno"];
        $apellido_materno=$fila["apellido_materno"];
        $colonia_paciente=$fila["colonia_paciente"];
        $calle_paciente=$fila["calle_paciente"];
        $telefono_paciente=$fila["telefono_paciente"];
        

        mysqli_close($conexion);
    
    ?>
    <h1>editar</h1>
    <form action="" method="post">
    <input type="text" name="id_paciente" placeholder="Id" value="<?php echo $id_paciente; ?>"> <br>
    <input type="text" name="nombre_paciente" placeholder="Nombre" value="<?php echo $nombre_paciente; ?>"> <br>
        <input type="text" name="Apellido_paterno" placeholder="Apellido paterno" value="<?php echo $apellido_paterno; ?>"> <br>
        <input type="text" name="Apellido_materno" placeholder="Apellido Materno" value="<?php echo $apellido_materno; ?>"> <br>
        <input type="text" name="colonia_paciente" placeholder="Colonia" value="<?php echo $colonia_paciente; ?>"> <br>
        <input type="text" name="calle_paciente" placeholder="Calle" value="<?php echo $calle_paciente; ?>"> <br>
        <input type="tel" name="Telefono_paciente" placeholder="Teléfono" value="<?php echo $telefono_paciente; ?>"> <br>
        <button type="submit" name="enviar">Enviar</button>
        <a href="index.php">Regresar</a>
        </form>
    <?php
    } 
    ?> 
</body>
</html>