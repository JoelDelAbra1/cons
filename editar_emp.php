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
        
        $apellido_paterno = $_POST['apellido_paterno'];
        $apellido_materno = $_POST['apellido_materno'];
        $colonia_empleado = $_POST['colonia_empleado'];
        $calle_empleado = $_POST['calle_empleado'];
        $telefono_empleado = $_POST['telefono_empleado'];
$id_empleado= $_POST['id_empleado'];
        $nombre_empleado = $_POST['nombre_empleado'];
    ////////////////////////////no jalaaa
    $sql="update personita set nombre='".$nombre.
        "', apellidos='".$apellidos."' where cedula='".$cedula."'";
        $sql="update empleados set nombre_empleado='".$nombre_empleado."',apellido_paterno='".$apellido_paterno."' where id_empleado='".$id_empleado."'";
        $resultado = mysqli_query($conexion,$sql);
        if($resultado){
            echo" <script languaje = 'JavaScript'>
            alert('Los datos fueron actualizados');
            location.assign('index_emp.php');
            </script>";
        }else{
            echo" <script languaje = 'JavaScript'>
            alert('ERROR: Los datos NO fueron actualizados');
            location.assign('index_emp.php');
            </script>";
        }
        mysqli_close($conexion);
    }else{

        $id_empleado=$_GET['id_empleado']; //recupera el valor del otro
        $sql="select * from empleados where id_empleado = '".$id_empleado."'";
        $resultado = mysqli_query($conexion,$sql);

        $fila= mysqli_fetch_assoc($resultado);
        $id_empleado= $fila["id_empleado"];
        $nombre_empleado= $fila["nombre_empleado"];
        $apellido_paterno=$fila["apellido_paterno"];
        $apellido_materno=$fila["apellido_materno"];
        $colonia_empleado=$fila["colonia_empleado"];
        $calle_empleado=$fila["calle_empleado"];
        $telefono_empleado=$fila["telefono_empleado"];
        

        mysqli_close($conexion);
    
    ?>
    <h1>editar</h1>
    <form action="" method="post">
    <input type="text" name="id_empleado" placeholder="Id" value="<?php echo $id_empleado; ?>"> <br>
    <input type="text" name="nombre_empleado" placeholder="Nombre" value="<?php echo $nombre_empleado; ?>"> <br>
        <input type="text" name="apellido_paterno" placeholder="Apellido paterno" value="<?php echo $apellido_paterno; ?>"> <br>
        <input type="text" name="apellido_materno" placeholder="Apellido Materno" value="<?php echo $apellido_materno; ?>"> <br>
        <input type="text" name="colonia_empleado" placeholder="Colonia" value="<?php echo $colonia_empleado; ?>"> <br>
        <input type="text" name="calle_empleado" placeholder="Calle" value="<?php echo $calle_empleado; ?>"> <br>
        <input type="text" name="telefono_empleado" placeholder="Teléfono" value="<?php echo $telefono_empleado; ?>"> <br>
        <button type="submit" name="enviar">Enviar</button>
        <a href="index_emp.php">Regresar</a>
    </form>
    <?php
    } 
    ?>
</body>
</html>