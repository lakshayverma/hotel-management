<?php

// If it is going to need the database, then it is probably smart to require it before we start. 
require_once(LIB_PATH . DS . "database.php");

class Facility extends DatabaseObject {

    protected static $table_name = "facility";
    protected static $db_fields = array('id', 'title', 'type', 'number', 'floor', 'capacity', 'available', 'img','charges');
    public $id;
    public $title;
    public $type;
    public $number;
    public $floor;
    public $capacity;
    public $available;
    public $img;
    public $charges;

    public static function find_types() {
        global $database;
        $results = $database->query("select distinct type from facility");
        $response = array();
        while ($row = $database->fetch_array($results)) {
            $response[] = $row[0];
        }
        return $response;
    }

    public function name() {
        return $this->title;
    }

    public function description() {
        return "$this->title is a $this->type located at $this->floor.";
    }

    public static function show_case() {
        $sql = "select * from facility where id in (select max(id) from facility group by type)";
        return self::find_by_sql($sql);
    }

    public static function find_available($capacity, $type, $check_in, $check_out, $limit = 1) {
        $sql = "SELECT * FROM facility
                WHERE
                    id NOT IN
                    (SELECT facility FROM booking
                        WHERE
                            check_in >= STR_TO_DATE('{$check_in}', '%m-%d-%y')
                                AND check_out <= STR_TO_DATE('{$check_out}', '%m-%d-%y'))";

        $sql .= " and"
                . " type = '$type'"
                . " and"
                . " capacity >= $capacity"
                . " order by capacity asc"
                . " limit $limit";
        return Facility::find_by_sql($sql);
    }

    public function renderTableHeader() {
        return '
            <thead>
                <tr class="row">
                    <th class="col-sm-12 col-md-2 ">
                        Id
                    </th>
                    <th class="col-sm-12 col-md-2 ">
                        Title
                    </th>
                    <th class="col-sm-12 col-md-2 ">
                        Type
                    </th>
                    <th class="col-sm-12 col-md-2 ">
                        Number
                    </th>
                    <th class="col-sm-12 col-md-2 ">
                        Floor
                    </th>
                    <th class="col-sm-12 col-md-2 ">
                        Capacity
                    </th>
                    <th class="col-sm-12 col-md-2 ">
                        Available
                    </th>
                    <th class="col-sm-12 col-md-2 ">
                        Charges
                    </th>
                    <th class="col-sm-12 col-md-2 ">
                        Image
                    </th>
                 </tr>
            </thead>';
    }

    public function renderTableRow($edit) {
        return "
            <tr class=\"row\">"
                . $this->table_edit($edit)
                . "<td class=\"col-sm-12 col-md-2\">" . $this->title . "</td>"
                . "<td class=\"col-sm-12 col-md-2\">" . $this->type . "</td>"
                . "<td class=\"col-sm-12 col-md-2\">" . $this->number . "</td>"
                . "<td class=\"col-sm-12 col-md-2\">" . $this->floor . "</td>"
                . "<td class=\"col-sm-12 col-md-2\">" . $this->capacity . "</td>"
                . "<td class=\"col-sm-12 col-md-2\">" . $this->available . "</td>"
                . "<td class=\"col-sm-12 col-md-2\">" . $this->charges . "</td>"
                . "<td class=\"col-sm-12 col-md-2\">" . $this->avatar() . "</td>"
                . "</tr>";
    }

}

?>
