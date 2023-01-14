<?php
$action = "insert";

if (isset($_GET['id'])) {
    include_once "../../Access_BD/Eleve.php";
    $res = find($_GET['id']);
    $V = mysqli_fetch_array($res);
    $action = "update";
    
} else
    $V = array("", "", "", "");
?>

<center>
    <form action="../../Traitement/Eleve.php?action=<?= $action ?>" method="post">
        <table>
            <tr>
                <td>Cne</td>
                <td><input type="text" name="cne" value="<?= $V[0] ?>"></td>
            </tr>
            <tr>
                <td>Nom</td>
                <td><input type="text" name="nom" value="<?= $V[1] ?>"></td>
            </tr>
            <tr>
                <td>Prénom</td>
                <td><input type="text" name="prenom" value="<?= $V[2] ?>"></td>
            </tr>
            <tr>
                <td>Groupe</td>
                <td><input type="text" name="group" value="<?= $V[3] ?>"></td>
            </tr>
            <tr>
                <td><input type="submit" value="Envoyer"></td>
                <td><input type="reset" value="Annuler"></td>
            </tr>
        </table>
        <input type="hidden" name="id" value="<?= $V[0] ?>">
    </form>
</center>