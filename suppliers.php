<?php


if (isset($_POST['submit']) || isset($_GET['dlt_buyer_id'])) {
    header("Location: suppliers.php");
}



?>


<?php include "php/header.php" ?>
<?php include "php/side_bar.php" ?>
<?php include "php/supplier/supplier.php" ?>
<?php include "php/footer.php" ?>