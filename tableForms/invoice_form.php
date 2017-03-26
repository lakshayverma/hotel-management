<?php
$tbClass = ucfirst($table);
if (isset($_GET['id'])) {
    $object = $tbClass::find_by_id($_GET['id']);
    $table_title = "Edit " . $object->name();
} else {
    $object = new $tbClass();
    $table_title = "Insert new Record in {$table}";
}
$object->init_members();
?>

<div class="container-fluid">

    <div class="panel panel-default col-md-8 col-md-offset-2">
        <h3 class="panel-heading text-capitalize"><?php echo $table_title; ?></h3>

        <form id="form" class="panel-body" method="post" action="tableForms/insert.php" enctype="multipart/form-data">
            <?php if ($object->id): ?>
                <div class="form-group col-md-2">
                    <label class="col-form-label" for="id">Id</label>
                    <input id="id" name="id" class="form-control" type="number" readonly value="<?php echo $object->id; ?>"/>
                </div>
            <?php endif; ?>
            <input id="redirect_url" name="redirect_url" type="hidden" readonly value="<?php echo $_SERVER["REQUEST_URI"]; ?>"/>
            <div class="form-group col-md-4">
                <label class="col-form-label" for="booking">Booking</label>
                <select id="booking" name="booking" class="form-control" required >
                    <?php
                    $selected_option = $object->booking;
                    $options = Booking::find_all();
                    include './layouts/options_list.php';
                    ?>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label class="col-form-label" for="generation_date">Generation Date</label>
                <input id="generation_date" name="generation_date" class="form-control" type="datetime-local" required value="<?php echo DatabaseObject::form_date($object->generation_date); ?>"/>
            </div>
            <div class="form-group col-md-2">
                <label class="col-form-label" for="total_amount">Total Amount</label>
                <input id="total_amount" name="total_amount" class="form-control" type="number" required value="<?php echo $object->total_amount; ?>"/>
            </div>
            <div class="form-group col-md-3">
                <label class="col-form-label" for="discount">Discount</label>
                <select id="discount" name="discount" class="form-control" required>
                    <?php
                    $selected_option = $object->discount;
                    $options = Discount_coupons::find_all();
                    include './layouts/options_list.php';
                    ?>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label class="col-form-label" for="amount_payable">Amount Payable</label>
                <input id="amount_payable" name="amount_payable" class="form-control" type="number" required value="<?php echo $object->amount_payable; ?>"/>
            </div>
            <div class="form-group col-md-6">
                <label class="col-form-label" for="status">Status</label>
                <select class="form-control" name="status">
                    <option value="generated">Generated</option>
                    <option value="paid">Paid</option>
                    <option value="over due">Over Due</option>
                    <option value="waived">Waived</option>
                </select>
            </div>


            <div class="row btn-group-vertical col-md-6 col-md-offset-3">
                <input id="table_name" name="table_name" type="hidden" value="<?php echo $table; ?>"/>
                <input class="form-control btn  btn-primary" type="submit" value="Submit"/>
                <input class="form-control btn " type="reset" value="Clear"/>
            </div>
        </form>
    </div>
</div>

<script>
    var formRules = {
        rules: {
        },
        messages: {
        }
    };
</script>