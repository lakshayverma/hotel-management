<?php

// If it is going to need the database, then it is probably smart to require it before we start.
require_once(LIB_PATH . DS . "database.php");

class Order_booking extends DatabaseObject {

    protected static $table_name = "order_booking";
    protected static $db_fields = array('id', 'account', 'booking', 'date');
    public $id;
    public $account;
    public $booking;
    public $date;
    public $accountObj, $bookingObj;
    public $contents;
    public $bill;

    public static function make($account, $booking) {
        $obj = new Order_booking();
        $obj->account = $account;
        $obj->booking = $booking;
        return $obj;
    }

    public function create_new() {
        global $database;
        $sql = "INSERT INTO " . static::$table_name . " (";
        $sql .= "account,booking";
        $sql .= ") VALUES (";
        $sql .= "$this->account,$this->booking";
        $sql .= ")";
        if ($database->query($sql)) {
            $this->id = $database->insert_id();
            return true;
        } else {
            return false;
        }
    }

    public static function find_completed_for_booking($booking) {
        return Order_booking::find_sq($booking, TRUE);
    }

    public static function find_for_booking($booking) {
        return Order_booking::find_sq($booking);
    }

    private static function find_sq($booking, $onlyDelivered = FALSE) {
        if (!$booking->id) {
            return false;
        }
        $sql = "select * from " . static::$table_name
                . " where booking={$booking->id} order by id desc,date desc";
        $db_rows = self::find_by_sql($sql);
        $response = array();
        $bill = 0;
        while ($row = current($db_rows)) {
            $row->bookingObj = $booking;
            if ($onlyDelivered) {
                $row->update_orders();
            } else {
                $row->init_members();
            }
            $response[] = $row;
            $bill += $row->bill;
            next($db_rows);
        }

        $lak["response"] = $response;
        $lak["bill"] = $bill;
        return $lak;
    }

    public function init_members() {
        if (!$this->accountObj && isset($this->account)) {
            $this->accountObj = Account::find_by_id($this->account);
            $this->accountObj->init_members();
        }
        if (!$this->bookingObj && isset($this->booking)) {
            $this->bookingObj = Booking::find_by_id($this->booking);
        }

        if (!$this->contents) {
            $response_contents = Order_contents::find_for_order($this);
            $this->contents = $response_contents["orders"];
            $this->bill = $response_contents["bill"];
        }
    }

    public function update_orders() {
        $response_contents = Order_contents::find_delivered($this);
        $this->contents = $response_contents["orders"];
        $this->bill = $response_contents["bill"];
    }

    public function name() {
        $this->init_members();
        return "Order #{$this->id}"; //." for " . $this->bookingObj->name();
    }

    public function renderTableHeader() {
        return '
            <thead>
                <tr class="row">
                    <th class="col-sm-12 col-md-2 ">
                        Id
                    </th>
                    <th class="col-sm-12 col-md-2 ">
                        Account
                    </th>
                    <th class="col-sm-12 col-md-2 ">
                        Booking
                    </th>
                    <th class="col-sm-12 col-md-2 ">
                        Date
                    </th>                    
                </tr>
            </thead>';
    }

    public function renderTableRow($edit) {
        $this->init_members();
        return "
            <tr class=\"row\">"
                . $this->table_edit($edit)
                . "<td class=\"col-sm-12 col-md-2\">" . $this->accountObj->intro() . "</td>"
                . "<td class=\"col-sm-12 col-md-2\">" . $this->bookingObj->intro() . "</td>"
                . "<td class=\"col-sm-12 col-md-2\">" . $this->date . "</td>"
                . "</tr>";
    }

}

?>