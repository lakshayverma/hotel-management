<?php

// If it is going to need the database, then it is probably smart to require it before we start. 
require_once(LIB_PATH . DS . "database.php");

class Booking extends DatabaseObject {

    protected static $table_name = "booking";
    protected static $db_fields = array('id', 'account', 'check_in', 'check_out', 'facility');
    public $id;
    public $account;
    public $check_in;
    public $check_out;
    public $facility;
    public $facilityObj;
    public $accountObj;
    public $orders;
    public $bill;
    public $invoiceObj;

    public static function make($account, $facility, $check_in, $check_out) {
        $booking = new Booking();
        $booking->account = $account;
        $booking->facility = $facility;
        $booking->check_in = $check_in;
        $booking->check_out = $check_out;
        return $booking;
    }

    public function init_members() {
        if (!$this->accountObj && isset($this->account)) {
            $this->accountObj = Account::find_by_id($this->account);
            $this->accountObj->init_members();
        }
        if (!$this->facilityObj && isset($this->facility)) {
            $this->facilityObj = Facility::find_by_id($this->facility);
        }
        if (!$this->orders) {
            $orders = Order_booking::find_for_booking($this);
            $this->orders = $orders['response'];
            $this->bill = $orders['bill'];
        }

        if (!$this->invoiceObj) {
            $this->invoiceObj = Invoice::find_for_booking($this);
            if ($this->invoiceObj instanceof Invoice && isset($this->invoiceObj->ammount_payable)) {
                $this->bill = $this->invoiceObj->amount();
            }
        }
    }

    public function charges() {
        return $this->stay_period() * $this->facilityObj->charges;
    }

    public function stay_period($format = '%a') {
        $this->init_members();

        if ($this->invoiceObj instanceof Invoice) {
            $datetime2 = new DateTime($this->check_out);
        } else {
            $datetime2 = new DateTime();
        }
        $datetime1 = new DateTime($this->check_in);
        $interval = $datetime1->diff($datetime2);
        return $interval->format($format);
    }

    public function name() {
        $this->init_members();
        return "Booking #{$this->id} by " . $this->accountObj->name(); //. " <small>\"" . $this->check_in() . " to " . $this->check_out() . "\"</small>";
    }

    public function bill() {
        $re = 0;
        $msg = "Not Generated yet ";
        if ($this->invoiceObj instanceof Invoice) {
            $re = $this->invoiceObj->amount();
            $msg = "You paid ";
        } else {
            $re = $this->bill;
            $msg = "Estimate Bill ";
        }
        $res = "{$msg}: ₹ {$re} /-";
        return $res;
    }

    public function past_checkout() {
        $this->init_members();
        $today = strtotime('now');
        $check_out = strtotime($this->check_out);
        $datediff = $today - $check_out;
        $days = floor($datediff / (60 * 60 * 24));
        if ($days > 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function title() {
        return $this->check_in() . " to " . $this->check_out();
    }

    public function check_in($format = "h:i a, F d Y") {
        return DatabaseObject::format_datetime($format, $this->check_in);
    }

    public function check_out($format = "h:i a, F d Y") {
        return DatabaseObject::format_datetime($format, $this->check_out);
    }

    public static function find_all_for_account($account) {
        $sql = "select * from "
                . static::$table_name
                . " where account=$account order by check_in desc, check_out desc";
        return Booking::find_by_sql($sql);
    }

    public function settle() {
        if ($this->id) {
            $sqlFailed = "UPDATE order_contents"
                    . " set"
                    . " order_contents.status ='Failed'"
                    . " where"
                    . " order_contents.order_id in"
                    . " ("
                    . "select id from order_booking"
                    . " WHERE"
                    . " booking = $this->id"
                    . ")"
                    . " and"
                    . " status in ('Booked','Failed')";
            $sqlDelivered = "UPDATE order_contents"
                    . " set"
                    . " order_contents.status ='Delivered'"
                    . " where"
                    . " order_contents.order_id in"
                    . " ("
                    . "select id from order_booking"
                    . " WHERE"
                    . " booking = $this->id"
                    . ")"
                    . " and"
                    . " status not in ('Booked','Failed')";

            global $database;
            $database->query($sqlFailed);
            $database->query($sqlDelivered);
        }
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
                        Check In
                    </th>
                    <th class="col-sm-12 col-md-2 ">
                        Check Out
                    </th>
                    <th class="col-sm-12 col-md-2 ">
                        Facility
                    </th>
                </tr>
            </thead>';
    }

    public function renderTableRow($edit) {
        return "
            <tr class=\"row\">"
                . $this->table_edit($edit)
                . "<td class=\"col-sm-12 col-md-2\">" . $this->accountObj->intro() . "</td>"
                . "<td class=\"col-sm-12 col-md-2\">" . $this->check_in() . "</td>"
                . "<td class=\"col-sm-12 col-md-2\">" . $this->check_out() . "</td>"
                . "<td class=\"col-sm-12 col-md-2\">" . $this->facilityObj->intro() . "</td>"
                . "</tr>";
    }

}

?>