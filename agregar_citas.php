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
        
        $id_doctor = $_POST['doctor'];
        $id_paciente = $_POST['id_paciente'];
        $hora_cita = $_POST['hora_cita'];
        $fecha_cita = $_POST['fecha_cita'];
        
        
        $sql="INSERT INTO cita(id_doctor,id_paciente,hora_cita,fecha_cita) 
        VALUES ( '$id_doctor', '$id_paciente'
        , '$hora_cita', '$fecha_cita')";
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
        $id_paciente=$_GET['Id_paciente'];
        $sql="select * from paciente where id_paciente = '".$id_paciente."'";
        $resultado = mysqli_query($conexion,$sql);

        $fila= mysqli_fetch_assoc($resultado);
        $id_paciente= $fila["id_paciente"];
        $nombre_paciente= $fila["nombre_paciente"];
        $Apellido_paterno=$fila["apellido_paterno"];
        $Apellido_materno=$fila["apellido_materno"];
        mysqli_close($conexion);
    }
    ?>
<form action="" method="POST">
        <input type="hidden" name="id_paciente" value="<?php echo $id_paciente; ?>">
      <input type="text" readonly name="nombre_paciente" value="<?php echo $nombre_paciente; ?>">
      <input type="text" readonly name="apellido_paterno" value="<?php echo $Apellido_paterno; ?>">
      <input type="text" readonly name="apellido_materno" value="<?php echo $Apellido_materno; ?>">
        <input type="time" name="hora_cita" placeholder="Hora_cita">
        <input type="date" name="fecha_cita" placeholder="Fecha_cita" >
        <select name="doctor" id="">
        <?php
        include("conexion.php");
        $sql="select doctor.id_doctor,concat(empleados.nombre_empleado,'  ',empleados.apellido_paterno,' ',empleados.telefono_empleado) as doctor FROM doctor
        INNER JOIN empleados on doctor.id_empleado=empleados.id_empleado ";
        $resultado=mysqli_query($conexion,$sql);
        while($row=mysqli_fetch_array($resultado)){
           // $id_empleado=$row['id_empleado'];
            $doctor=$row['doctor'];
            $id_doctor=$row['id_doctor'];
        ?>
        <option value="<?php echo $id_doctor;?>"><?php echo $doctor;?></option>
        <?php
        }
        ?>
       </select>
    
        <button type="submit" name="enviar">Enviar</button>
        <a href="index.php">Regresar</a>
</body>
</html>