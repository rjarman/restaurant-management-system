<?php 

if (isset($_POST['submit'])) {
    header('Location: customer.php');
}


?>

<?php include "php/header.php" ?>
<?php include "php/side_bar.php" ?>
<?php include "php/order/order.php" ?>
<?php include "php/order/checkout.php" ?>
<?php include "php/footer.php" ?>