<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Base de Datos introphp | Consulta de un Contacto</title>
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
            <li><a href="Index.php">Inicio</a></li>
            <li><a href="alta.php">Alta</a></li>
            <li class="actual"><a href="Consulta.php">Consulta</a></li>
             <li><a href="Modificar.php">Modificar</a></li>
             <li><a href="Eliminar.php">Eliminar</a></li>
          </ul>
        </nav>
      </div>
    </header>

    <section id="main">
      <div class="contenedor">
        <article id="main-col">
          <h1>CONSULTAR CONTACTOS</h1>
          <?php
            if(!isset($_GET['opcion'])){
            ?>
            <form method="GET" action="Consulta.php">
              <input type="radio" name="opcion" value="nombre">Por nombre</br>
              <input type="radio" name="opcion" value="edad">Por edad</br>
              <input type="radio" name="opcion" value="todos">Todos</br>
              <input type="submit" value="Consultar">
            </form>
            <?php
              } else{
                $opcion = $_GET['opcion'];

                $servidor = 'localhost';
                $usuario = 'root';
                $clave ='';
                $bd = 'introphp';

                $conexion = mysqli_connect($servidor, $usuario, $clave, $bd);
                if($opcion == 'todos'){
                  $sql = "SELECT * FROM agenda";
                  $resultado = mysqli_query($conexion, $sql);
                  if(mysqli_num_rows($resultado) > 0){
                    echo "<table>";
                    while($renglon = mysqli_fetch_array($resultado)){
                      echo "<tr>";
                      echo "<td>id:" . $renglon['id']. "</td>";
                      echo "<td>nombre: " . $renglon['nombre'] . "</td>";
                      echo "<td>edad: ". $renglon['edad'] . "</td>";
                      echo "<td>correo: " . $renglon['correo'] . "</td>";
                      echo "</tr>"; 
                    }
                    echo "</table>";
                  }
                }elseif($opcion=='nombre') {
                  echo "<form method='GET' action='consultaNombre.php'>";
                  echo "Nombre a buscar: <input type='text' name='nombre'><br>";
                  echo "<input type='submit' value='Consultar'>";
                  echo "</form>";
                }
                mysqli_close($conexion);
              }
            ?>

        </article>
    </section>
    
    <footer>
      <p><a href="#"></a>. &copy; Todos los derechos reservados.</p>
    </footer>
  </body>
</html>
