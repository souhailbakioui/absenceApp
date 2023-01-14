<?php
$action = "insert";

include_once "../../Access_BD/Absence.php";
if (isset($_GET['id'])) {
    
    $res = find($_GET['id']);
    $V = mysqli_fetch_array($res);
    $action = "update";
} else
    $V = array("", "", "", "");
?>

<center>
    <form action="../../Traitement/Absence.php?action=<?= $action ?>" method="post">
        <table>

            <tr>
                <td>Semain</td>
                <td><input type="text" name="semain" value="<?= $V[0] ?>"></td>
            </tr>
            <tr>
                <td>Cne</td>
                <td>
                    <select name="id">
                        <?php
                        $result = getCneList();

                        while ($value=mysqli_fetch_assoc($result) ) {
                            
                            echo "<option value=".$value['cne'].">".$value['cne']."</option>";
                        }

                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>NBR ABCENSE</td>
                <td><input type="text" name="NBR_ABCENSE" value="<?= $V[2] ?>"></td>
            </tr>
            <tr>
                <td><input type="submit" value="Envoyer"></td>
                <td><input type="reset" value="Annuler"></td>
            </tr>
        </table>
    </form>
</center>