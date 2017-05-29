<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/bootstrap-theme.css">
<link rel="stylesheet" href="css/style.css">

<center>
<br>
<div class="container">
<div class="row">
<div class="col-md-offset-3 col-md-6" id="marco3">
<?php
if(!isset($_SESSION)){
    session_start();
}      
        $old = $_POST['old'];
        $new = $_POST['new'];
        $iduser = $_SESSION[$_SESSION['user']];
        $iduser4 = $iduser . "4";
        $pass = $_SESSION["$iduser4"];

if($old == $pass){
        $idConn = mysqli_connect("localhost","root","","blog");

        if(!$idConn) {
            die("Error! No se pudo realizar la conexión con el servidor.");
            
        }else {
        
       if($old=="" || $new=="") {
           echo "<center>Campo Vacio!</center>";
           echo "<br/><br/>";
           
       }else {           
           $query = "UPDATE usuario SET `password` = '$new' WHERE user = '$iduser';";
           $resultado = mysqli_query($idConn,$query);
           
           if($resultado) {
                echo("<center><br><br>Usted ha cambiado su contraseña Exitosamente...<br>");
             } else {
		echo "<br>E R R O R";
		echo "<br>Se ha cometido un error, por favor intente de nuevo.";
		echo "<br/><br/>";
             }
          }
      }
}else{
  echo "<br><br>Error su vieja contraseña es invalida!!!<br>";
}
?>
<a href="base2.php">Regresar</a>
</div>
</div>
</div>
</center>