<?php

// If it is going to need the database, then it is probably smart to require it before we start.
require_once(LIB_PATH . DS . "database.php");

class Order_contents extends DatabaseObject {

    protected static $table_name = "order_contents";
    protected static $db_fields = array('id', 'order_id', 'menu_item', 'quantity', 'status');
    public $id;
    public $order_id;
    public $menu_item;
    public $quantity;
    public $status;
    public $orderObj;
    public $itemObj;

    public static function make($order_id, $menu_item, $quantity) {
        $content = new Order_contents();
        $content->order_id = $order_id;
        $content->menu_item = $menu_item;
        $content->status = "Booked";
        $content->quantity = $quantity;
        return $content;
    }

    public function init_members() {
        if (!$this->itemObj && isset($this->menu_item)) {
            $this->itemObj = Menu::find_by_id($this->menu_item);
        }
        if (!$this->orderObj && isset($this->order_id)) {
            $this->orderObj = Order_booking::find_by_id($this->order_id);
        }
    }

    public static function find_for_order($order) {
        if (!$order->id) {
            return false;
        }
        $sql = "select * from " . static::$table_name
                . " where"
                . " order_id = {$order->id}";
        return Order_contents::find_served($sql, $order);
    }

    public static function find_delivered($order) {
        if (!$order->id) {
            return false;
        }
        $sql = "select * from " . static::$table_name
                . " where"
                . " order_id = {$order->id} and status = 'Delivered'";
        return Order_contents::find_served($sql, $order);
    }

    private static function find_served($sql, $order) {
        $mOrders = self::find_by_sql($sql);
        $response = array();
        $bill = 0;
        while ($content_object = current($mOrders)) {
            $content_object->orderObj = $order;
            $content_object->init_members();
            $response[] = $content_object;
            $bill += $content_object->itemObj->price * $content_object->quantity;
            next($mOrders);
        }
        $lak["orders"] = $response;
        $lak["bill"] = $bill;
        return $lak;
    }

    public function name() {
        $this->init_members();
        return $this->itemObj->intro() . " " . $this->itemObj->name();
//        return "Order for " . $this->itemObj->intro(); //. " in " . $this->orderObj->name();
    }

    public function item_class() {
        $status = strtolower($this->status);

        switch ($status) {
            case 'booked':
                return "info";
            case 'under process':
            case 'on the way':
                return "warning";
            case 'delivered':
                return "success";
            case 'failed':
                return 'danger';
            default :
                return "default";
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
                        Order Id
                    </th>
                    <th class="col-sm-12 col-md-2 ">
                        Menu Item
                    </th>
                    <th class="col-sm-12 col-md-2 ">
                        Quantity
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
                . "<td class=\"col-sm-12 col-md-2\">" . $this->order_id . "</td>"
                . "<td class=\"col-sm-12 col-md-2\">" . $this->itemObj->intro() . "</td>"
                . "<td class=\"col-sm-12 col-md-2\">" . $this->quantity . "</td>"
                . "<td class=\"col-sm-12 col-md-2\">" . $this->status . "</td>"
                . "</tr>";
    }

}
?>

