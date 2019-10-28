<?php 

global $retrive_data_name;
global $retrive_data_post;
global $retrive_data_type;

global $retrive_group_by_name;

$connectDatabas = new ConnectDatabase();
$misc = new MISC();

$retrive_data_name = $connectDatabas->get_name();
$retrive_data_post = $connectDatabas->get_post();
$retrive_data_type = $connectDatabas->get_type();

$retrive_group_by_name = $connectDatabas->get_group_by_name();

if (isset($_POST['submit_1'])) {
    $associative_array = array(
        "employee_name" => $_POST['employee_name'],
        "post_title" => $_POST['post_title'],
        "working_type" => $_POST['working_type'],
    );

    $connectDatabas->add_employee($associative_array);
    // javascript: history.go(-1);
    echo "<script>history.go(-1);</script>";
    // header("Location: employee_salary.php");
    // echo "<h1>" . $associative_array['employee_name'] . "</h1>";
}

if (isset($_POST['submit_2'])) {
    $associative_array_2 = array(
        "employee_name_daily" => $_POST['employee_name_daily'],
        "post_title_daily" => $_POST['post_title_daily'],
        "working_type_daily" => $_POST['working_type_daily'],
        "salary" => intval($_POST['salary']),
        "time_from" => $_POST['time_from'],
        "time_to" => $_POST['time_to'],
        "total_day" => 1,
    );

    $connectDatabas->add_employee_details($associative_array_2);
    // javascript: history.go(-1);
    echo "<script>history.go(-1);</script>";
    // header("Location: employee_salary.php");
    // echo "<h1>" . $associative_array['employee_name'] . "</h1>";
}




?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Employee Salary

                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> RMS</a></li>
                    <li class="active">Employee Salary</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box box-solid">
                            <div class="box-header">
                                <h3 class="box-title">Salary Sheet</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="example1" class="table table-bordered table-striped" style="text-align: center;">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">Name</th>
                                            <th style="text-align: center;">Post</th>
                                            <th style="text-align: center;">Working Type</th>
                                            <th style="text-align: center;">Working Hours (Daily)</th>
                                            <th style="text-align: center;">Working Days (Weekly)</th>
                                            <th style="text-align: center;">Working Days (Monthly)</th>
                                            <th style="text-align: center;">Salary (&#36;)</th>
                                            <th style="text-align: center;">Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        
                                        error_reporting(E_ERROR | E_PARSE);
                                        foreach ($retrive_group_by_name as $data) {

                                            echo "
                                                <tr>
                                                    <td>{$data['employee_name']}</td>
                                                    <td>{$data['post_title']}</td>
                                                    <td>{$data['working_type']}</td>
                                                    <td>{$misc->get_working_daily($data['employee_name'])}</td>
                                                    <td>{$misc->get_working_days($data['employee_name'], $data['working_type'])}</td>
                                                    <td>{$misc->get_working_days($data['employee_name'], $data['working_type'])}</td>
                                                    {$misc->get_salary($data['employee_name'], $data['working_type'])}
                                                    <td>
                                                        <div class=\"btn-group\" style=\"margin-left:30px\">
                                                            <a class=\"btn btn-danger\" href=\"employee_salary.php?deleted_item={$data['employee_name']}\"><i class=\"fa fa-trash\"></i></a>

                                                            <a href=\"payment.php?employee_name={$data['employee_name']}&working_type={$data['working_type']}\"><button type=\"button\" data-toggle=\"modal\" class=\"btn bg-yellow\"><i class=\"fa fa-print\"></i></button></a>
                                                        </div>
                                                    </td>
                                                </tr>";
                                        }



                                        ?>

                                        <?php 
                                        $connectDatabas = new ConnectDatabase();
                                        if (isset($_GET['deleted_item'])) {
                                            $deleted_item = $_GET['deleted_item'];
                                            $connectDatabas->delete_something("employee_details", "employee_name_daily", $deleted_item);
                                            $connectDatabas->rearrange_table("employee_details", "id");
                                            echo "<p style=\"font-size: 100px;text-align: center;\">" . strval($_GET['deleted_item']) . "</p>";
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
                    <div class="modal modal-info fade" id="modal-add_employee">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title">Add Employee</h4>
                                                </div>
                                                <form action="" method="POST" enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                
                                                        <div class="form-group">
                                                            <label for="name">Name</label>
                                                            <input name="employee_name" type="text" class="form-control" id="name" placeholder="Enter Name">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="post">Post</label>
                                                            <input name="post_title" type="text" class="form-control" id="post" placeholder="Enter Post">
                                                        </div>

                                                        <!-- select -->
                                                        <div class="form-group">
                                                            <label>Working Type</label>
                                                            <select name="working_type" class="form-control">
                                                                <option>Daily</option>
                                                                <option>Weekly</option>
                                                                <option>Monthly</option>

                                                            </select>
                                                        </div>
                                                        
                                                    </div>


                                                    <div class="form-group modal-footer">
                                                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                                                        <input type="submit" name="submit_1" class="btn btn-outline">
                                                    </div>
                                                </form>
                                            </div>
                        <!-- /.modal-content -->
                                        </div>
                    <!-- /.modal-dialog -->
                                    </div>



                <!--Modals-->
                <div class="modal modal-info fade" id="modal-info">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Edit Employee Details</h4>
                            </div>
                            <div class="modal-body">
                                <form action="" method="POST">

                                <!-- select -->
                                <div class="form-group">
                                    <label>Name</label>
                                    <select name="employee_name_daily" class="form-control">
                                        <?php 

                                        foreach ($retrive_data_name as $data) {
                                            echo "
                                            <option>{$data['employee_name']}</option>";
                                        }

                                        ?>

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Post</label>
                                    <select name="post_title_daily" class="form-control">
                                        <?php 

                                        foreach ($retrive_data_post as $data) {
                                            echo "
                                            <option>{$data['post_title']}</option>";
                                        }

                                        ?>

                                    </select>
                                </div>

                                <div class="form-group form-inline">
                                    <label>Working Type and Salary</label><br>
                                    <select name="working_type_daily" class="form-control">
                                        <?php 

                                        foreach ($retrive_data_type as $data) {
                                            echo "<option>{$data["working_type"]}</option>";
                                        }

                                        ?>

                                    </select>
                                    <input name="salary" type='text' class="form-control" placeholder="Salary" />
                                </div>


                                <div class="form-group">
                                    <label>From</label>
                                    <input name="time_from" type='datetime-local' class="form-control" />
                                
                                </div>
                                <div class="form-group">
                                    <label>To</label>
                                    <input name="time_to" type='datetime-local' class="form-control" />
                                            
                                </div>


                            </div>


                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                                <input type="submit" name="submit_2" class="btn btn-outline">
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!--./Modals-->
                
                <!-- /.modal -->

            </section>

            <button class="btn" type="button" data-toggle="modal" data-target="#modal-add_employee" style="position: fixed;width: 60px; height: 60px;bottom: 130px;right: 40px;background-color: #428bca;
            color: #FFF;border-radius: 50px;text-align: center;box-shadow: 2px 2px 3px #999;border: 0px;">
                <i class="fa fa-edit"></i>
            </button>

            <button class="btn" type="button" data-toggle="modal" data-target="#modal-info" style="position: fixed;width: 60px; height: 60px;bottom: 60px;right: 40px;background-color: #0C9;
            color: #FFF;border-radius: 50px;text-align: center;box-shadow: 2px 2px 3px #999;border: 0px;">
                <i class="fa fa-edit"></i>
            </button>

            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->