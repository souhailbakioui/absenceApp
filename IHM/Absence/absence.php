<?php
include_once "../../Access_BD/Absence.php";
$res = all();
if ((isset($_GET['submitSemain']) && $_GET['action'] == 'shearch')) {
    $abcent = getAbsenctBySemain($_GET['nbrSmaine']);
}


?>
<center>
    <h1>La liste des Absence</h1>
    <table border="1" style="text-align: center;">
        <tr>
            <th>Cne</th>
            <th>Semaine</th>
            <th>NBR ABSENCE</th>
            <th colspan="3"><a href="form.php">>> Insert</a></th>
        </tr>
        <?php while ($V = mysqli_fetch_array($res)) {
        ?>
            <tr>
                <td> <?= $V[1] ?? "" ?></td>
                <td> <?= $V[0] ?? "" ?></td>
                <td> <?= $V[2] ?? "" ?></td>
                <td><a href="form.php?action=update&id=<?= $V[1] ?>">
                <img src="../../Icons/icons8-edit-48.png" style="height: 30px;">
            </a></td>
                <td>
                    <a href="../../Traitement/Absence.php?id=<?= $V[1] ?>&semaine=<?= $V[0] ?>">
                        <img src="../../Icons/icons8-remove-32.png">
                    </a>
                </td>
            </tr>
        <?php } ?>
    </table>
        <a href="../../">
            <img src="../../Icons/icons8-home-page-100.png" style="height: 50px;">
            <h3>retour</h3>
        </a>
    <form action="?action=shearch">
        <table>
            <tr>
                <th>semaine</th>
                <th><input type="text" name="nbrSmaine"></th>
                <th> <input type="submit" name="submitSemain" value="Valider"></th>
                <th> <input type="reset" name="submitSemain" value="Annuler"></th>
                <input type="hidden" name="action" value="shearch">
            </tr>
        </table>
    </form>

    <?php
    if(isset($_GET['semaine'])){

        Confirmation($_GET['id'],$_GET['semaine']);
    }
    if (isset($_GET['submitSemain']) && $_GET['action'] == 'shearch') {
        getFrontTable($abcent);
    }
    ?>

</center>