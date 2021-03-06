<?php

$connectDatabas = new ConnectDatabase();
$misc = new MISC();

global $retrive_data;
global $par1;
global $par2;

if (isset($_GET['employee_name']) && isset($_GET['working_type'])) {
    $par1 = $_GET['employee_name'];
    $par2 = $_GET['working_type'];
    $retrive_data = $connectDatabas->get_salary_print_data($par1);
}



?>

<body onload="window.print();">
    <div class="wrapper" style="margin-top:80px">
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
                            <strong>{$data['employee_name_daily']}</strong><br>
                        Post: {$data['post_title_daily']}<br>
                        Working Type: {$data['working_type_daily']}";
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
                                <th style="text-align: center;">Name</th>
                                <th style="text-align: center;">Working Type</th>
                                <th style="text-align: center;">Working Time</th>
                                <th style="text-align: center;">Salary</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <?php foreach ($retrive_data as $data) {
                                    echo "<td>{$data['employee_name_daily']}</td>
                                    <td>{$data['working_type_daily']}</td>
                                    <td>{$misc->get_working_days($data['employee_name_daily'], $data['working_type_daily'])}</td>
                                    {$misc->get_salary($data['employee_name_daily'], $data['working_type_daily'])}
                                    ";
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
                    <p class="lead">Salary for the month according to work types</p>

                    <div class="table-responsive">
                        <table class="table" style="text-align: right;">
                            <tr>
                                <th style="text-align: right;">Total:</th>
                                <td><?php echo $misc->get_salary($data['employee_name_daily'], $data['working_type_daily']); ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->


        </section>

        <!-- Scripts -->

        

    </div>