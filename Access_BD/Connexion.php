<?php

function Connexion($dbname,$server="localhost",$user="root",$password="")
{
return mysqli_connect($server,$user,$password,$dbname);		
}
$path = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";
$path .=$_SERVER["SERVER_NAME"]. dirname($_SERVER["PHP_SELF"]);

?>