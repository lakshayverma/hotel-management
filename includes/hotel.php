<?php

// If it is going to need the database, then it is probably smart to require it before we start.
require_once(LIB_PATH . DS . "database.php");

class Hotel extends DatabaseObject {

    protected static $table_name = "hotel";
    protected static $db_fields = array('id', 'name', 'address', 'manager', 'img');
    public $id;
    public $name;
    public $address;
    public $manager;
    public $img;
    public $managerObj;

    public function name() {
        return $this->name;
    }
    
    public function init_members(){
        if(!$this->managerObj && isset($this->manager)){
            $this->managerObj = Account::find_by_id($this->manager);
            $this->managerObj->init_members();
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
                        Name
                    </th>
                    <th class="col-sm-12 col-md-2 ">
                        Address
                    </th>
                    <th class="col-sm-12 col-md-2 ">
                        Manager
                    </th>
                    <th class="col-sm-12 col-md-2 ">
                        Image
                    </th>
                </tr>
            </thead>';
    }

    public function renderTableRow($edit) {
        $this->init_members();
        return "
            <tr class=\"row\">"
                . $this->table_edit($edit)
                . "<td class=\"col-sm-12 col-md-2\">" . $this->name . "</td>"
                . "<td class=\"col-sm-12 col-md-2\">" . $this->address. "</td>"
                . "<td class=\"col-sm-12 col-md-2\">" . $this->managerObj->intro() . "</td>"
                . "<td class=\"col-sm-12 col-md-2\">" . $this->avatar() . "</td>"
                . "</tr>";
    }

}

?>
