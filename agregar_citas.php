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
        
        $id_cita = $_POST['id_cita'];
        $id_doctor = $_POST['id_doctor'];
        $id_paciente = $_POST['id_paciente'];
        $hora_cita = $_POST['hora_cita'];
        $fecha_cita = $_POST['fecha_cita'];
        $estado_cita = $_POST['estado_cita'];
        
        $sql="INSERT INTO cita(id_cita,id_doctor,id_paciente,hora_cita,fecha_cita,estado_cita) 
        VALUES ('$id_cita', '$id_doctor', '$id_paciente'
        , '$hora_cita', '$fecha_cita','$estado_cita')";
        $resultado = mysqli_query($conexion,$sql);
        if($resultado){
            echo" <script languaje = 'JavaScript'>
            alert('Los datos fueron guardados');
            location.assign('index_citas.php');
            </script>";
        }else{
            echo" <script languaje = 'JavaScript'>
            alert('ERROR: Los datos NO fueron guardados');
            location.assign('index_citas.php');
            </script>";
        }
        mysqli_close($conexion);
    }else{

    }
    ?>
<form action="" method="POST">
        <input type="text" name="nombre_paciente" placeholder="Nombre">
        <input type="text" name="Apellido_paterno" placeholder="Apellido paterno">
        <input type="text" name="Apellido_materno" placeholder="Apellido Materno">
        <input  type="text" name="doctor" placeholder="Doctor">
        <input type="time" name="hora_cita" placeholder="Hora_cita">
        <input type="date" name="fecha_cita" placeholder="Hecha_cita" >
        <input type="text" name="id_cita" placeholder="Id cita" style="visibility:none;" >
        <option value="0">Selecciones</option>
        <select name="doctor" class="form-control" >
        <?php
        include("conexion.php");
        $sql="SELECT doctor.id_doctor, concat(empleados.nombre_empleado,' ',empleados.apellido_paterno) as nombre_doc from empleados
        INNER join doctor on empleados.id_empleado=doctor.id_empleado;";
        $resultado=mysqli_query($conexion,$sql);

        while($filas=mysqli_fetch_array($resultado)){
            $id_doctor = $fila['id_doctor'];
            $nombre_doctor = $fila['nombre_doctor'];
            ?>
            <option value="<?php echo $id_doctor;?>"><?php echo $nombre_doctor ?></option> 
            <?php // como se guarda y lo que se muestra
        }
        ?>
        </select>
        <button type="submit" name="enviar">Enviar</button>
        <a href="index.php">Regresar</a>
</body>
</html>