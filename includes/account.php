<?php

// If it is going to need the database, then it is probably smart to require it before we start.
require_once(LIB_PATH . DS . "database.php");

class Account extends DatabaseObject {

    protected static $table_name = "account";
    public $id;
    public $user_name;
    public $password;
    public $authority_level;
    public $person;
    public $personObj;
    protected static $db_fields = array('id', 'user_name', 'password', 'authority_level', 'person');

    public static function make($user_name, $person, $password) {
        $account = new Account();
        $account->user_name = $user_name;
        $account->authority_level = 1;
        $account->person = $person;
        $account->password = $password;
        return $account;
    }

    public function is_admin() {
        if ($this->authority_level >= 2) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public static function find_admins($limit) {
        return self::find_by_sql("SELECT * FROM "
                        . static::$table_name
                        . " where"
                        . " authority_level >=2"
                        . " order by authority_level desc"
                        . " limit $limit");
    }

    public function init_members() {
        if (!$this->personObj && isset($this->person)) {
            $this->personObj = Person::find_by_id($this->person);
        }
    }

    public function name() {
        $this->init_members();
        return $this->personObj->name();
    }

    public function title() {
        return "Account #" . $this->id . ", for " . $this->name();
    }

    public function avatar($image_size = "72px", $class = "img img-thumbnail", $title = "org") {
        $this->init_members();
        return $this->personObj->avatar($image_size, $class, $title);
    }

    public function renderTableHeader() {
        return '
            <thead>
                <tr class="row">
                    <th class="col-sm-12 col-md-2">
                        Id
                    </th>
                    <th class="col-sm-12 col-md-2">
                        User Name
                    </th>
                    <th class="col-sm-12 col-md-2">
                        Password
                    </th>
                    <th class="col-sm-12 col-md-2">
                        Authority Level
                    </th> 
                    <th class="col-sm-12 col-md-2">
                        Person
                    </th> 
                    </thead>';
    }

    public function renderTableRow($edit) {
        $this->init_members();
        return "
            <tr class=\"row\">"
                . $this->table_edit($edit)
                . "<td class=\"col-sm-12 col-md-2\">" . $this->user_name . "</td>"
                . "<td class=\"col-sm-12 col-md-2\">" . $this->password . "</td>"
                . "<td class=\"col-sm-12 col-md-2\">" . $this->authority_level . "</td>"
                . "<td class=\"col-sm-12 col-md-2\">" . $this->personObj->intro() . "</td>"
                . "</tr>";
    }

}

?>