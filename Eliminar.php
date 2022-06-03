<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Base de Datos GYM| ELIMINAR Cliente</title>
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
          <h1>Eliminar Contacto</h1>
           <?php
          $servidor='localhost';
          $usuario='root';
          $clave='';
          $bd ='gym';
          if(!isset($_GET['id'])){
            echo "<form method='GET' action='Eliminar.php'>";
            $conexion=mysqli_connect($servidor, $usuario, $clave, $bd);
            $sql="SELECT * FROM clientes";
            $res = mysqli_query($conexion, $sql); 
            if(mysqli_num_rows($res) > 0){
              echo "<table>";
              while($renglon = mysqli_fetch_array($res)){     
                echo "<tr>";
                echo "<td><input type='radio' name='id' value='".$renglon['id']."'>Id:" . $renglon['id']. "</td>";  
                echo "<td>nombre: " . $renglon['nombre'] . "</td>";
                echo "<td>edad: ". $renglon['edad'] . "</td>";
                echo "<td>correo: " . $renglon['correo'] . "</td>";
                 echo "<td>altura: " . $renglon['altura'] . "</td>";
                echo "<td>peso: ". $renglon['peso'] . "</td>";
                echo "<td>cuello: " . $renglon['cuello'] . "</td>";
                echo "<td>regimen: " . $renglon['regimen'] . "</td>";
                echo "</tr>";     
              }       
              echo "</table>"; 
              mysqli_close($conexion);
            } 
            echo "<input type='submit' value='Eliminar'>";
            echo "</form>";
          } else {
            $id = $_GET['id'];
            $conexion=mysqli_connect($servidor, $usuario, $clave, $bd); 
            $sql="DELETE FROM clientes WHERE id = '$id'";
            mysqli_query($conexion, $sql);
            mysqli_close($conexion);
            echo "Registro eliminado";
          }
          ?>
        </article>
    </section>

    <footer>
      <p>Contactanos<a href="#">4981211635</a>. &copy; Todos los derechos reservados.</p>
      <a href="index.html">Regresar</a>
    </footer>
  </body>
</html>
