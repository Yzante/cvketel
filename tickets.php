<?php
/**
 * Created by PhpStorm.
 * User: maxbr
 * Date: 22-3-2019
 * Time: 10:59
 */

include 'includes/header.php';
?>
<link rel="stylesheet" href="css\index.css">
    <script src="script/jQuery.js"></script>
    <script src="script/script.js" defer></script>
<?php
?>

<div id="informatie">
    <?php
    include 'includes/ticketInput.php';
    include 'includes/ticketOutput.php';
    ?>
</div>

<?php
include 'includes/footer.php';
?>