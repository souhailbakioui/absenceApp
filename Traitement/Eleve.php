<?php
include_once "../Access_BD/Eleve.php";


if((!isset($_GET['action'])&& !isset($_POST['action']))|| (isset($_POST['conf'])&& $_POST['conf']=="non")){
	$id=$_GET['id'];
	header('Location:../IHM/Absence/eleve.php?nom='.$_GET['nom']."&id=$id");
}
else{
	switch($_GET['action'])
	{
		case 'insert': insert(array_values($_POST)); break;
		case 'update': update(array_values($_POST)); break;
	
	}if(isset($_POST['action']))delete($_POST['id'],$_POST['semain']);
}
header('Location:../IHM/Eleve/eleve.php');
?>