<?php
/**
 * Created by PhpStorm.
 * User: maxbr
 * Date: 22-3-2019
 * Time: 10:59
 */

include 'includes/header.php';
$kosten = 0.00;
?>

<link rel="stylesheet" href="css\index.css">
<div id="informatie">
    <table>
        <tr>
            <td>
                Voornaam
            </td>
            <td>
                <?php echo $_GET["voornaam"]; ?>
            </td>
        </tr>
        <tr>
            <td>
                Achternaam
            </td>
            <td>
                <?php echo $_GET["achternaam"]; ?>
            </td>
        </tr>
        <tr>
            <td>
                Email
            </td>
            <td>
                <?php echo $_GET["email"]; ?>
            </td>
        </tr>
        <tr>
            <td>
                geboortedatum
            </td>
            <td>
                <?php echo $_GET["geboortedatum"]; ?>
            </td>
        </tr>
        <tr>
            <td>
                Ga je zaterdag mee?
            </td>
            <td>
                <?php
                if(isset($_GET["zaterdag"])){
                    echo "ja";
                    $kosten = $kosten + 25;
                }else{
                    echo "nee";
                }
                ?>
            </td>
        </tr>
        <tr>
            <td>
                Ga je zondag mee?
            </td>
            <td>
                <?php
                if(isset($_GET["zondag"])){
                    echo "ja";
                    $kosten = $kosten + 25;
                }else{
                    echo "nee";
                }
                ?>
            </td>
        </tr>
        <tr>
            <td>
                Ga je maandag mee?
            </td>
            <td>
                <?php
                if(isset($_GET["maandag"])){
                    echo "ja";
                    $kosten = $kosten + 25;
                }else{
                    echo "nee";
                }
                ?>
            </td>
        </tr>
        <tr>
            <td>
                Ga je dinsdag mee?
            </td>
            <td>
                <?php
                if(isset($_GET["dinsdag"])){
                    echo "ja";
                    $kosten = $kosten + 25;
                }else{
                    echo "nee";
                }
                ?>
            </td>
        </tr>
        <tr>

    </table>
    dat gaat dan $
    <?php echo $kosten; ?>
</div>
<?php
include 'includes/footer.php';
?>
