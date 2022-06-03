<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Base de Datos SPARTAM gym | MODIFICAR CLIENTE</title>
    <link rel="stylesheet" href="css/estilos.css">
  </head>
  <body>
    <header>
      <div class="contenedor">
        <div id="marca">
          <h1><span class="resaltado">Base de Datos</span> introphp</h1>
        </div>
         
        <nav>
          <ul>
            
          </ul>
        </nav>
      </div>
    </header>

    <section id="main">
      <div class="contenedor">
        <article id="main-col">
          <h1>Modificar Cliente</h1>
          <?php
          $servidor="localhost";
          $usuario="root";
          $clave="";
          $bd="gym";
          ?>
          <form method="GET" action="Modificar.php">
          <?php
          if(!isset($_GET['id']) && (!isset($_GET['actualizado']))){
              $conexion=mysqli_connect($servidor,$usuario,$clave,$bd);
              $consulta="SELECT * FROM clientes";
              $resultado=mysqli_query($conexion,$consulta);
              echo "<center><h2>Selecciona un registro de la tabla si deseas modificarlo</h2></center>";
              echo "<center><input type=\"submit\" value=\"Continuar\"></center>";
              if(mysqli_num_rows($resultado)>0){
                  echo "<h2> Contactos </h2>";
                  echo "<br>";
                  echo "<table class=\"table table-striped\">";
                  echo "<tr><td>";
                  echo "<thead>";
                  echo "<tr>";
                  echo "<th>id</th>";
                  echo "<th>nombre</th>";
                  echo "<th>edad</th>";
                  echo "<th>correo</th>";
                  echo "<th>altura</th>";
                  echo "<th>peso</th>";
                  echo "<th>cuello </th>";
                  echo "<th>regimen</th>";
                  echo "<th>Modificar </th>";
                  echo "</tr>";
                  echo "</thead>";
                  while($r = mysqli_fetch_array($resultado)){
                    echo "</td><td>".$r['id']."</td>";
                    echo "</td><td>".$r['nombre']."</td>";
                    echo "</td><td>".$r['edad']."</td>";
                    echo "</td><td>".$r['correo']."</td>";
                    echo "</td><td>".$r['altura']."</td>";
                    echo "</td><td>".$r['peso']."</td>";
                    echo "</td><td>".$r['cuello']."</td>";
                    echo "</td><td>".$r['regimen']."</td>";
                    echo "<td><input type=\"radio\" value=\"".$r['id']."\" name=\"id\">  "."</td>";
                    echo "</tr>";
                  }
                  echo "<tr><td colspan=\"3\" align=\"center\">";
                  echo "</table>";
                }
                mysqli_close($conexion);
              } if(isset($_GET['id']) && (!isset($_GET['actualizado']))) {
                  $id = $_GET['id'];
                  $conexion=mysqli_connect($servidor,$usuario,$clave,$bd);
                  $consulta="SELECT * FROM clientes WHERE id=".$id;
                  $resultado=mysqli_query($conexion,$consulta);
                  if(mysqli_num_rows($resultado) > 0){
                      while($r = mysqli_fetch_array($resultado)){
                        echo "<input type=\"hidden\" name=\"id\" value=\"".$id."\">";
                        echo "nombre:";
                        echo "<input type=\"text\" name=\"nombre\" value=\"".$r['nombre']."\">";
                        echo "<br>edad: ";
                        echo "<input type=\"text\" name=\"edad\" value=\"".$r['edad']."\">";
                        echo "<br>correo: ";
                        echo "<input type=\"text\" name=\"correo\" value=\"".$r['correo']."\">";
                        echo "<br>altura: ";
                        echo "<input type=\"text\" name=\"altura\" value=\"".$r['altura']."\">";
                        echo "<br>peso: ";
                        echo "<input type=\"text\" name=\"peso\" value=\"".$r['peso']."\">";
                        echo "<br>cuello: ";
                        echo "<input type=\"text\" name=\"cuello\" value=\"".$r['cuello']."\">";
                        echo "<br>regimen: ";
                        echo "<input type=\"text\" name=\"regimen\" value=\"".$r['regimen']."\">";
                        echo "<input type=\"hidden\" name=\"actualizado\" value=\"ready\">";
                      }
                      mysqli_close($conexion);
                    }
                    echo "<br>";
                    echo "<input type=\"submit\" value=\"Guardar\">";
                  } if (isset($_GET['actualizado'])){
                      $id = $_GET['id'];
                      $nombre = $_GET['nombre'];
                      $edad = $_GET['edad'];
                      $correo = $_GET['correo'];
                      $altura = $_GET['altura'];
                      $peso = $_GET['peso'];
                      $cuello = $_GET['cuello'];
                      $regimen = $_GET['regimen'];
                      $conexion=mysqli_connect($servidor,$usuario,$clave,$bd);
                      $consulta="UPDATE agenda SET nombre='$nombre', edad='$edad', correo='$correo', altura='$altura', peso='$peso', cuello='$cuello', regimen='$regimen'  WHERE id=".$id;
                      $resultado=mysqli_query($conexion,$consulta);
                      mysqli_close($conexion);
                      echo "Modificacion exitosa";
                      echo "<br>";

                     
                    } 
                    ?>
        </article>
      </div>
  </section>

    <footer>
      <p>Contactanos 4981033828.</p>
    </footer>
  </body>
</html>