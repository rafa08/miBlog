<?php
if(!isset($_SESSION)){
    session_start();
}

?>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/bootstrap-theme.css">
<link rel="stylesheet" href="css/style.css">

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
      	<a class="navbar-brand" href="#Principal" id="PagPrincipal">Blog de Rafael<span class="sr-only">(current)</span></a>
    	</div>

    	<!-- Collect the nav links, forms, and other content for toggling -->
    	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      	<ul class="nav navbar-nav">
       	 	<li><a href="#Login" id="user"><?php echo $_SESSION['user'] ?></a></li>
          <li><a href="#" id="NPost">Nuevo Post</a></li>
          <li><a href="#" id="MMsj">Modificar Mensaje</a></li>
        </ul>
      	</ul>
      	<form class="navbar-form navbar-left" role="search" action="buscar.php" method="POST">
        <div class="form-group">
          	<input type="text" class="form-control" name="user" placeholder="Buscar Usuario...">
        </div>
        	<button type="submit" class="btn btn-default">Aceptar</button>
      	</form>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="salir.php">Salir</a></li>
        </ul>
    		</div><!-- /.navbar-collapse -->
  		</div><!-- /.container-fluid -->
	</nav>
</div>

<!-- Perfil -->
<center>
<div class="container">
<div class="row" id="Perfil" style="display: none;">
<br><br>
<div class="col-md-offset-3 col-md-6" id="marco">
<?php 
if(!isset($_SESSION['user'])) {
          echo ("<center>Debe Iniciar una Sesión Primero<br></center>");
}else {
            $iduser = $_SESSION[$_SESSION['user']];
            $iduser1 = $iduser . "1";
            $iduser2 = $iduser . "2";
            $iduser3 = $iduser . "3";
            $iduser4 = $iduser . "4";
  
            $nombre = $_SESSION["$iduser1"];
            $apellido = $_SESSION["$iduser2"];
            $email = $_SESSION["$iduser3"];
            $pass = $_SESSION["$iduser4"];
    echo "<h2>Perfil de Usuario</h2>";
    echo "<br>";
    echo "<table class=table>";
    echo"<tr><td align=center>Usuario</td><td align=center>Nombre</td><td align=center>Apellido</td><td align=center>E-mail</td></tr>"
      . "<tr>"
      . "<td align=center>$iduser</td>"
      . "<td align=center>$nombre</td>"
      . "<td align=center>$apellido</td>"      
      . "<td align=center>$email</td>"
      . "</tr>";
    echo"</table>";  

    echo "<a href=# id=pass>Cambiar Contraseña</a>";
}             
?>
</div>
</div>
</div>
</center>

<!-- Modificar Contraseña-->
<center>
  <div class="container">
    <div class="row" id="NPass" style="display: none;">
      <div class="col-md-offset-3 col-md-6" id="marco">
        <h2>Cambiar Contraseña</h2>
        <form class="form-horizontal" class="form-control" method="POST" action="modificarContrasena.php">
          <div class="form-group">
            <label for="OldPass" style="color:#000000" class="col-sm-2 control-label">Vieja: </label>
            <div class="col-sm-10">
              <input type="password" class="form-control" id="OldPass" name="old" placeholder="Vieja contraseña..">
            </div>
          </div>
          <div class="form-group">
            <br>
            <label for="NewPass" style="color:#000000" class="col-sm-2 control-label">Nueva: </label>
            <div class="col-sm-10">
              <input type="password" class="form-control" id="NewPass" name="new" placeholder="Nueva contraseña..">
            </div>
          </div>
          <div class="form-group">
          <div class="col-sm-offset-1 col-sm-10">
              <button type="submit" class="btn btn-default">Cambiar Contraseña</button>
          </div>
          </div>
      </form>
      </div>
    </div>
  </div>
</center>


<!-- Mensajes -->
<div class="container">
  <div class="row" id="Mensajes">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <center><p style="background-color: white" class="form-control">Mensajes</p></center>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <center><table class="table" style="background-color: white" class="form-control">
      <?php         

        $idConn = mysqli_connect("localhost","root","","blog");
        if(!$idConn) {
            die("Error! No se pudo realizar la conexión con el servidor.");
            
        }else {
            $query = "SELECT * , DATE_FORMAT(fecha ,'%d/%m/%Y %h:%i:%s %p') as mifecha FROM mensajes order by miFecha Desc";
            $resultado = mysqli_query($idConn,$query);
           
            if($registro = mysqli_fetch_array($resultado)) {                            
                do{    
                        echo "<tr>"
                        ."<b><td style='width:15px;'>",$registro['usuario'],": </td></b>"                
                        ."<td>",$registro['mensaje'],"</td>"
                        ."<td align=right>",$registro['mifecha'],"</td>";
                            
                }while($registro = mysqli_fetch_array($resultado));
                
            }else {
              echo "<tr><td align='center'>No hay Mensajes :c</td></tr>";
            }            
      } ?></table></center>
    </div>
  </div>
</div>

<!-- Nuevo Mensaje-->
<center>
  <div class="container">
    <div class="row" id="NMsj" style="display: none;">
    <br><br>
      <div class="col-md-offset-3 col-md-6" id="marco">
        <form class="form-horizontal" class="form-control" method="POST" action="nuevoMensaje.php">
          <div class="form-group">
            <br><br>
            <label for="Mensaje" style="color:#000000" class="col-sm-2 control-label">Mensaje: </label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="Mensaje" name="mensaje" placeholder="Mensaje...">
            </div>
          </div>
          <div class="form-group">
          <div class="col-sm-offset-1 col-sm-10">
              <button type="submit" class="btn btn-default">Enviar</button>
          </div>
          </div>
      </form>
      </div>
    </div>
  </div>
</center>

<!-- Modificar Mensaje -->
<center>
<div class="container">
<div class="row" id="ModMsj" style="display: none;">
<br><br>
<div class="col-md-offset-3 col-md-6" id="marco">
<?php 
$iduser= $_SESSION[$_SESSION['user']];
$idConn = mysqli_connect("localhost","root","","blog");
        if(!$idConn) {
            die("Error! No se pudo realizar la conexión con el servidor.");
            
        }else {
            if(isset($_SESSION['user'])){
                $query = "SELECT * FROM mensajes WHERE usuario = '$iduser';";
                $resultado = mysqli_query($idConn,$query);
                 
                    if($registro = mysqli_fetch_array($resultado)) { 
                      echo "<form name=msj method=post action=modificarMsj.php>";
                      echo "<br>";
                      echo "<label for='Mensaje' style='color:#000000' class='col-sm-2 control-label'>Msj a Editar: </label>";
                      echo "<select class=form-control style='width: 400px' name=opcion>";  
                    
                  do{              
                      echo "<option value =".$registro['id'].">",$registro['mensaje'],"</option>";
                      echo "<br><br>";
                      }while($registro = mysqli_fetch_array($resultado));  
                    
                      echo"</select>";
                      echo "<div class='form-group'>"
                          ."<br><br>"
                          ."<label for='Mensaje' style='color:#000000' class='col-sm-2 control-label'>Mensaje: </label>"
                          ."<div class='col-sm-10'>"
                          ."<input type='text' class='form-control' id='Mensaje' name='mensaje' placeholder='Mensaje...'>"
                          ."</div>"
                          ."</div>"
                          ."<br><br>"
                          ."<div class='form-group'>"
                          ."<div class='col-sm-offset-1 col-sm-10'>"
                          ."<button type='submit' class='btn btn-default'>Editar</button>"
                          ."</div>"
                          ."</div>"
                          ."</form>";
                    }else{
                      echo "<br><br><br><br><b>Lo sentimos no posee msjs para modificar :c</b>";            
                    }
          } 
      } 
?>              
</div>
</div>
</div>
</center>

<!-- Respuesta -->
<center>
  <div class="container">
    <div class="row" id="resp" style="display: none;">
    <br><br>
      <div class="col-md-offset-3 col-md-6" id="marco">
        <form class="form-horizontal" class="form-control" method="POST" action="respuesta.php">
          <div class="form-group">
            <br><br>
            <label for="Mensaje" style="color:#000000" class="col-sm-2 control-label">Mensaje: </label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="Mensaje" name="mensaje" placeholder="Mensaje...">
            </div>
          </div>
          <div class="form-group">
          <div class="col-sm-offset-1 col-sm-10">
              <button type="submit" class="btn btn-default">Enviar</button>
          </div>
          </div>
      </form>
      </div>
    </div>
  </div>
</center>


<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
      $("#NPost").click(function() {
        $("#Mensajes").hide('fast');
        $("#NMsj").fadeIn('slow');
        $("#ModMsj").hide('fast');
        $("#Perfil").hide('fast');
        $("#NPass").hide('fast');
      });

    $("#MMsj").click(function() {
        $("#Mensajes").hide('fast');
        $("#NMsj").hide('fast');
        $("#ModMsj").fadeIn('slow');
        $("#Perfil").hide('fast');
        $("#NPass").hide('fast');
      });

      $("#PagPrincipal").click(function() {
        $("#Mensajes").show('fast');
        $("#NMsj").hide('fast');
        $("#ModMsj").hide('fast');
        $("#Perfil").hide('fast');
        $("#NPass").hide('fast');
      });

    $("#user").click(function() {
        $("#Mensajes").hide('fast');
        $("#NMsj").hide('fast');
        $("#ModMsj").hide('fast');
        $("#Perfil").fadeIn('slow');
        $("#NPass").hide('fast');
      });

    $("#pass").click(function() {
        $("#Mensajes").hide('fast');
        $("#NMsj").hide('fast');
        $("#ModMsj").hide('fast');
        $("#Perfil").hide('fast');
        $("#NPass").fadeIn('slow');
      });

    });
</script>