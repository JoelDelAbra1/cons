
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
   
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Consultorio</title>

<link href="templatemo_style.css" rel="stylesheet" type="text/css" />
</head>
<body>
    
<div id="templatmeo_container">
	<div id="templatemo_site_title_bar">
        
    
    </div> <!-- templatemo_site_title_bar -->
    
    <div id="templatemo_menu">
        <ul id="templatemo_left_menu">
           <li><a href="vista2.php" class="current"><span></span>Contacto</a></li>
            <li><a href="vista4.php" class="current"><span></span>Historial</a></li>
           <li><a href="Vista1.php" class="current"><span></span>Medico</a></li>
            <li><a href="control.php" class="current"><span></span>Control</a></li>
            <li><a href="vista3.php" class="current"><span></span>Pacientes</a></li>
            <li><a href="vista5.php" class="current"><span></span>Empleados</a></li>
            <li><a href="vista6.php" class="current"><span></span>Cita</a></li>
            <li><a href="phpfiles/cierra.php" class="current"><span></span>Cierra</a></li>
        </ul>
        
		
    </div> <!-- end of menu -->
    
    <div id="templatemo_banner">
    	<div id="banner_left_section">
                <h2>Bienvenido <span></span></h2>
              Agrega una cita<br>
                 
                <form action="insertacita2.php" method="post">


                    <label>ID_cita:</label>
                    <input   name="id_cita" type="text"/><br>
                        <label>Fecha:</label>
                    <input   name="fecha" type="text"/><br>
                          <label>Nombre:</label>
                          <input   name="nombre" type="text"/><br>
                                <label>Medico:</label>
                    <input   name="medico" type="text"/><br>
                   
           
                         
                    
                    <input  type="submit"  value="Enviar" /><br>
                    </form>
                  
                  
                  
                  
                  

                        //session_start();
                        include("phpfiles/libreria.php");

                        $conex = conecta();
                        $sql = "SELECT * FROM v6";
                        $result = mysql_query($sql, $conex);

                        echo "<br>";
                        echo "<table class='tablaresultados' align='center'>\n";
                        echo "<caption><h3 align='center' >Cita</h3></caption>";
                        echo "<tr>
               
                <th bgcolor=\"#violet\">id_cita</th>
                 <th bgcolor=\"#violet\">fecha</th>
   <th bgcolor=\"#violet\">nombre</th>
      <th bgcolor=\"#violet\">medico</th>
                </tr>";
                        while ($row = mysql_fetch_row($result)) {


                            echo "<table class='consulta' align='center'>";
                            echo "<tr>";
                            echo "<td id='cero'>" . $row[0] . "</td>";
                            echo "<td>" . $row[1] . "</td>";
                           echo "<td>" . $row[2] . "</td>";
                           echo "<td>" . $row[3] . "</td>";



                            echo "</tr>";
                        }
                        echo "</table>";
                        echo "<br>";
                        echo "<br>";
                        mysql_close()
                        ?>
   
   
   </table>
    
</div>
        
        
        
        <div class="cleaner"></div>
    </div> <!-- end of banner -->
    
    <div id="templatemo_content">
    
    	<div id="main_column">
        	<div class="section_w490">
	        	<h3>Nuestros Proyectos</h3>
                <div class="section_w220 fl">
                    <img class="image_wrapper fl_image" src="images/LogoSalud.jpg" alt="image" />
                    <p>Quienes somos </p>
                    <a href="avancesadmin.php">Read more</a>
                </div>
                
                <div class="section_w220 fl">
                    <img class="image_wrapper fl_image" src="images/logo_medicina.jpg" alt="image" />
                    <p>Mision</p>
                    <a href="misionadmin.php">Read more</a>
                </div>
                
                <div class="section_w220 fl">
                    <img class="image_wrapper fl_image" src="images/b2.jpg" alt="image" />
                    <p>Valores</p>
                    <a href="valoresadmin.php">Read more</a>
                </div>
                
                <div class="section_w220 fl">
                    <img class="image_wrapper fl_image" src="images/logo 4 definitivo.jpg" alt="image" />
                    <p>Historia</p>
                    <a href="historiaadmin.php">Read more</a>
                </div>

            </div>
        </div> <!--end of main column -->
        <div id="side_column">
        
        	<div id="quick_contact">
            	<h3>Contacto</h3>
                <ul class="list">
                	<li>Tel: 010 010 0100</li>
                    <li>Fax: 020 020 0200</li>
                    <li>Email: consultorio@hotmail.com</li>
                </ul>
            </div>
        
        </div> <!-- end of side column -->
    	<div class="cleaner"></div>
    </div> <!-- end of templatemo_content -->
    
	<div id="templatemo_footer">
    	
        
        
            Dise??ado por  <a href="https://www.facebook.com/liloquirozzz" target="_parent">Luis Quiroz</a> 
	</div> <!-- end of footer -->
</div> <!-- end of tempatemo_container -->
</body>
</html>


    <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
    <html>
        <head>
            <title></title>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <link rel="StyleSheet" href="CSS/estilo.css" type="text/css" />
        </head>
        <body>
            <div id="principal">
                <div id="banner">
                    <img src="images/headerBackground.jpg" width="100%" height="300px">
                </div>
                <div id="cuerpo">
                    <center><p>No has iniciado sesion</p></center>
                </div>
            </div>
        </body>
    </html>
