<?php
$url_this = sprintf("%s://%s:%d%s",isset($_SERVER["HTTPS"])?"https":"http",$_SERVER["HTTP_HOST"],$_SERVER["SERVER_PORT"],str_replace("\\", "/",dirname( $_SERVER["PHP_SELF"])));
header("Location: ".$url_this."src/index.php");
exit();
?>
