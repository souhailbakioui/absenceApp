<?php
include_once("Connexion.php");
$link=Connexion("tp_3");
function insert($data){
Global $link;
$req="insert into eleve(cne,nom,prenom,groupe)
     values('{$data[0]}','{$data[1]}','{$data[2]}','{$data[3]}')"; 
	mysqli_query($link,$req);
	//var_dump('im here');
}


function update($data){
Global $link;
$req="update eleve set nom='{$data[0]}',prenom='{$data[1]}',
                        groupe='{$data[2]}' 
						   where cne='{$data[3]}'";
	mysqli_query($link,$req);	
}

function delete($id){
Global $link;
$req="delete from eleve where cne='$id'";
mysqli_query($link,$req);	
}

function find($id){
Global $link;
$req="select * from eleve where cne='$id'";
return mysqli_query($link,$req);	
	
}

function all()
{
Global $link;
$req="select * from eleve";
return mysqli_query($link,$req);	
}

function GetAbsenctByEleve($cin){
	Global $link;
	$req="select * from absence where   cne ='$cin'";
	return mysqli_query($link,$req);		
	}
function frontAbsencent($res)
{
	?>	
	<form method="" action="">
	<table>
		<tr>
			<th>semaine</th>
			<th><input type="text" name="nbrSmaine"></th>
			<th> <input type="submit" name="submitSemain" value="Valider"></th>
			<th> <input type="reset" name="submitSemain" value="Annuler"></th>
		</tr>
	</table>
	</form>
	<?php
	if(isset($_GET['submitSemain'],$_GET['id']))
		echo "Dans la semaine ".$_GET['submitSemain']." l'eleve le CNE ".$_GET['id'] ."<b color='red'>a 1 absenct</b>";
	?>
	<table border="1">
		<tr>
			<th>
				Semain
			</th>
			<th>
				Nbr abcences
			</th>
		</tr>
	<?php		
 while($V=mysqli_fetch_array($res)) 
      {
?>
	

	
    <tr>
        <td> <?=$V[0]?></td>
        <td> <?=$V[1]?></td>
    </tr>
<?php 
}
?>	
	</table>
	<?php 
}
function Confirmation($id,$nom)
{
   
?>
<form action="../Traitement/Eleve.php?action=delete&id=<?=$id?>" method="post">
êtes-vous sûr de vouloir supprimer l'élève <strong><?=$nom?></strong>
Oui <input type="radio" name="conf" value="oui">
Non <input type="radio" name="conf" value="non" checked>
<input type="submit" value="Ok">
</form>

<?php die("die from confirmation");
}
?>