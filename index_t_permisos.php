<?php
 include("conexion.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lista</title>
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
                <th colspan="5"><h1>Lista</h1></th>
            </tr>
            <tr>
                <td>
                    <label for="">Id:</label>
                    <input type="text" name = 'permiso_id'>
                </td>
                <td>
                    <label for="">Nombre:</label>
                    <input type="text" name = 'nombre_permiso'>
                </td>
                <td>
                    <input type="submit" name="enviar" value =  "BUSCAR">
                </td>
                <td>
                    <a href="index_t_permisos.php">Mostrar todos</a>
                </td>
                <td><a href="agregar_t_permisos.php">Nuevo</a></td>
            </tr>
            <tr></tr>
            <tr></tr>
        </table>

        </form>

        <table>
        <thead> 
        <tr>
                <th>Id</th>
                <th>Nombre Permiso</th>
                <th>Descripción Permiso</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if(isset($_POST['enviar'])){
                $permiso_id = $_POST['permiso_id'];
                $nombre_permiso = $_POST['nombre_permiso'];
                //$apellidos = $_POST['apellidos'];

                if(empty($_POST['permiso_id']) && empty($_POST['nombre_permiso'])){
                    echo "<script languaje = 'Javascript'>
                    alert('Ingresa el nombre o el apellido');
                    location.assign('index_t_permiso.php');
                    </script>
                    ";
                }else {
                    if (empty($_POST['nombre_permiso'])) {
                        $sql="SELECT permiso_id, nombre_permiso, desc_permiso FROM t_permiso where permiso_id =" .$permiso_id; 
                    }
                    if (empty($_POST['permiso_id'])) {
                        $sql="SELECT permiso_id, nombre_permiso, desc_permiso FROM t_permiso
                        where nombre_permiso like '%" .$nombre_permiso."%'";
                    }
                    if (!empty($_POST['permiso_id']) && !empty($_POST['nombre_permiso'])) {
                        $sql="SELECT permiso_id,  nombre_permiso, desc_permiso FROM t_permiso
                        where permiso_id =".$permiso_id." and nombre_permiso like '%".$nombre_permiso."%'";
                    }
                }
                
                $resultado=mysqli_query($conexion,$sql);
                while($filas=mysqli_fetch_assoc($resultado)){
                    ?>
                    <tr>
                <td><?php echo $filas['permiso_id'] ?></td>
                <td><?php echo $filas['nombre_permiso'] ?></td>
                <td><?php echo $filas['desc_permiso'] ?></td>
                <td>
                <?php echo "<a href='editar_t_permisos.php?permiso_id=".$filas['permiso_id']."'>Editar</a>"; ?>
                    --
                    <?php echo "<a href='eliminar_t_permisos.php?permiso_id=".$filas['permiso_id']."'>Eliminar</a>"; ?>
                </td>
            </tr>

        <?php
                }
            }else{
                $sql="SELECT permiso_id, nombre_permiso, desc_permiso FROM t_permiso";
                $resultado=mysqli_query($conexion,$sql);
                while($filas=mysqli_fetch_assoc($resultado)){
            ?>
            <tr>
                <td><?php echo $filas['permiso_id'] ?></td>
                <td><?php echo $filas['nombre_permiso'] ?></td>
                <td><?php echo $filas['desc_permiso'] ?></td>
                <td>
                <?php echo "<a href='editar_t_permisos.php?permiso_id=".$filas['permiso_id']."'>Editar</a>"; ?>
                    --
                    <?php echo "<a href='eliminar_t_permisos.php?permiso_id=".$filas['permiso_id']."'>Eliminar</a>"; ?>
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