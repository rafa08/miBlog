<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/bootstrap-theme.css">
<link rel="stylesheet" href="css/style.css">

<!-- Barra Principal --> 
<br>
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
        <a class="navbar-brand" href="base.html" id="PagPrincipal">Blog de Rafael<span class="sr-only">(current)</span></a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li><a href="base.php" id="inicio">Iniciar Sesión</a></li>
          <li><a href="base.php" id="reg">Registrarse</a></li>
          <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Más <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><a href="base.php" id="NPost">Nuevo Post</a></li>
            <li><a href="base.php" id="MMsj">Modificar Mensaje</a></li>
        </ul>
          </li>
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

 	$nombres= $_POST['nombre'];
	$apellidos= $_POST['apellido'];
	$user= $_POST['usuario'];
	$pass= $_POST['password'];
	$email = $_POST['email'];
        
        $idConn = mysqli_connect("localhost","root","","blog");
        
        if(!$idConn) {
            die("Error! No se pudo realizar la conexión con el servidor.");
            
        }else {

       if(($nombres == "") or ($apellidos == "") or ($user == "") or ($pass == "") or ($email == "")) {
           echo "<center><br><br>No se pueden dejar casillas vacias.</center>";
           echo "<br/><br/>";     
           
       }else {
           $query = "INSERT INTO usuario values('$user','$nombres','$apellidos','$email','$pass');";
           $resultado = mysqli_query($idConn,$query);
           
           if($resultado) {
                echo("<center><br>Usted ha sido Registrado Exitosamente...<br>");
                echo("<a href='base.php'>Regresar</a><br>");
                
             } else {
		echo "<br>E R R O R";
		echo "<br>Se ha cometido un error, por favor intente de nuevo.";
		echo "<br/><br/>";
             }
          }
       }
?>
</div>
</div>
</div>
</center>