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

<center>
<br>
<div class="container">
<div class="row">
<div class="col-md-offset-3 col-md-6" id="marco3">
<?php
if(!isset($_SESSION)){
    session_start();
}      
        $mensaje=$_POST['mensaje'];
        $idConn = mysqli_connect("localhost","root","","blog");
        $ID = $_POST['opcion'];
        if(!$idConn) {
            die("Error! No se pudo realizar la conexión con el servidor.");
            
        }else {
        
       if($mensaje=="") {
           echo "<center>No se pueden guardar un mensaje en blanco.</center>";
           echo "<br/><br/>";
           
       }else {           
           $query = "UPDATE mensajes SET mensaje = '$mensaje', fecha = now() WHERE id = '$ID';";
           $resultado = mysqli_query($idConn,$query);
           
           if($resultado) {
                echo("<center>Usted ha modificado el mensaje Exitosamente...<br>");
             } else {
		echo "<br>E R R O R";
		echo "<br>Se ha cometido un error, por favor intente de nuevo.";
		echo "<br/><br/>";
             }
          }
       }
?>
<a href="base2.php">Regresar</a>
</div>
</div>
</div>
</center>