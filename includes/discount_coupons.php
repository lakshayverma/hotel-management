<?php

// If it is going to need the database, then it is probably smart to require it before we start. 
require_once(LIB_PATH . DS . "database.php");

class Discount_coupons extends DatabaseObject {

    protected static $table_name = "discount_coupons";
    protected static $db_fields = array('id', 'coupon', 'valid_through', 'valid_for', 'type', 'value', 'status', 'img');
    public $id;
    public $valid_through;
    public $valid_for;
    public $coupon;
    public $type;
    public $value;
    public $status;
    public $img;
    public $validObj;

    public function init_members() {
        if (!$this->validObj) {
            if ($this->valid_for == 0) {
                $this->validObj = "Everyone";
            } else {
                $this->validObj = Account::find_by_id($this->valid_for);
            }
        }
    }

    public static function find_appropriate_for($account) {
        $sql = "select * from " . static::$table_name
                . " where"
                . " valid_for = 0"
                . " or"
                . " valid_for = {$account->id}"
                . " and"
                . " status = 'Available'"
                . " and"
                . " valid_through >= str_to_date('2017-03-25','%Y-%m-%d')"
                . " order by"
                . " valid_for desc, valid_through, value";
        return self::find_by_sql($sql);
    }

    public function valid_for() {
        $this->init_members();
        if ($this->validObj == "Everyone") {
            return $this->validObj;
        } else {
            return $this->validObj->name();
        }
    }

    public function valid_for_intro() {
        if ($this->validObj == "Everyone") {
            return $this->validObj;
        } else {
            return $this->validObj->intro();
        }
    }

    public function name() {
        $typ = strtolower($this->type);
        switch ($typ) {
            case 'rate cutter':
                $msg = "₹ " . $this->value . " /- off";
                break;
            case 'special':
                $msg = " discount of " . $this->value . "%";
                break;
            case 'flat':
                $msg = "₹ " . $this->value . " /- off";
                break;
            default :
                $msg = ucwords($this->type) . " " . $this->value . " (" . $this->status . ")";
        }

        return $this->coupon . " " . $msg . " on your bill.";
    }

    public function title() {
        return "Valid for: " . $this->valid_for() . " till " . $this->valid_through;
    }

    public function renderTableHeader() {
        return '
            <thead>
                <tr class="row">
                    <th class="col-sm-12 col-md-2 ">
                        Id
                    </th>
                    <th class="col-sm-12 col-md-2 ">
                        Coupon
                    </th>
                    <th class="col-sm-12 col-md-2 ">
                        Valid Through
                    </th>
                    <th class="col-sm-12 col-md-2 ">
                        Valid For
                    </th>
                    <th class="col-sm-12 col-md-2 ">
                        Type
                    </th>
                    <th class="col-sm-12 col-md-2 ">
                        Value
                    </th>
                    <th class="col-sm-12 col-md-2 ">
                        Status
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
                . "<td class=\"col-sm-12 col-md-2\">" . $this->coupon . "</td>"
                . "<td class=\"col-sm-12 col-md-2\">" . $this->valid_through . "</td>"
                . "<td class=\"col-sm-12 col-md-2\">" . $this->valid_for_intro() . "</td>"
                . "<td class=\"col-sm-12 col-md-2\">" . $this->type . "</td>"
                . "<td class=\"col-sm-12 col-md-2\">" . $this->value . "</td>"
                . "<td class=\"col-sm-12 col-md-2\">" . $this->status . "</td>"
                . "<td class=\"col-sm-12 col-md-2\">" . $this->avatar() . "</td>"
                . "</tr>";
    }

}

?>