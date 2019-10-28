<?php

// include "connect_db.php";



class MISC
{
    private $connectDatabas;
    private $data;
    private $price;
    private $items;

    public function __construct()
    {
        $this->connectDatabas = new ConnectDatabase();
        $this->data = array();
        $this->price = array(25, 45, 55, 75, 25, 45, 25, 35, 5, 6, 4, 5);
        $this->items = array(
            "Fried Rice + Fried Chicken + Drinks",
            "Fried Rice + Grilled Chicken + Drinks",
            "Mixed Rice + Grilled Beef + Drinks",
            "Mixed Rice + Grilled Mutton + Drinks",
            "Chicken Burger",
            "Beef Burger",
            "Club Sandwitch",
            "Sub Sandwitch",
            "Cocacola",
            "Sprite",
            "Pepsi",
            "Fanta"
        );
    }

    //functions 
    public function retrive_data($retrive_data)
    {
        foreach ($retrive_data as $a) {
            $this->data = array(
                $a['set_menu_1'],
                $a['set_menu_2'],
                $a['set_menu_3'],
                $a['set_menu_4'],
                $a['chicken_burger'],
                $a['beef_burger'],
                $a['club_sandwitch'],
                $a['sub_sandwitch'],
                $a['cocacola'],
                $a['sprite'],
                $a['pepsi'],
                $a['fanta']
            );
        }
        $this->print_the_customer_memo();
    }

    private function print_the_customer_memo()
    {
        $count = 1;
        for ($i = 0; $i < sizeof($this->data); $i++) {
            if ($this->data[$i] > 0) {
                $result = $this->price[$i] * $this->data[$i];
                echo "
                <tr>
                    <td>{$count}</td>
                    <td>{$this->items[$i]}</td>
                    <td>{$this->data[$i]}</td>
                    <td>{$result}</td>
                </tr>";
                $count++;
            }
        }
    }


    public function get_total_days($employee_name)
    {
        $day = array();
        $total_day = 0;

        $retrive_days = $this->connectDatabas->get_total_days($employee_name);
        foreach ($retrive_days as $data) {
            $day[] = $data['total_day'];
        }

        for ($i = 0; $i < sizeof($day); $i++) {
            $total_day += $day[$i];
        }

        return $total_day;
    }

    public function get_working_days($employee_name, $working_type)
    {
        switch ($working_type) {
            case "Daily":
                $tmp_days = $this->get_total_days($employee_name);
                if ($tmp_days > 0) {
                    $days_final = strval($tmp_days) . "(Days)";
                }
                break;
            case "Weekly":
                $tmp_days = $this->get_total_days($employee_name);
                if ($tmp_days > 0 && $tmp_days < 7) {
                    $days_final = strval($tmp_days) . "(Days)";
                }
                if ($tmp_days == 7) {
                    $days_final = "1 Week";
                }
                if ($tmp_days > 7) {
                    if ($tmp_days % 7 == 0) {
                        $days_final = strval($tmp_days / 7) . " Week";
                    } else {
                        $days_final = strval(intval($tmp_days / 7)) . " Week and " . strval($tmp_days % 7) . " Days";
                    }
                }
                break;
            case "Monthly":
                $tmp_days = $this->get_total_days($employee_name);
                if ($tmp_days > 0 && $tmp_days < 30) {
                    $days_final = strval($tmp_days) . "(Days)";
                }
                if ($tmp_days == 30) {
                    $days_final = "1 Month";
                }
                if ($tmp_days > 30) {
                    if ($tmp_days % 30 == 0) {
                        $days_final = strval($tmp_days / 30) . " Month";
                    } else {
                        $days_final = strval(intval($tmp_days / 30)) . " Month and " . strval($tmp_days % 30) . " Days";
                    }
                }
                break;
        }
        return $days_final;
    }


    public function get_salary($employee_name, $working_type)
    {
        $retrive_data = $this->connectDatabas->get_salary($employee_name);
        $salary = array();
        foreach ($retrive_data as $data) {
            $salary[] = $data['salary'];
        }
        // echo $salary[0];
        switch ($working_type) {
            case "Daily":
                $tmp_days = $this->get_total_days($employee_name);
                if ($tmp_days < 1) {
                    $salary_final = '<td bgcolor="#F7EEE1">' . '(' . strval($salary[0]) . '/day)' . '</td>';
                }
                if ($tmp_days == 1) {
                    $salary_final = '<td bgcolor="#58C9A9">' . strval($tmp_days * $salary[0]) . '</td>';
                }
                if ($tmp_days > 1) {
                    $salary_final = '<td bgcolor="#F76C5E">' . strval($tmp_days * $salary[0]) . '</td>';
                }
                break;
            case "Weekly":
                $tmp_days = $this->get_total_days($employee_name);
                if ($tmp_days < 7) {
                    $salary_final = '<td bgcolor="#F7EEE1">' . '(' . strval($salary[0]) . '/week)' . '</td>';
                }
                if ($tmp_days == 7) {
                    $salary_final = '<td bgcolor="#58C9A9">' . strval(($tmp_days)/7 * $salary[0]) . '</td>';
                }
                if ($tmp_days > 7) {
                    $salary_final = '<td bgcolor="#F76C5E">' . strval(($tmp_days)/7 * $salary[0]) . '</td>';
                }
                break;
            case "Monthly":
                $tmp_days = $this->get_total_days($employee_name);
                if ($tmp_days < 30) {
                    $salary_final = '<td bgcolor="#F7EEE1">' . '(' . strval($salary[0]) . '/month)' . '</td>';
                }
                if ($tmp_days == 30) {
                    $salary_final = '<td bgcolor="#58C9A9">' . strval(($tmp_days)/30 * $salary[0]) . '</td>';
                }
                if ($tmp_days > 30) {
                    $salary_final = '<td bgcolor="#F76C5E">' . strval(($tmp_days)/30 * $salary[0]) . '</td>';
                }
                break;
        }
        return $salary_final;
    }


    public function get_paid_salary($employee_name, $working_type)
    {
        $retrive_data = $this->connectDatabas->get_salary($employee_name);
        $salary = array();
        foreach ($retrive_data as $data) {
            $salary[] = $data['salary'];
        }
        // echo $salary[0];
        switch ($working_type) {
            case "Daily":
                $tmp_days = $this->get_total_days($employee_name);
                if ($tmp_days < 1) {
                    $salary_final = $salary[0];
                }
                if ($tmp_days == 1) {
                    $salary_final = $tmp_days * $salary[0];
                }
                if ($tmp_days > 1) {
                    $salary_final = $tmp_days * $salary[0];
                }
                break;
            case "Weekly":
                $tmp_days = $this->get_total_days($employee_name);
                if ($tmp_days < 7) {
                    $salary_final = $salary[0];
                }
                if ($tmp_days == 7) {
                    $salary_final = ($tmp_days)/7 * $salary[0];
                }
                if ($tmp_days > 7) {
                    $salary_final = ($tmp_days)/7 * $salary[0];
                }
                break;
            case "Monthly":
                $tmp_days = $this->get_total_days($employee_name);
                if ($tmp_days < 30) {
                    $salary_final = $salary[0];
                }
                if ($tmp_days == 30) {
                    $salary_final = ($tmp_days)/30 * $salary[0];
                }
                if ($tmp_days > 30) {
                    $salary_final = ($tmp_days)/30 * $salary[0];
                }
                break;
        }
        return $salary_final;
    }



    public function get_working_daily($employee_name)
    {
        $time = $this->get_cal_time($this->connectDatabas->get_time($employee_name));
        return $time;
    }

    private function get_cal_time($retrive_time)
    {

        $time_from = array();
        $time_to = array();
        $time1 = array();
        $time2 = array();
        $total = 0;

        $dif = array();

        // $retrive_time = $this->connectDatabas->get_time_by_name($employee_name);

        foreach ($retrive_time as $data) {
            $time_from[] = $data['time_from'];
            $time_to[] = $data['time_to'];
        }

        for ($row = 0; $row < sizeof($time_from); $row++) {

            $time1[] = array($this->_explode_date($time_from[$row]), $this->_explode_time($time_from[$row]));
            $time2[] = array($this->_explode_date($time_to[$row]), $this->_explode_time($time_to[$row]));
        }


        for ($i = 0; $i < sizeof($time1); $i++) {
            $start_date = new DateTime($time1[$i][0] . ' ' . $time1[$i][1]);
            $end_date = new DateTime($time2[$i][0] . ' ' . $time2[$i][1]);
            $interval = $start_date->diff($end_date);
            $years = $interval->format('%y');
            $days = $interval->format('%d');
            $hours = $interval->format('%h');
            $minutes = $interval->format('%i');

            $dif[] = $years * 518400 + $days * 1440 + $hours * 60 + $minutes;
        }

        for ($i = 0; $i < sizeof($dif); $i++) {
            $total += $dif[$i];
        }


        // debugging
        /*
        echo $connectDatabas->test();
        foreach ($retrive_time as $data) {
            echo "hello";
            echo $data['time_to'];
        }



        for($i = 0; $i < sizeof($dif); $i++){
            echo $dif[$i];
            echo "<br>";
        }
        echo "total: " . $total . " minutes";
        echo "<br>";
        echo "total: " . $total/60 . " Hours";
        echo "<br>";
        echo "<br>";
        
        
        echo "time_from<br>";
        
        for($i = 0; $i < sizeof($time1); $i++){
          for($col = 0; $col < 2; $col++){
              echo $time1[$i][$col];
              echo "<br>";
            }
        }
        
        echo "time_to<br>";
        
        for($i = 0; $i < sizeof($time2); $i++){
          for($col = 0; $col < 2; $col++){
              echo $time2[$i][$col];
              echo "<br>";
            }
        }
         */

        return $total;
    }

    private function _explode_time($time_from1)
    {
        //$temp_array = array();
        $temp_array = explode('T', $time_from1);
        return $temp_array[1];
    }

    private function _explode_date($time_from2)
    {
        //$temp_array = array();
        $temp_array = explode('T', $time_from2);

        return $temp_array[0];
    }


    public function get_paid_status_supplier($id){
        $paid_status = array();
        $retrive_data = $this->connectDatabas->get_status_by_id($id);

        foreach($retrive_data as $data){
            $paid_status[] = $data['paid_status'];
        }

        if(!$paid_status[0]){
            return "<button type=\"button\" data-toggle=\"modal\" class=\"btn bg-yellow\"><i class=\"fa fa-print\"></i></button>";
        }
    }


    public function get_profite_rate(){
        $retrive_data_food = $this->connectDatabas->get_all_food_total();
        $retrive_data_sup = $this->connectDatabas->get_all_paid_buyer_total();
        $retrive_data_emp = $this->connectDatabas->get_all_paid_employee_total();
        
        $total_food = $this->get_total_money($retrive_data_food, "total_sell");
        $total_sup = $this->get_total_money($retrive_data_sup, "paid_status");
        $total_emp = $this->get_total_money($retrive_data_emp, "salary");

        return ($total_food / ($total_sup + $total_emp) ) * 100;
    }

    private function get_total_money($retrive_data, $col_name){
        $temp = 0;
        foreach($retrive_data as $data){
            $temp += $data[$col_name];
        }

        return $temp;
    }

    public function get_total_sell(){
        return $this->get_total_money($this->connectDatabas->get_all_food_total(), "total_sell");
    }

}


?>