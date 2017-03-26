<?php

// If it is going to need the database, then it is probably smart to require it before we start.
require_once(LIB_PATH . DS . "database.php");

class Person extends DatabaseObject {

    protected static $table_name = "person";
    protected static $db_fields = array('id', 'first_name', 'last_name', 'address', 'phone', 'email', 'dob', 'anniversary', 'img');
    public $id;
    public $first_name;
    public $last_name;
    public $address;
    public $phone;
    public $email;
    public $dob;
    public $anniversary;
    public $img = "";

    public static function make($first_name, $last_name, $phone, $email) {
        $person = new Person();
        $person->first_name = $first_name;
        $person->last_name = $last_name;
        $person->phone = $phone;
        $person->email = $email;
        return $person;
    }

    public function create_blank() {
        global $database;
        $sql = "INSERT INTO " . static::$table_name . " (";
        $sql .= "first_name, last_name, phone, email";
        $sql .= ") VALUES "
                . "("
                . "\"" . $this->first_name . "\","
                . "\"" . $this->last_name . "\","
                . "\"" . $this->phone . "\","
                . "\"" . $this->email . "\""
                . ")";

        if ($database->query($sql)) {
            $this->id = $database->insert_id();
            return true;
        } else {
            return false;
        }
    }

    public function save() {
        if (!$this->anniversary) {
            $this->anniversary = "0001-01-01";
        }
        parent::save();
    }

    public function name() {
        return $this->first_name . " " . $this->last_name;
    }

    public function renderTableHeader() {
        return '
            <thead>
                <tr class="row">
                    <th class="col-sm-12 col-md-2 ">
                        Id
                    </th>
                    <th class="col-sm-12 col-md-2 ">
                        Image
                    </th>
                    <th class="col-sm-12 col-md-2 ">
                        First Name
                    </th>
                    <th class="col-sm-12 col-md-2 ">
                        Last Name
                    </th>
                    <th class="col-sm-12 col-md-2 ">
                        Address
                    </th>
                    <th class="col-sm-12 col-md-2 ">
                        Phone
                    </th>
                    <th class="col-sm-12 col-md-2 ">
                        email
                    </th>
                    <th class="col-sm-12 col-md-2 ">
                        DOB
                    </th>
                    <th class="col-sm-12 col-md-2 ">
                        Anniversary
                    </th>
                </tr>
            </thead>';
    }

    public function renderTableRow($edit) {
        return "
            <tr class=\"row\">"
                . $this->table_edit($edit)
                . "<td class=\"col-sm-12 col-md-2\">" . $this->avatar() . "</td>"
                . "<td class=\"col-sm-12 col-md-2\">" . $this->first_name . "</td>"
                . "<td class=\"col-sm-12 col-md-2\">" . $this->last_name . "</td>"
                . "<td class=\"col-sm-12 col-md-2\">" . $this->address . "</td>"
                . "<td class=\"col-sm-12 col-md-2\">" . $this->phone . "</td>"
                . "<td class=\"col-sm-12 col-md-2\">" . $this->email . "</td>"
                . "<td class=\"col-sm-12 col-md-2\">" . $this->dob . "</td>"
                . "<td class=\"col-sm-12 col-md-2\">" . $this->anniversary . "</td>"
                . "</tr>";
    }

}
