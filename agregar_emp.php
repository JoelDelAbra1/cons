<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar</title>
    <link rel="stylesheet" href="../estilos.css">
</head>
<body>
    <?php
    if(isset($_POST['enviar'])){ //presiona el boton
        include("conexion.php");    
        
        $nombre_empleado = $_POST['nombre_empleado'];
        $apellido_paterno = $_POST['apellido_paterno'];
        $apellido_materno = $_POST['apellido_materno'];
        $ocupacion_empleado = $_POST['ocupacion_empleado'];
        $colonia_empleado = $_POST['colonia_empleado'];
        $calle_empleado = $_POST['calle_empleado'];
        $numerocasa_empleado = $_POST['numerocasa_empleado'];
        $telefono_empleado = $_POST['telefono_empleado'];
        
        $sql="INSERT INTO empleados(nombre_empleado, apellido_paterno, 
        apellido_materno, ocupacion_empleado, colonia_empleado, calle_empleado, numerocasa_empleado, telefono_empleado) 
        VALUES ('$nombre_empleado', '$apellido_paterno', '$apellido_materno', '$ocupacion_empleado'
        , '$colonia_empleado', '$calle_empleado','$numerocasa_empleado','$telefono_empleado')";
        $resultado = mysqli_query($conexion,$sql);
        if($resultado){
            echo" <script languaje = 'JavaScript'>
            alert('Los datos fueron guardados');
            location.assign('index_emp.php');
            </script>";
        }else{
            echo" <script languaje = 'JavaScript'>
            alert('ERROR: Los datos NO fueron guardados');
            location.assign('index_emp.php');
            </script>";
        }
        mysqli_close($conexion);
    }else{

    }
    ?>
<form action="" method="POST">
        <input type="text" name="nombre_empleado" placeholder="Nombre">
        <input type="text" name="apellido_paterno" placeholder="Apellido paterno">
        <input type="text" name="apellido_materno" placeholder="Apellido Materno">
        <input type="text" name="ocupacion_empleado" placeholder="Ocupacion">
        <input type="text" name="colonia_empleado" placeholder="Colonia">
        <input type="text" name="calle_empleado" placeholder="Calle">
        <input type="text" name="numerocasa_empleado" placeholder="Numero Casa">
        <input type="text" name="telefono_empleado" placeholder="Telefono">
        <button type="submit" name="enviar">Enviar</button>
        <a href="index_emp.php">Regresar</a>
</body>
</html>