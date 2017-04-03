<?php

// If it is going to need the database, then it is probably smart to require it before we start.
require_once(LIB_PATH . DS . "database.php");

class Invoice extends DatabaseObject {

    protected static $table_name = "invoice";
    protected static $db_fields = array('id', 'booking', 'generation_date', 'total_amount', 'discount', 'amount_payable', 'status');
    public $id;
    public $booking;
    public $generation_date;
    public $total_amount;
    public $discount;
    public $amount_payable;
    public $status;
    public $bookingObj;

    public function init_members() {
        if (!$this->bookingObj && isset($this->booking)) {
            $this->bookingObj = Booking::find_by_id($this->booking);
            $this->bookingObj->init_members();
        }
    }

    public function amount() {
        return "$this->amount_payable ($this->total_amount)";
    }

    public static function find_for_booking($booking) {
        if ($booking->id) {
            $sql = "select * from " . static::$table_name . " where booking={$booking->id}";
            $nInvoice = Invoice::find_by_sql($sql);
            if ($nInvoice) {
                $nInvoice = array_shift($nInvoice);
                $nInvoice->bookingObj = $booking;
                $nInvoice->init_members();
                return $nInvoice;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public static function make_for_booking($booking) {
        $invoice = new Invoice();
        $orders_in = Order_booking::find_completed_for_booking($booking);
        $invoice->total_amount = $orders_in['bill'];
        $invoice->amount_payable = $orders_in['bill'];
        return $invoice;
    }

    public function generation_date($format = "h:i a, F d Y") {
        return DatabaseObject::format_datetime($format, $this->generation_date);
    }

    public function renderTableHeader() {
        return '
            <thead>
                <tr class="row">
                    <th class="col-sm-12 col-md-2 ">
                        Id
                    </th>
                    <th class="col-sm-12 col-md-2 ">
                        Booking
                    </th>
                    <th class="col-sm-12 col-md-2 ">
                        Generation Date
                    </th>
                    <th class="col-sm-12 col-md-2 ">
                        Total Amount
                    </th>
                    <th class="col-sm-12 col-md-2 ">
                        Discount
                    </th>
                    <th class="col-sm-12 col-md-2 ">
                        Amount Payable
                    </th>
                    <th class="col-sm-12 col-md-2 ">
                        Status
                    </th>
                    </tr>
            </thead>';
    }

    public function renderTableRow($edit) {
        $this->init_members();
        return "
            <tr class=\"row\">"
                . $this->table_edit($edit)
                . "<td class=\"col-sm-12 col-md-2\">" . $this->bookingObj->intro() . "</td>"
                . "<td class=\"col-sm-12 col-md-2\">" . $this->generation_date() . "</td>"
                . "<td class=\"col-sm-12 col-md-2\">" . $this->total_amount . "</td>"
                . "<td class=\"col-sm-12 col-md-2\">" . $this->discount . "</td>"
                . "<td class=\"col-sm-12 col-md-2\">" . $this->amount_payable . "</td>"
                . "<td class=\"col-sm-12 col-md-2\">" . $this->status . "</td>"
                . "</tr>";
    }

}

?>