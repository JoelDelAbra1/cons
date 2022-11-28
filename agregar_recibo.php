<?php
include("conexion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Recibo</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <?php
    if(isset($_POST['enviar'])){ //presiona el boton
        include("conexion.php");    
        
       $id_cita=$_POST['id_cita'];
       $dosis_medicamento=$_POST['dosis_medicamento'];
       $frecuencia_medicamento=$_POST['frecuencia_medicamento'];
       $id_prueba=$_POST['id_prueba'];
       

        $sql="INSERT INTO recetas(id_cita,dosis_medicamento,frecuencia_medicamento,id_prueba) 
        VALUES ( '$id_cita', '$dosis_medicamento'
        , '$frecuencia_medicamento', '$id_prueba')";
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
    }else{ //Recuperar los datos y mostrarlos en los input
        $id_cita=$_GET['id_cita'];
        $sql="select * from v_receta where id_paciente = 7";
        $resultado = mysqli_query($conexion,$sql);

        $fila= mysqli_fetch_assoc($resultado);
        $id_receta= $fila["id_receta"];
        $id_paciente= $fila["id_paciente"];
       $hora_cita= $fila["hora_cita"];
       $fecha_cita= $fila["fecha_cita"];
        $Doctor= $fila["Doctor"];
        $telefono_empleado= $fila["telefono_empleado"];
         $paciente= $fila["paciente"]; 
         $telefono_paciente= $fila["telefono_paciente"];
      $nombre_suc= $fila["nombre_suc"];
      $direccion_suc= $fila["direccion_suc"];
      $telefono_suc= $fila["telefono_suc"];
        mysqli_close($conexion);
    }
    ?> 
<form action="" method="POST"> 
<input type="hidden" name="id_cita" value="<?php echo $id_cita; ?>">
        <input type="hidden" name="id_receta" value="<?php echo $id_receta; ?>">
        <input type="hidden" name="id_paciente" value="<?php echo $id_paciente; ?>">
        <input type="text" name="hora_cita" value="<?php echo $hora_cita; ?>">
        <input type="text" name="fecha_cita" value="<?php echo $fecha_cita; ?>">
        <input type="text" name="Doctor" value="<?php echo $Doctor; ?>">
        <input type="text" name="telefono_empleado" value="<?php echo $telefono_empleado; ?>">
        <input type="text" name="paciente" value="<?php echo $paciente; ?>">
        <input type="text" name="telefono_paciente" value="<?php echo $telefono_paciente; ?>">
        <input type="text" name="nombre_suc" value="<?php echo $nombre_suc; ?>">
        <input type="text" name="direccion_suc" value="<?php echo $direccion_suc; ?>">
        <input type="text" name="telefono_suc" value="<?php echo $telefono_suc; ?>">
      <input type="text" readonly name="nombre_paciente" value="<?php echo $paciente; ?>">

      <input type="text" name="dosis_medicamento" placeholder="Dosis" >
      <input type="text" name="frecuencia_medicamento" placeholder="Frecuencia" >

        
        <select name="id_prueba" id="">
        <?php
        include("conexion.php");
        $sql="select * from prueba_lab";
        $resultado=mysqli_query($conexion,$sql);
        while($row=mysqli_fetch_array($resultado)){
           // $id_empleado=$row['id_empleado'];
            $tipo_prueba=$row['tipo_prueba'];
            $nombre_prueba=$row['nombre_prueba'];
            $id_prueba=$row['id_prueba'];
        ?>
        <option value="<?php echo $id_prueba;?>"><?php echo $nombre_prueba;?></option>
        <?php
        }
        ?>
       </select>
    
        <button type="submit" name="enviar">Gurdar y Generar Recibo</button>
        <a href="index.php">Regresar</a>
</body>
</html>