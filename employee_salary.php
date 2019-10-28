<?php

if (isset($_GET['deleted_item'])) {
    header("Location: employee_salary.php");
}

?>

<?php include "php/header.php" ?>
<?php include "php/side_bar.php" ?>
<?php include "php/employee_salary/employee_salary.php" ?>
<?php include "php/footer.php" ?>