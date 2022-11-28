<?php
 include("conexion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citas</title>
    <script type="text/javascript">
        function confirmar(){
            return confirm('Estas seguro de eliminar');
        }
    </script>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">

    <table>
        <tr>
            <th colspan="5"><h1>Citas</h1></th>
        </tr>
        <tr>
            <td>
                <label for="">Id:</label>
                <input type="text" name = 'id_cita'>
            </td>
            <td>
                <label for="">Nombre:</label>
                <input type="text" name = 'nombre'>
            </td>
            <td>
                <input type="submit" name="enviar" value =  "BUSCAR">
            </td>
            <td>
                <a href="index_citas.php">Mostrar todos</a>
            </td>
           
            
        </tr>
        <tr></tr>
        <tr></tr>
    </table>

    </form>

    <table>
    <thead> 
      <tr>
            <th>Id</th>
            <th>Paciente</th>
            <th>Telefono</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Doctor</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if(isset($_POST['enviar'])){
            $id_cita = $_POST['id_cita'];
            $nombre = $_POST['nombre'];
            //$apellidos = $_POST['apellidos'];

            if(empty($_POST['id_cita']) && empty($_POST['nombre'])){ /////Busqueda
                echo "<script languaje = 'Javascript'>
                alert('Ingresa el nombre o el apellido');
                location.assign('index_emp.php');
                </script>
                ";
            }else {
                if (empty($_POST['nombre'])) {
                    $sql="SELECT * FROM v_citas  where id_cita =" .$id_cita; 
                }
                if (empty($_POST['id_cita'])) {
                    $sql="SELECT * FROM v_citas  where paciente like '%" .$nombre."%'";
                }
                if (!empty($_POST['id_cita']) && !empty($_POST['nombre'])) {
                    $sql="SELECT * FROM v_citas  where id_cita =" .$id_cita." and paciente like '%" .$nombre."%'";
            }
        }
            
            $resultado=mysqli_query($conexion,$sql);
            while($filas=mysqli_fetch_assoc($resultado)){ ///Realiza la consulta de la busqueda cuando se preciono
                ?>
                <tr>
            <td><?php echo $filas['id_cita'] ?></td>
            <td><?php echo $filas['paciente'] ?></td>
            <td><?php echo $filas['telefono'] ?></td>
            <td><?php echo $filas['doctor'] ?></td>
            <td><?php echo $filas['fecha_cita'] ?></td>
            <td><?php echo $filas['hora_cita'] ?></td>
            <td><?php echo $filas['estado_cita'] ?></td>
            <td>
            <?php echo "<a href='editar_cita.php?id_cita=".$filas['id_cita']."'>Editar</a>"; ?>
                --
                <?php echo "<a href='eliminar_cita.php?id_cita=".$filas['id_cita']."'>Eliminar</a>"; ?>
            </td>
        </tr>

    <?php
            }
        }else{  ///Asi se mostrara cuando entre o le de al boton de mostrar todos
            $sql="select * from v_citas";
            $resultado=mysqli_query($conexion,$sql);
            while($filas=mysqli_fetch_assoc($resultado)){
        ?>
        <tr>
            <td><?php echo $filas['id_cita'] ?></td>
            <td><?php echo $filas['paciente'] ?></td>
            <td><?php echo $filas['telefono_paciente'] ?></td>
            <td><?php echo $filas['fecha_cita'] ?></td>
            <td><?php echo $filas['hora_cita'] ?></td>
            <td><?php echo $filas['doctor'] ?></td>
            <td><?php echo $filas['estado_cita']?></td>
            <td>
            <?php echo "<a href='editar_cita.php?id_cita=".$filas['id_cita']."'>Editar</a>"; ?>
                --
                <?php echo "<a href='eliminar_cita.php?id_cita=".$filas['id_cita']."'>Eliminar</a>"; ?>
                --
                <?php echo "<a href='agregar_receta.php?id_cita=".$filas['id_cita']."'>Generar Receta</a>"; ?>
            </td>
        </tr>
        <?php
            }
        }
        ?>
      </tbody>
    </table>
</body>
</html>