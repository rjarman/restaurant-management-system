<?php


if (isset($_POST['submit'])) {
    header("Location: suppliers.php");
}



?>

<?php include "php/header.php" ?>
<?php include "php/side_bar.php" ?>
<?php include "php/payment/payment_buyer.php" ?>
<?php include "php/footer.php" ?>