<?php
Global $confitmation;
include_once("Connexion.php");
$link=Connexion("tp_3");
function insert($data){
Global $link;
$req="insert into absence(semaine,cne,nbr_abs)
     values('{$data[0]}','{$data[1]}','{$data[2]}')"; 
	mysqli_query($link,$req);
}


function update($data){
Global $link;

$req="update absence set
    nbr_abs='{$data[2]}' 
    where semaine='{$data[0]}'
     and  cne ='$data[1]'";

	mysqli_query($link,$req);	
}

function delete($id,$semain){
Global $link;
$req="delete from absence where  cne ='$id' and semaine='$semain'";
mysqli_query($link,$req);	
}

function find($cin){
Global $link;
$req="select * from absence where   cne ='$cin'";
return mysqli_query($link,$req);	
	
}

function all()
{
Global $link;
$req="select * from absence";
return mysqli_query($link,$req);	
}

function getAbsenctBySemain($semaine)
{
Global $link;
$req="select * from absence where   semaine ='$semaine' ORDER BY nbr_abs";
return mysqli_query($link,$req);	
}
function getAbsenctBySemain1($semaine)
{
Global $link;
$req="SELECT e.cne,CONCAT(e.nom,e.prenom) as namecompltet,a.nbr_abs FROM `eleve` e join absence a on a.cne=e.cne where a.semaine=$semaine;  ";
return mysqli_query($link,$req);	
}
function getFrontTable($result)
{
	?>
	<table border="1">
    <tr>
        <th>Cne</th>
        <th>Nom Et Prenom</th>
        <th>NBR ABSENCE</th>
    </tr>
	<?php while($V=mysqli_fetch_array($result)) 
      {
?>
	<tr>
        <td> <?=$V[0] ?? ""?></td>
        <td> <?=$V[1] ?? ""?></td>
        <td> <?=$V[2] ?? ""?></td>
<?php } ?>
</table>
<?php
}
function getCneList()
{
Global $link;
$req="select cne from  eleve ";
return mysqli_query($link,$req);
}
function Confirmation($id, $semain)
{
?>
	<form action="../../Traitement/Absence.php" method="POST">
		êtes-vous sûr de vouloir <span style='color:red'> supprimer </span> l'absence  de la semain  <strong><?= $semain ?></strong>
        de l'eleve qui porte le code <?php echo  $id ?> <br>
		Oui <input type="radio" name="conf" value="oui">
		Non <input type="radio" name="conf" value="non" checked>
		<input type="submit" value="Ok">
		<input type="hidden" name="action" value="delete">
		<input type="hidden" name="id" value=<?php echo $id?>>
		<input type="hidden" name="semain" value=<?php echo $semain?>>
		
	</form>

<?php 
}
?>