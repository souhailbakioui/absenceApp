<?php
include_once "../../Access_BD/Eleve.php";
$res=all();

if(isset($_GET['action'])&&($_GET['action']=='absent')){
    $abcent=GetAbsenctByEleve($_GET['id']);
}

?>
<center>
    <h1>La liste des eleves</h1>
<table border="1" style="text-align: center;">
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
        <td><a href="form.php?action=update&id=<?=$V[0]?>">
        <img src="../../Icons/icons8-edit-48.png" style="height: 30px;">
    </a></td>
        <td><a href="../../Traitement/Eleve.php?action=delete&id=<?=$V[0]?>&nom=<?=$V[1]?>">
        <img src="../../Icons/icons8-remove-32.png"></a></td>
        <td><a href="?action=absent&id=<?=$V[0]?>&nom=<?=$V[1]?>">Absence</a></td>
    </tr>
<?php } ?>
</table>
<a href="../../index.php">
            <img src="../../Icons/icons8-home-page-100.png" style="height: 50px;">
            <h3>retour</h3>
        </a>
<?php
if(isset($_GET['action'])&&$_GET['action']=='absent'){
    frontAbsencent($abcent);
}
?>

</center>