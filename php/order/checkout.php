<?php

$connectDatabase = new ConnectDatabase();
$dolar = array(
    "set_menu_1" => 25,
    "set_menu_2" => 45,
    "set_menu_3" => 55,
    "set_menu_4" => 75,
    "chicken_burger" => 25,
    "beef_burger" => 45,
    "club_sandwitch" => 25,
    "sub_sandwitch" => 35,
    "cocacola" => 5,
    "sprite" => 6,
    "pepsi" => 4,
    "fanta" => 5
);

if (isset($_POST['submit'])) {

    $associative_array = array(
        'set_menu_1' => intval($_POST['set_menu_1']),
        'set_menu_2' => intval($_POST['set_menu_2']),
        'set_menu_3' => intval($_POST['set_menu_3']),
        'set_menu_4' => intval($_POST['set_menu_4']),
        'chicken_burger' => intval($_POST['chicken_burger']),
        'beef_burger' => intval($_POST['beef_burger']),
        'club_sandwitch' => intval($_POST['club_sandwitch']),
        'sub_sandwitch' => intval($_POST['sub_sandwitch']),
        'cocacola' => intval($_POST['cocacola']),
        'sprite' => intval($_POST['sprite']),
        'pepsi' => intval($_POST['pepsi']),
        'fanta' => intval($_POST['fanta']),
        'total_sell' =>
            intval($_POST['set_menu_1'])*$dolar['set_menu_1']+
            intval($_POST['set_menu_2'])*$dolar['set_menu_2']+
            intval($_POST['set_menu_3'])*$dolar['set_menu_3']+
            intval($_POST['set_menu_4'])*$dolar['set_menu_4']+
            intval($_POST['chicken_burger'])*$dolar['chicken_burger']+
            intval($_POST['beef_burger'])*$dolar['beef_burger']+
            intval($_POST['club_sandwitch'])*$dolar['club_sandwitch']+
            intval($_POST['sub_sandwitch'])*$dolar['sub_sandwitch']+
            intval($_POST['cocacola'])*$dolar['cocacola']+
            intval($_POST['sprite'])*$dolar['sprite']+
            intval($_POST['pepsi'])*$dolar['pepsi']+
            intval($_POST['fanta'])*$dolar['fanta'],



    );
    $connectDatabase->add_food($associative_array);
    // exit();
    // echo("<script>location.href = 'salary_print.php';</script>");
}

?>
<div class="modal modal-success fade" id="checkout">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h2 class="modal-title pull-left">Checkout</h2>
                            <h2 class="TA modal-title pull-right"> Total: $0</h2>

                        </div>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="modal-body">
                            
                                <div class="form-group">
                                    <label for="qty">Set Menu 1: Fried Rice + Fried Chicken + Drinks<br>Quantity: </label>
                                    <input name="set_menu_1" type="text" class="CC form-control" id="qty" placeholder="Enter Quantity" readonly></div>

                                <div class="form-group"><label for="qty">Set Menu 2: Fried Rice + Grilled Chicken + Drinks<br>Quantity:
                                    </label>
                                    <input name="set_menu_2" type="text" class="CC form-control" id="qty" placeholder="Enter Quantity" readonly>
                                </div>

                                <div class="form-group"><label for="qty">Set Menu 3: Mixed Rice + Grilled Beef + Drinks<br>Quantity:
                                    </label>
                                    <input name="set_menu_3" type="text" class="CC form-control" id="qty" placeholder="Enter Quantity" readonly>
                                </div>

                                <div class="form-group"><label for="qty">Set Menu 4: Mixed Rice + Grilled Mutton + Drinks<br>Quantity:
                                    </label>
                                    <input name="set_menu_4" type="text" class="CC form-control" id="qty" placeholder="Enter Quantity" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="qty">Chicken Burger<br>Quantity: </label>
                                    <input name="chicken_burger" type="text" class="CC form-control" id="qty" placeholder="Enter Quantity" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="qty">Beef Burger<br>Quantity: </label>
                                    <input name="beef_burger" type="text" class="CC form-control" id="qty" placeholder="Enter Quantity" readonly></div>

                                <div class="form-group">
                                    <label for="qty">Club Sandwitch<br>Quantity: </label>
                                    <input name="club_sandwitch" type="text" class="CC form-control" id="qty" placeholder="Enter Quantity" readonly></div>

                                <div class="form-group">
                                    <label for="qty">Sub Sandwitch<br>Quantity: </label>
                                    <input name="sub_sandwitch" type="text" class="CC form-control" id="qty" placeholder="Enter Quantity" readonly></div>

                                <div class="form-group">
                                    <label for="qty">Coca Cola<br>Quantity: </label>
                                    <input name="cocacola" type="text" class="CC form-control" id="qty" placeholder="Enter Quantity" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="qty">Sprite<br>Quantity: </label>
                                    <input name="sprite" type="text" class="CC form-control" id="qty" placeholder="Enter Quantity" readonly></div>

                                <div class="form-group">
                                    <label for="qty">Pepsi<br>Quantity: </label>
                                    <input name="pepsi" type="text" class="CC form-control" id="qty" placeholder="Enter Quantity" readonly></div>

                                <div class="form-group">
                                    <label for="qty">Fanta<br>Quantity: </label>
                                    <input name="fanta" type="text" class="CC form-control" id="qty" placeholder="Enter Quantity" readonly></div>

                                <div class="modal-header">
                                    <h2 class="TA modal-title" style="text-align:center">Total: $0</h2>
                                    <div class="input-group margin">
                                        <input type="text" class="GA form-control" placeholder="Enter Cash Amount Recieved">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-info btn-flat" onclick="amount_given_back()">Recieved</button>
                                        </span>
                                    </div>
                                    <h2 class="AGB modal-title" style="text-align:center">Amount Given Back: $0</h2>
                                </div>

                            </div>
                            <div class="form-group modal-footer">
                                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                                <!-- <input name="submit" type="submit" href="salary_print.php" class="btn btn-outline"> -->
                                <!-- <div class="form-group"> -->
                                    <input name="submit" type="submit" class="btn btn-outline" value="Checkout">
                                <!-- </div> -->
                            </div>
                        </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->





        </div>
        <!-- /.content-wrapper -->