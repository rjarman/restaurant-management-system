<?php

include "db.php";

class ConnectDatabase extends Database
{

    private $food_table = "food_item";
    private $employee_table = "employee";
    private $employee_details = "employee_details";
    private $paid_salary = "paid_salary";
    private $buyer_details = "buyer_details";
    private $paid_buyer = "paid_buyer";

    private $query_all_table = "SELECT * FROM ";

    private function query_all_table($query)
    {
        $select_all_rows = $this->query($query);
        $num_of_rows = $select_all_rows->num_rows;
        if ($num_of_rows > 0) {
            while ($row = $select_all_rows->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }

    private function query_custom($query)
    {
        $this->query($query);
    }

    public function add_food($associative_array)
    {

        $keys = "(" . implode(', ', array_keys($associative_array)) . ")";
        $valus = "('" . implode("','", array_values($associative_array)) . "');";

        $this->query_custom("INSERT INTO " . $this->food_table . $keys . "VALUES " . $valus);
    }

    public function get_food()
    {
        return $this->query_all_table($this->query_all_table . $this->food_table . " ORDER BY id DESC LIMIT 1");
    }

    public function add_employee($associative_array)
    {

        $keys = "(" . implode(', ', array_keys($associative_array)) . ")";
        $valus = "('" . implode("','", array_values($associative_array)) . "');";

        $this->query_custom("INSERT INTO " . $this->employee_table . $keys . "VALUES " . $valus);
    }

    public function add_employee_details($associative_array)
    {

        $keys = "(" . implode(', ', array_keys($associative_array)) . ")";
        $valus = "('" . implode("','", array_values($associative_array)) . "');";

        $this->query_custom("INSERT INTO " . $this->employee_details . $keys . "VALUES " . $valus);
    }

    public function get_name()
    {
        return $this->query_all_table("SELECT DISTINCT employee_name FROM " . $this->employee_table);
    }

    public function get_post()
    {
        return $this->query_all_table("SELECT DISTINCT post_title FROM " . $this->employee_table);
    }

    public function get_type()
    {
        return $this->query_all_table("SELECT DISTINCT working_type FROM " . $this->employee_table);
    }

    public function get_group_by_name()
    {
        return $this->query_all_table("SELECT * FROM " . $this->employee_table . " GROUP BY employee_name");
    }

    public function get_time_by_name($employee_name)
    {
        return $this->query_all_table("SELECT time_from,time_to FROM " . $this->employee_details . " where employee_name_daily='" . $employee_name . "'");
    }

    public function get_total_days($employee_name)
    {
        return $this->query_all_table("SELECT total_day FROM " . $this->employee_details . " where employee_name_daily='" . $employee_name . "'");
    }

    public function get_time($employee_name)
    {
        return $this->query_all_table("SELECT time_from,time_to FROM " . $this->employee_details . " where employee_name_daily='" . $employee_name . "'" . " ORDER BY id DESC LIMIT 1");
    }

    public function get_salary($employee_name)
    {
        return $this->query_all_table("SELECT salary FROM " . $this->employee_details . " where employee_name_daily='" . $employee_name . "'" . " ORDER BY id DESC LIMIT 1");
    }

    //delete
    public function delete_something($table_name, $column_name, $deleted_item)
    {
        $this->query_custom("DELETE FROM " . $table_name . " WHERE " . $column_name . " = " . "'" . $deleted_item . "'");
    }

    public function rearrange_table($table_name, $column_name)
    {
        $this->query_custom("ALTER TABLE " . $table_name . " DROP " . $column_name);
        $this->query_custom("ALTER TABLE " . $table_name . " AUTO_INCREMENT = 1");
        $this->query_custom("ALTER TABLE " . $table_name . " ADD " . $column_name . " int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST");
    }

    public function get_salary_print_data($employee_name)
    {
        return $this->query_all_table("SELECT * FROM " . $this->employee_details . " where employee_name_daily='" . $employee_name . "'" . " ORDER BY id DESC LIMIT 1");
    }

    public function add_paid_salary($associative_array)
    {

        $keys = "(" . implode(', ', array_keys($associative_array)) . ")";
        $valus = "('" . implode("','", array_values($associative_array)) . "');";

        $this->query_custom("INSERT INTO " . $this->paid_salary . $keys . "VALUES " . $valus);
    }

    public function add_buyer_details($associative_array)
    {

        $keys = "(" . implode(', ', array_keys($associative_array)) . ")";
        $valus = "('" . implode("','", array_values($associative_array)) . "');";

        $this->query_custom("INSERT INTO " . $this->buyer_details . $keys . "VALUES " . $valus);
    }

    public function add_paid_buyer($associative_array)
    {

        $keys = "(" . implode(', ', array_keys($associative_array)) . ")";
        $valus = "('" . implode("','", array_values($associative_array)) . "');";

        $this->query_custom("INSERT INTO " . $this->paid_buyer . $keys . "VALUES " . $valus);
    }

    public function get_buyer_details()
    {
        return $this->query_all_table("SELECT * FROM " . $this->buyer_details);
    }

    public function get_status_by_id($id)
    {
        return $this->query_all_table("SELECT paid_status FROM " . $this->paid_buyer . " where id=" . $id);
    }

    public function get_supp_details_by_id($id)
    {
        return $this->query_all_table("SELECT * FROM " . $this->buyer_details . " where id=" . $id);
    }


    public function get_all_food_total(){
        return $this->query_all_table("SELECT total_sell FROM " . $this->food_table);
    }

    public function get_all_paid_buyer_total(){
        return $this->query_all_table("SELECT fees FROM " . $this->paid_buyer);
    }

    public function get_all_paid_employee_total(){
        return $this->query_all_table("SELECT salary FROM " . $this->paid_salary);
    }
}

?>