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
                <label class="col-form-label" for="account">Account</label>
                <select id="account" name="account" class="form-control" required>
                    <?php
                    $selected_option = $object->account;
                    $options = Account::find_all();
                    include './layouts/options_list.php';
                    ?>
                </select>
            </div>

            <div class="form-group col-md-5">
                <label class="col-form-label" for="facility">Facility</label>
                <select id="facility" name="facility" class="form-control" required>
                    <?php
                    $options = Facility::find_all();
                    $selected_option = $object->facility;
                    include './layouts/options_list.php';
                    ?>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label class="col-form-label" for="check_in">Check In</label>
                <input id="check_in" name="check_in" class="form-control" type="datetime-local" required value="<?php echo DatabaseObject::form_date($object->check_in); ?>"/>
            </div>
            <div class="form-group col-md-4">
                <label class="col-form-label" for="check_out">Check Out</label>
                <input id="check_out" name="check_out" class="form-control" type="datetime-local" required value="<?php echo DatabaseObject::form_date($object->check_out); ?>"/>
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