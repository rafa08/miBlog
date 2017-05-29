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
        session_destroy();

        echo"<br><br>Usted a Cerrado Sesion.";
	
	echo"<br><br>";

        echo"<a href='base.php'>Regresar</a><br>";
    
    }

?>
</div>
</div>
</div>
</center>