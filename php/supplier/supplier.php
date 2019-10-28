<?php 

global $retrive_data;

$connectDatabas = new ConnectDatabase();
$misc = new MISC();

$retrive_data = $connectDatabas->get_buyer_details();

if (isset($_POST['submit'])) {


    $associative_array = array(
        "date" => date('d-M-Y, h:i:s a'),
        "buyer_name" => $_POST['buyer_name'],
        "address" => $_POST['address'],
        "goods" => $_POST['goods'],
        "measure" => intval($_POST['measure']),
        "fees" => $_POST['fees'],
    );

    $connectDatabas->add_buyer_details($associative_array);
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
                    Suppliers Details

                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> RMS</a></li>
                    <li class="active">Suppliers Details</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box box-solid">
                            <div class="box-header">
                                <h3 class="box-title">Suppliers Sheet</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="example1" class="table table-bordered table-striped" style="text-align: center;">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">Date</th>
                                            <th style="text-align: center;">Buyer Name</th>
                                            <th style="text-align: center;">Address</th>
                                            <th style="text-align: center;">Goods</th>
                                            <th style="text-align: center;">Measure</th>
                                            <th style="text-align: center;">Fees(&#36;)</th>
                                            <th style="text-align: center;">Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        
                                        error_reporting(E_ERROR | E_PARSE);
                                        foreach ($retrive_data as $data) {

                                            echo "
                                                <tr>
                                                    <td>{$data['date']}</td>
                                                    <td>{$data['buyer_name']}</td>
                                                    <td>{$data['address']}</td>
                                                    <td>{$data['goods']}</td>
                                                    <td>{$data['measure']}</td>
                                                    <td>{$data['fees']}</td>
                                                    <td>
                                                        <div class=\"btn-group\" style=\"margin-left:30px\">
                                                            <a class=\"btn btn-danger\" href=\"suppliers.php?dlt_buyer_id={$data['id']}\"><i class=\"fa fa-trash\"></i></a>

                                                            <a href=\"payment_buyer.php?buyer_id={$data['id']}\">{$misc->get_paid_status_supplier($data['id'])}</a>
                                                        </div>
                                                    </td>
                                                </tr>";
                                        }



                                        ?>

                                        <?php 
                                        $connectDatabas = new ConnectDatabase();
                                        if (isset($_GET['dlt_buyer_id'])) {
                                            $deleted_item = $_GET['dlt_buyer_id'];
                                            $connectDatabas->delete_something("buyer_details", "id", $deleted_item);
                                            $connectDatabas->rearrange_table("buyer_details", "id");
                                            // header("Location: employee_salary.php");
                                        }


                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>

                </div>

                <!--Modals-->
                <div class="modal modal-info fade" id="modal-info">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Add Buyer Details</h4>
                            </div>
                            <div class="modal-body">
                                <form action="" method="POST">

                                <!-- select -->
                                <div class="form-group">
                                    <label>Buyer Name</label>
                                    <input name="buyer_name" type='text' class="form-control" placeholder="Name"/>
                                </div>

                                <div class="form-group">
                                    <label>Address</label>
                                    <input name="address" type='text' class="form-control" placeholder="Address" />
                                </div>

                                <div class="form-group form-inline">
                                    <label>Goods</label><br>
                                    <input name="goods" type='text' class="form-control" placeholder="Apple, Orange" />
                                </div>


                                <div class="form-group">
                                    <label>Measure</label>
                                    <input name="measure" type='text' class="form-control" placeholder="2kg, 1L"  />
                                
                                </div>
                                <div class="form-group">
                                    <label>Fees</label>
                                    <input name="fees" type='number' class="form-control" placeholder="Total Paid" />
                                            
                                </div>


                            </div>


                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                                <input type="submit" name="submit" class="btn btn-outline">
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!--./Modals-->
                
                <!-- /.modal -->

            </section>

            <button class="btn" type="button" data-toggle="modal" data-target="#modal-info" style="position: fixed;width: 60px; height: 60px;bottom: 60px;right: 40px;background-color: #0C9;
            color: #FFF;border-radius: 50px;text-align: center;box-shadow: 2px 2px 3px #999;border: 0px;">
                <i class="fa fa-edit"></i>
            </button>

            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->