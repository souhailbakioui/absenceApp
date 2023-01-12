<?php
include_once "../Access_BD/Eleve.php";

// if(isset($_GET['nom']))
// Confirmation($_GET['id'],$_GET['nom']);

switch($_GET['action'])
{
	case 'insert': insert(array_values($_POST)); break;
	case 'update': update(array_values($_POST)); break;
	case 'delete': delete($_GET['id']); break;
}
header('Location:../IHM/Eleve/eleve.php');
?>