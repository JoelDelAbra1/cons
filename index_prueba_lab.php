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
        <link rel="stylesheet" href="bootstrap.min.css">
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
                    <input type="text" name = 'id_prueba'>
                </td>
                <td>
                    <label for="">Nombre:</label>
                    <input type="text" name = 'nombre_prueba'>
                </td>
                <td>
                    <input type="submit" name="enviar" value =  "BUSCAR">
                </td>
                <td>
                    <a href="index_prueba_lab.php">Mostrar todos</a>
                </td>
                <td><a href="agregar_pruebas_lab.php">Nuevo</a></td>
            </tr>
            <tr></tr>
            <tr></tr>
        </table>

        </form>

        <table>
        <thead> 
        <tr>
                <th>Id</th>
                <th>Nombre de prueba</th>
                <th>Telefono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if(isset($_POST['enviar'])){
                $id_prueba = $_POST['id_prueba'];
                $nombre_prueba = $_POST['nombre_prueba'];
                //$apellidos = $_POST['apellidos'];

                if(empty($_POST['id_prueba']) && empty($_POST['nombre_prueba'])){
                    echo "<script languaje = 'Javascript'>
                    alert('Ingresa el nombre o el apellido');
                    location.assign('index_prueba_lab.php');
                    </script>
                    ";
                }else {
                    if (empty($_POST['nombre_prueba'])) {
                        $sql="SELECT id_prueba,  nombre_prueba, tipo_prueba FROM prueba_lab where id_prueba =" .$id_prueba; 
                    }
                    if (empty($_POST['id_prueba'])) {
                        $sql="SELECT id_prueba, nombre_prueba,tipo_prueba FROM prueba_lab  where nombre_prueba like '%" .$nombre_prueba."%'";
                    }
                    if (!empty($_POST['id_prueba']) && !empty($_POST['nombre_prueba'])) {
                        $sql="SELECT id_prueba,nombre_prueba, tipo_prueba FROM prueba_lab where id_prueba =".$id_prueba." and nombre_prueba like '%".$nombre_prueba."%'";
                    }
                }
                
                $resultado=mysqli_query($conexion,$sql);
                while($filas=mysqli_fetch_assoc($resultado)){
                    ?>
                    <tr>
                <td><?php echo $filas['id_prueba'] ?></td>
                <td><?php echo $filas['tipo_prueba'] ?></td>
                <td><?php echo $filas['nombre_prueba'] ?></td>
                <td>
                <?php echo "<a href='editar_prueba_lab.php?id_prueba=".$filas['id_prueba']."'>Editar</a>"; ?>
                    --
                    <?php echo "<a href='eliminar_prueba_lab.php?id_prueba=".$filas['id_prueba']."'>Eliminar</a>"; ?>
                </td>
            </tr>

        <?php
                }
            }else{
                $sql="SELECT id_prueba,tipo_prueba, nombre_prueba  FROM prueba_lab;";
                $resultado=mysqli_query($conexion,$sql);
                while($filas=mysqli_fetch_assoc($resultado)){
            ?>
            <tr>
                <td><?php echo $filas['id_prueba'] ?></td>
                <td><?php echo $filas['tipo_prueba'] ?></td>
                <td><?php echo $filas['nombre_prueba'] ?></td>
                
                <td>
                <?php echo "<a href='editar_prueba_lab.php?id_prueba=".$filas['id_prueba']."'>Editar</a>"; ?>
                    --
                    <?php echo "<a href='eliminar_prueba_lab.php?id_prueba=".$filas['id_prueba']."'>Eliminar</a>"; ?>
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