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
                <label class="col-form-label" for="number">Title</label>
                <input id="title" name="title" class="form-control" type="text" required value="<?php echo $object->title; ?>"/>
            </div>
            <div class="form-group col-md-4">
                <label class="col-form-label" for="type">Type</label>
                <select class="form-control" name="type">
                    <?php
                    $options = Facility::find_types();
                    $selected_option = $object->type;
                    include './layouts/options_list.php';
                    ?>
                </select>
            </div>

            <div class="form-group col-md-2">
                <label class="col-form-label" for="number">Number</label>
                <input id="number" name="number" class="form-control" type="number" required value="<?php echo $object->number; ?>"/>
            </div>
            <div class="form-group col-md-2">
                <label class="col-form-label" for="floor">Floor</label>
                <input id="floor" name="floor" class="form-control" type="number" required value="<?php echo $object->floor; ?>"/>
            </div>
            <div class="form-group col-md-4">
                <label class="col-form-label" for="capacity">Capacity</label>
                <input id="capacity" name="capacity" class="form-control" type="number" required value="<?php echo $object->capacity; ?>"/>
            </div>

            <div class="form-group col-md-4">
                <label class="col-form-label" for="charges">Charges</label>
                <input id="charges" name="charges" class="form-control" type="number" required value="<?php echo $object->charges; ?>"/>
            </div>

            <div class="form-group col-md-4">
                <label class="col-form-label" for="available">Available</label>
                <input id="available" name="available" class="form-control" type="number" required value="<?php echo $object->available; ?>"/>
            </div>
            <div class="form-group col-md-6">
                <label class="col-form-label" for="img">Image</label>
                <input id="img" name="img" class="form-control" type="file" accept="image"<?php if (!$object->id) echo 'required'; ?>/>
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