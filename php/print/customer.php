<!--
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<?php 



global $retrive_data;

$connectDatabase = new ConnectDatabase();
$misc = new MISC();
$retrive_data = $connectDatabase->get_food();

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
                        <small class="pull-right">Date: <?php echo date('d-m-Y, h:i:s a'); ?></small>
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
                <div class="col-sm-4 invoice-col">
                    
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
                                <th style="text-align: center;">Food Name</th>
                                <th style="text-align: center;">Quantity</th>
                                <th style="text-align: center;">Amount($)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $misc->retrive_data($retrive_data) ?>
                            

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
                    <p class="lead">Purchase Amount</p>

                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th style="text-align: right;">Total:</th>
                                <td>
                                <?php 
                                foreach ($retrive_data as $data) {
                                    echo $data['total_sell'];
                                }
                                ?>
                                </td>
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