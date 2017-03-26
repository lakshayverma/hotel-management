<?php

// If it is going to need the database, then it is probably smart to require it before we start.
require_once(LIB_PATH . DS . "database.php");

class Menu extends DatabaseObject {

    protected static $table_name = "menu";
    protected static $db_fields = array('id', 'item', 'price', 'hotel', 'description', 'img');
    public $id;
    public $item;
    public $price;
    public $hotel;
    public $description;
    public $img;
    public $hotelObj;

    public function init_members() {
        if (!$this->hotelObj && isset($this->hotel)) {
            $this->hotelObj = Hotel::find_by_id($this->hotel);
        }
    }

    public function name() {
        return $this->item . "\t--\t" . $this->title();
    }

    public function title() {
        return "₹" . $this->price ."/-";
    }

    public static function find_expensive($limit = 10) {
        return self::find_by_sql("select * from menu order by price desc limit $limit");
    }

    public function renderTableHeader() {
        return '
            <thead>
                <tr class="row">
                    <th class="col-sm-12 col-md-2 ">
                        Id
                    </th>
                    <th class="col-sm-12 col-md-2 ">
                        Item
                    </th>
                    <th class="col-sm-12 col-md-2 ">
                        Price
                    </th>
                    '
//                    <th class="col-sm-12 col-md-2 ">
//                        Hotel
//                    </th>
                . '<th class="col-sm-12 col-md-2 ">
                        Description
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
                . "<td class=\"col-sm-12 col-md-2\">" . $this->item . "</td>"
                . "<td class=\"col-sm-12 col-md-2\">" . $this->price . "</td>"
//                . "<td class=\"col-sm-12 col-md-2\">" . $this->hotelObj->intro() . "</td>"
                . "<td class=\"col-sm-12 col-md-2\">" . $this->description . "</td>"
                . "<td class=\"col-sm-12 col-md-2\">" . $this->avatar() . "</td>"
                . "</tr>";
    }

}

?>