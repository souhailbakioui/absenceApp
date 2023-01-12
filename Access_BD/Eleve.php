<?php
include_once("Connexion.php");
$link = Connexion("tp_3");
function insert($data)
{
	global $link;
	$req = "insert into eleve(cne,nom,prenom,groupe)
     values('{$data[0]}','{$data[1]}','{$data[2]}','{$data[3]}')";
	mysqli_query($link, $req);
}


function update($data)
{
	global $link;
	$req = "update eleve set nom='{$data[0]}',prenom='{$data[1]}',
                        groupe='{$data[2]}' 
						   where cne='{$data[3]}'";
	mysqli_query($link, $req);
}

function delete($id)
{
	global $link;
	$req = "delete from eleve where cne='$id'";
	mysqli_query($link, $req);
}

function find($id)
{
	global $link;
	$req = "select * from eleve where cne='$id'";
	return mysqli_query($link, $req);
}

function all()
{
	global $link;
	$req = "select * from eleve";
	return mysqli_query($link, $req);
}

function GetAbsenctByEleve($cin)
{
	global $link;
	$req = "select * from absence where   cne ='$cin'";
	return mysqli_query($link, $req);
}
function frontAbsencent($res)
{

	$all_Data = [];
	
	while ($row = $res->fetch_assoc())
		array_push($all_Data, $row);

?>
	<form action="?action=absent">
		<table>
			<tr>
				<th>semaine</th>
				<th><input type="text" name="nbrSmaine"></th>
				<th> <input type="submit" name="submitSemain" value="Valider"></th>
				<th> <input type="reset" name="submitSemain" value="Annuler"></th>
				<input type="hidden" name="action" value="absent">
				<input type="hidden" name="id" value=<?php echo $_GET['id'] ?>>
			</tr>
		</table>
	</form>
	<?php
	if (isset($_GET['submitSemain'], $_GET['id'])) {
		$row=filtreData($all_Data,$_GET['id'],$_GET['nbrSmaine']);
		if(!is_null($row))
		echo "Dans la semaine " . $row['semaine'] . " l'eleve le CNE " . $_GET['id'] . "   <b style='color:red;'>a " .$row['nbr_abs']." absenct</b>";
	}
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
		foreach ($all_Data as $value) {
		?>
			<tr>
				<td> <?= $value["semaine"] ?></td>
				<td> <?= $value["nbr_abs"] ?></td>
			</tr>
		<?php
		}
		?>
	</table>
<?php
}

function filtreData($data, $id, $semain)
{
	foreach ($data as $value) {
		if($value["semaine"]==$semain&&$value["cne"]==$id)return $value;
	}return null;
}
function Confirmation($id, $nom)
{

?>
	<form action="../Traitement/Eleve.php?action=delete&id=<?= $id ?>" method="post">
		êtes-vous sûr de vouloir supprimer l'élève <strong><?= $nom ?></strong>
		Oui <input type="radio" name="conf" value="oui">
		Non <input type="radio" name="conf" value="non" checked>
		<input type="submit" value="Ok">
	</form>

<?php die("die from confirmation");
}
?>