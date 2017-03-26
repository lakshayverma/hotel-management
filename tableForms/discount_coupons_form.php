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

            <div class="form-group col-md-4">
                <label class="col-form-label" for="coupon">Coupon</label>
                <input id="coupon" name="coupon" class="form-control" type="number" required value="<?php echo $object->coupon; ?>"/>
            </div>
            <div class="form-group col-md-6">
                <label class="col-form-label" for="img">Image</label>
                <input id="img" name="img" class="form-control" type="file" accept="image/*" <?php if (!$object->id) echo 'required'; ?>/>
            </div>



            <input id="redirect_url" name="redirect_url" type="hidden" readonly value="<?php echo $_SERVER["REQUEST_URI"]; ?>"/>
            <div class="form-group col-md-6">
                <label class="col-form-label" for="valid_through">Valid Through</label>
                <input id="valid_through" name="valid_through" class="form-control" type="date" required value="<?php echo $object->valid_through; ?>"/>
            </div>
            <div class="form-group col-md-4">
                <label class="col-form-label" for="valid_for">Valid For</label>
                <select id="valid_for" name="valid_for" class="form-control" required>
                    <option value="0">Everyone</option>
                    <?php
                    $selected_option = $object->valid_for;
                    $options = Account::find_all();
                    include './layouts/options_list.php';
                    ?>                    
                </select>
            </div>

            <div class="form-group col-md-3">
                <label class="col-form-label" for="type">Type</label>
                <select class="form-control" name="type">
                    <option value="special">Special</option>
                    <option value="rate cutter">Rate Cutter</option>
                    <option value="normal">Normal</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label class="col-form-label" for="value">Value</label>
                <input id="value" name="value" class="form-control" type="number" required value="<?php echo $object->value; ?>"/>
            </div>
            <div class="form-group col-md-3">
                <label class="col-form-label" for="status">Status</label>
                <select class="form-control" name="status">
                    <option value="Available">Available</option>
                    <option value="Redeemed">Redeemed</option>
                    <option value="Expired">Expired</option>
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