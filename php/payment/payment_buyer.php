
<?php

$connectDatabas = new ConnectDatabase();

global $retrive_data;


if (isset($_GET['buyer_id'])) {
    $id = $_GET['buyer_id'];
    $retrive_data = $connectDatabas->get_supp_details_by_id($id);
}

if (isset($_POST['submit'])) {
    $temp = array();
    foreach ($retrive_data as $data) {
        $temp[0] = $data['buyer_name'];
        $temp[1] = $data['fees'];
    }

    $associative_array = array(
        "buyer_name" => $temp[0],
        "fees" => $temp[1],
        "paid_status" => 1,
    );

    $connectDatabas->add_paid_buyer($associative_array);
    // javascript: history.go(-1);
    // echo "<script>history.go(-1);</script>";
    // header("Location: employee_salary.php");
    // echo "<h1>" . $associative_array['employee_name'] . "</h1>";
}

?>






<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Suppliers Payment Print

                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> RMS</a></li>
                    <li class="active">Salary Print</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="invoice">
                <!-- title row -->
                <div class="row">
                    <div class="col-xs-12">
                        <h2 class="page-header">
                            <i class="fa fa-globe"></i> R.M.S. Inc.
                            <small class="pull-right">Date: <?php echo date('d-M-Y, h:i:s a'); ?></small>
                        </h2>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- info row -->
                <div class="row invoice-info">
                    <div class="col-sm-4 invoice-col">
                        From
                        <address>
                            <strong>Admin, RMS.</strong><br>
                            795 Folsom Ave, Suite 600<br>
                            San Francisco, CA 94107<br>
                            Phone: (804) 123-5432<br>
                            Email: mail@mail.com
                        </address>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col" style="text-align: left;">
                        To
                        <address>
                            <?php

                            foreach ($retrive_data as $data) {
                                echo "
                                <strong>{$data['buyer_name']}</strong><br>
                            Address: {$data['address']}<br>
                            Date of Supply: {$data['date']}";
                            }

                            ?>
                        </address>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col" style="text-align: right;">
                    <b>Invoice <?php 
                                foreach ($retrive_data as $data) {
                                    printf("#%06d", $data["id"]);
                                }
                                ?></b><br>
                </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- Table row -->
                <div class="row">
                    <div class="col-xs-12 table-responsive">
                        <table class="table table-striped" style="text-align: center;">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">No</th>
                                    <th style="text-align: center;">Buyer Name</th>
                                    <th style="text-align: center;">Goods</th>
                                    <th style="text-align: center;">Measure</th>
                                    <th style="text-align: center;">Fees</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <?php foreach ($retrive_data as $data) {
                                        echo "<td>{$data['buyer_name']}</td>
                                        <td>{$data['goods']}</td>
                                        <td>{$data['measure']}</td>
                                        <td>{$data['fees']}</td>";
                                    } ?>
                                    
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <div class="row">
                    <!-- accepted payments column -->
                    <div class="col-xs-6">
                        <p class="lead">Payment Methods:</p>
                        <img src="dist/img/credit/visa.png" alt="Visa">
                        <img src="dist/img/credit/mastercard.png" alt="Mastercard">
                        <img src="dist/img/credit/american-express.png" alt="American Express">
                        <img src="dist/img/credit/paypal2.png" alt="Paypal">

                        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                            &#9679; Terms and Conditions applied. RMS holds the rights to change anything.
                        </p>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-6" style="text-align: right;">
                        <p class="lead">Total Fees of the company</p>

                        <div class="table-responsive">
                            <table class="table" style="text-align: right;">
                                <tr>
                                    <th style="text-align: right;">Total:</th>
                                    <td><?php 
                                        $fee = array();
                                        foreach ($retrive_data as $data) {
                                            $fee[] = $data['fees'];
                                        }
                                        echo $fee[0];
                                        ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- this row will not appear when printing -->
                <div class="row no-print">
                    <form action="" method="POST">
                    <div class="col-xs-12 form-group">
                        <a href="payment_print.php?buyer_id=<?php 

                                                    $id = array();
                                                    foreach ($retrive_data as $data) {
                                                        $id[] = $data['id'];
                                                    }
                                                    echo $id[0];

                                                    ?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
                        <button type="submit" name="submit" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
                        </button>
                    </div>
                                </form>
                </div>
            </section>
            <!-- /.content -->
            <div class="clearfix"></div>
        </div>
        <!-- /.content-wrapper -->