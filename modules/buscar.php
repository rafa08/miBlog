<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/bootstrap-theme.css">
<link rel="stylesheet" href="css/style.css">

<?php
if(!isset($_SESSION)){
    session_start();
}
?>

<br>
<!-- Barra Principal --> 
<div class="container">
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="base2.php" id="PagPrincipal">Blog de Rafael<span class="sr-only">(current)</span></a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li><a href="base2.php" id="user"><?php echo $_SESSION['user'] ?></a></li>
          <li><a href="base2.php" id="NPost">Nuevo Post</a></li>
          <li><a href="base2.php" id="MMsj">Modificar Mensaje</a></li>
        </ul>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="salir.php">Salir</a></li>
        </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
  </nav>
</div>


<!-- Buscar Perfil -->
<center>
<br>
<div class="container">
  <div class="row" id="Perfil2" id="marco">
   <div class="col-md-offset-3 col-md-6" id="marco">
      <?php         
        $user = $_POST['user'];
        $idConn = mysqli_connect("localhost","root","","blog");
        if(!$idConn) {
            die("Error! No se pudo realizar la conexión con el servidor.");
            
        }else {
            $query = "SELECT * FROM usuario where user = '$user'";
            $resultado = mysqli_query($idConn,$query);
            $registro = mysqli_fetch_array($resultado);
            if($registro){                           
            echo "<h2>Perfil de Usuario</h2>";
            echo "<br>";
            echo "<table class=table>";
            echo"<tr><td align=center>Usuario</td><td align=center>Nombre</td><td align=center>Apellido</td><td align=center>E-mail</td></tr>"
            . "<tr>"
            . "<td align=center>",$registro['user'],"</td>"
            . "<td align=center>",$registro['nombre'],"</td>"
            . "<td align=center>",$registro['apellido'],"</td>"      
            . "<td align=center>",$registro['email'],"</td>"
            . "</tr>";
            echo"</table>";
            }else{
              echo "<br><br><br><br><b>No existe usuario con ese nombre :(</b><br/>";
            }                 
        } ?>
  <form name="f4" method="post" action="principal2.php">
   <button type="submit" class="btn btn-default">Regresar</button>
  </form>
      </center>
    </div>
  </div>
</div>

