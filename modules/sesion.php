<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/bootstrap-theme.css">
<link rel="stylesheet" href="css/style.css">

<!-- Sesion -->
<center>
<br>
<div class="container">
<div class="row">
<div class="col-md-offset-3 col-md-6" id="marco3">
<?php
if(!isset($_SESSION)){
    session_start();
}

$user=$_POST['user'];
$password=$_POST['pass'];
$idConn = mysqli_connect("localhost","root","","blog");

        if(!$idConn) {
            die("Error! No se pudo realizar la conexión con el servidor.");
            
        }else {
            //$bd = mysql_select_db("blog",$idConn);
            
            if($user == ""){
                echo "<br>Usuario no existe!<br/>";
                echo"Desea Regresar? Clic <a href='menu.php'>Aquí</a><br/>";
                
            }else {
                $query = "SELECT * FROM usuario WHERE user = '$user';";
                $resultado = mysqli_query($idConn,$query);
                $registro = mysqli_fetch_array($resultado);
                
                if($registro) {
                    $_SESSION[$user] = $_POST['user'] ;
                    $user1= $user . "1";
                    $_SESSION["$user1"] = $registro['nombre'];
                    $user2= $user . "2";
                    $_SESSION["$user2"] = $registro['apellido'];
                    $user3= $user . "3";              
                    $_SESSION["$user3"] = $registro['email'];
                    $user4= $user . "4";              
                    $_SESSION["$user4"] = $registro['password'];
                }
            }


        if (isset($_SESSION[$_POST['user']])){
            $login=$_SESSION[$_POST['user']];
            
        }else{
            $login="";
        }
        
        if($user == "" || $password == ""){
            echo "<br>Campo Vacio!<br/>";
            echo"Desea Regresar? Clic <a href='base.php'>Aquí</a><br/>";
        }
        
        else{
            if (($user == $login)&&($password == $_SESSION["$user4"])) {
                $_SESSION['user']=$user;
                $_SESSION['password']=$password;

                echo"<br><br>Bienvenido Sr(a).". $_SESSION['user'];	
                echo"<br><br>";	
                echo"<a href='base2.php'>Regresar</a><br>";

            }else{
                echo"<br>No es un Usuario Registrado, debe hacer su Registro !<br><br>";
                echo"<a href='base.php'>Regresar</a><br>";	
            }
        }
    }
?>
</div>
</div>
</div>
</center>