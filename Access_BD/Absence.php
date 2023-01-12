<?php
include_once("Connexion.php");
$link=Connexion("tp3");
function insert($data){
Global $link;
$req="insert into absence(semaine,cne,nbr_abs)
     values('{$data[0]}','{$data[1]}','{$data[2]}')"; 
	mysqli_query($link,$req);
}


function update($data){
Global $link;
$req="update absence set cne='{$data[1]}',
                        nbr_abs='{$data[2]}' 
						where semaine='{$data[0]}' and  cin ='$data[3]'";
	mysqli_query($link,$req);	
}

function delete($id,$cin){
Global $link;
$req="delete from absence where semaine='$id' and  cin ='$cin'";
mysqli_query($link,$req);	
}

function find($cin){
Global $link;
$req="select * from absence where   cin ='$cin'";
return mysqli_query($link,$req);	
	
}

function all()
{
Global $link;
$req="select * from absence";
return mysqli_query($link,$req);	
}
?>