<?php 
session_start();
session_unset();
session_destroy();
setcookie("idUsuario", "", time() - 3600, "/");
setcookie("usuario", "", time() - 3600, "/");
setcookie("foto", "", time() - 3600, "/");
echo  "<script>window.location.replace('index.php');</script>";	
?>