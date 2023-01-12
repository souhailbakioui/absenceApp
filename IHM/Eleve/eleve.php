<?php
include_once "../../Access_BD/Eleve.php";
$res=all();

if(isset($_GET['action'])&&($_GET['action']=='absent')){
    $abcent=GetAbsenctByEleve($_GET['id']);
}

?>
<center>
    <h1>La liste des eleves</h1>
<table border="1">
    <tr>
        <th>Cne</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Groupe</th>
        <th colspan="3"><a href="form.php">>> Insert</a></th>
    </tr>
<?php while($V=mysqli_fetch_array($res)) 
      {
?>
    <tr>
        <td> <?=$V[0]?></td>
        <td> <?=$V[1]?></td>
        <td> <?=$V[2]?></td>
        <td> <?=$V[3]?></td>
        <td><a href="form.php?action=update&id=<?=$V[0]?>">Edit</a></td>
        <td><a href="../../Traitement/Eleve.php?action=delete&id=<?=$V[0]?>&nom=<?=$V[1]?>">Delete</a></td>
        <td><a href="?action=absent&id=<?=$V[0]?>&nom=<?=$V[1]?>">Absence</a></td>
    </tr>
<?php } ?>
</table>

<?php
if(isset($_GET['action'])&&$_GET['action']=='absent'){
    frontAbsencent($abcent);
}
?>

</center>