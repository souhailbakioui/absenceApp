<?php
include_once "../Access_BD/Absence.php";
// echo !$_GET['action'] || (isset($_POST['conf'])&& !$_POST['conf']);
// var_dump(isset($_POST['conf']));die();
// var_dump(isset($_POST['conf'])&& !$_POST['conf']);
// var_dump(!isset($_GET['action'])&&isset($_POST['conf'])&& $_POST['conf']=="non",$_POST['conf']);
// die();

if((!isset($_GET['action'])&& !isset($_POST['action']))|| (isset($_POST['conf'])&& $_POST['conf']=="non")){
	$id=$_GET['id'];
	header('Location:../IHM/Absence/absence.php?semaine='.$_GET['semaine']."&id=$id");
}



else{

if(isset($_GET['action']) || isset($_POST['action'])){


	switch($_GET['action'])
	{
		case 'insert': insert(array_values($_POST)); break;
		case 'update': update(array_values($_POST)); break;
	}
	if(isset($_POST['action']))delete($_POST['id'],$_POST['semain']);
}
header('Location:../IHM/Absence/absence.php');
}

?>