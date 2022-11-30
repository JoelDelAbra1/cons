<?php
 include("conexion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recibos</title>
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
        <tr><a href="index.php">Regresar</a></tr>
        <tr>
            <th colspan="4"><h1>Recibos</h1></th>
        </tr>
        <tr>
            <td>
                <label for="">Id:</label>
                <input type="text" name="id_recibo">
            </td>
            <td>
                <label for="">Nombre:</label>
                <input type="text" name = 'nombre'>
            </td>
            <td>
                <input type="submit" name="enviar" value =  "BUSCAR">
            </td>
            <td>
                <a href="index_recibos.php">Mostrar todos</a>
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
            <th>Costo</th>
            <th>Sucursal</th>
            <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if(isset($_POST['enviar'])){
            $id_recibo = $_POST['id_recibo'];
            $nombre = $_POST['nombre'];
            //$apellidos = $_POST['apellidos'];

            if(empty($_POST['id_recibo']) && empty($_POST['nombre'])){ /////Busqueda
                echo "<script languaje = 'Javascript'>
                alert('Ingresa el nombre o el apellido');
                location.assign('index_recibos.php');
                </script>
                ";
            }else {
                if (empty($_POST['nombre'])) {
                    $sql="SELECT * FROM v_recibo  where id_recibo =" .$id_recibo; 
                }
                if (empty($_POST['id_cita'])) {
                    $sql="SELECT * FROM v_recibo where paciente like '%" .$nombre."%'";
                }
                if (!empty($_POST['id_cita']) && !empty($_POST['nombre'])) {
                    $sql="SELECT * FROM v_recibo where id_recibo =" .$id_recibo." and paciente like '%" .$nombre."%'";
            }
        }
            
            $resultado=mysqli_query($conexion,$sql);
            while($filas=mysqli_fetch_assoc($resultado)){ ///Realiza la consulta de la busqueda cuando se preciono
                ?>
                <tr>
                <td><?php echo $filas['id_recibo'] ?></td>
            <td><?php echo $filas['paciente'] ?></td>
            <td><?php echo $filas['telefono_paciente'] ?></td>
            <td><?php echo $filas['fecha_generacion'] ?></td>
            <td><?php echo $filas['hora_generacion'] ?></td>
            <td><?php echo $filas['costo'] ?></td>
            <td><?php echo $filas['nombre_suc']?></td>
            <td>
            <?php echo "<a href='editar_recibo.php?id_recibo=".$filas['id_recibo']."'>Editar</a>"; ?>
                --
                <?php echo "<a href='eliminar_recibo.php?id_recibo=".$filas['id_recibo']."'>Eliminar</a>"; ?>
            </td>
        </tr>

    <?php
            }
        }else{  ///Asi se mostrara cuando entre o le de al boton de mostrar todos
            $sql="SELECT * from v_recibo";
            
            $resultado=mysqli_query($conexion,$sql);
            while($filas=mysqli_fetch_assoc($resultado)){
        ?>
        <tr>
            <td><?php echo $filas['id_recibo'] ?></td>
            <td><?php echo $filas['paciente'] ?></td>
            <td><?php echo $filas['telefono_paciente'] ?></td>
            <td><?php echo $filas['fecha_generacion'] ?></td>
            <td><?php echo $filas['hora_generacion'] ?></td>
            <td><?php echo $filas['costo'] ?></td>
            <td><?php echo $filas['nombre_suc']?></td>
            <td>
            <?php echo "<a href='editar_recibo.php?id_recibo=".$filas['id_recibo']."'>Editar</a>"; ?>
                --
                <?php echo "<a href='eliminar_recibo.php?id_recibo=".$filas['id_recibo']."'>Eliminar</a>"; ?>
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