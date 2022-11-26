 $sql="SELECT * FROM sucursal";

$sql="INSERT INTO sucursal(direccion_suc,nombre_suc,telefono_suc) 
        VALUES ('$direccion_suc', '$nombre_suc', '$telefono_suc')";

 $sql="SELECT * FROM t_permiso";

 $sql="INSERT INTO t_permiso(nombre_permiso,desc_permiso) 
        VALUES ('$nombre_permiso', '$desc_permiso')";

 $sql="SELECT * FROM prueba_lab";

 $sql="INSERT INTO prueba_lab(tipo_prueba,nombre_prueba) 
        VALUES ('$tipo_prueba', '$nombre_prueba')";

 $sql="SELECT * FROM v_recibo";

 $sql="INSERT INTO recibo(id_cita,costo,fecha_generacion,hora_generacion) 
        VALUES ('$id_cita', '$costo', '$fecha_generacion', '$hora_generacion')";

 $sql="SELECT * FROM v_receta";

 $sql="INSERT INTO recetas(id_cita,dosis_medicamento,frecuencia_medicamento,id_prueba) 
        VALUES ('$id_cita', '$dosis_medicamento', '$frecuencia_medicamento', '$id_prueba')";


$sql="update sucursal set direccion_suc='".$direccion_suc."',nombre_suc='".$nombre_suc."' ,
telefono_suc='".$telefono_suc."'
where id_sucursal='".$id_sucursal."'";

$sql="update t_permiso set nombre_permiso='".$nombre_permiso."',desc_permiso='".$desc_permiso."'
where id_permiso='".$id_permiso."'";

$sql="update prueba_lab set tipo_prueba='".$tipo_prueba."',nombre_prueba='".$nombre_prueba."'
where id_prueba='".$id_prueba."'";

$sql="update recibo set id_cita='".$id_cita."',costo='".$costo."',fecha_generacion='".$fecha_generacion."'
,hora_generacion='".$hora_generacion."'
where id_recibo='".$id_recibo."'";

$sql="update recetas set id_cita='".$id_cita."',dosis_medicamento='".$dosis_medicamento."',
frecuencia_medicamento='".$frecuencia_medicamento."',
id_prueba='".$id_prueba."'
where id_receta='".$id_receta."'";

