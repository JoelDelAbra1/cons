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
                    <input type="text" name = 'id_consultorio'>
                </td>
                <td>
                    <label for="">Numero de consultorio:</label>
                    <input type="text" name = 'num_consultorio'>
                </td>
                <td>
                <label for="">Ubicacion del consultorio:</label>
                    <input type="submit" name="enviar" value =  "BUSCAR">
                </td>
                <td>
                    <a href="index_consultorio.php">Mostrar todos</a>
                </td>
                <td><a href="agregar_consultorio.php">Nuevo</a></td>
            </tr>
            <tr></tr>
            <tr></tr>
        </table>

        </form>

        <table>
        <thead> 
        <tr>
                <th>Id</th>
                <th>Numero de consultorio</th>
                <th>Ubicacion</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if(isset($_POST['enviar'])){
                $id_consultorio = $_POST['id_consultorio'];
                $num_consultorio = $_POST['num_consultorio'];
                //$apellidos = $_POST['apellidos'];

                if(empty($_POST['id_consultorio']) && empty($_POST['num_consultorio'])){
                    echo "<script languaje = 'Javascript'>
                    alert('Ingresa el nombre o el apellido');
                    location.assign('index_consultorio.php');
                    </script>
                    ";
                }else {
                    if (empty($_POST['num_consultori'])) {
                        $sql="SELECT id_consultorio, CONCAT(num_consultorio), num_consultorio, ubicacion_consultorio 
                        FROM consultorio where id_consultorio =" .$id_consultorio; 
                    }
                    if (empty($_POST['id_consultorio'])) {
                        $sql="SELECT id_consultorio, CONCAT(num_consultorio) 
                        FROM consultorio  where num_consultorio like '%" .$num_consultorio."%'";
                    }
                    if (!empty($_POST['id_consultorio']) && !empty($_POST['num_consultorio'])) {
                        $sql="SELECT id_consultorio, CONCAT(num_consultorio) FROM consultorio 
                        where id_consultorio =".$id_consultorio." and num_consultorio like '%".$num_consultorio."%'";
                    }
                }
                
                $resultado=mysqli_query($conexion,$sql);
                while($filas=mysqli_fetch_assoc($resultado)){
                    ?>
                    <tr>
                <td><?php echo $filas['id_consultorio'] ?></td>
                <td><?php echo $filas['num_consultorio'] ?></td>
                <td>
                <?php echo "<a href='editar_consultorio.php?id_consultorio=".$filas['id_consultorio']."'>Editar</a>"; ?>
                    --
                    <?php echo "<a href='eliminar_consultorio.php?id_consultorio=".$filas['id_consultorio']."'>Eliminar</a>"; ?>
                </td>
            </tr>

        <?php
                }
            }else{
                $sql="SELECT id_consultorio, num_consultorio,ubicacion_consultorio  FROM consultorio;";
                $resultado=mysqli_query($conexion,$sql);
                while($filas=mysqli_fetch_assoc($resultado)){
            ?>
            <tr>
                <td><?php echo $filas['id_consultorio'] ?></td>
                <td><?php echo $filas['num_consultorio'] ?></td>
                <td><?php echo $filas['ubicacion_consultorio'] ?></td>
                <td>
                <?php echo "<a href='editar_consultorio.php?id_consultorio=".$filas['id_consultorio']."'>Editar</a>"; ?>
                    --
                    <?php echo "<a href='eliminar_consultorio.php?id_consultorio=".$filas['id_consultorio']."'>Eliminar</a>"; ?>
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