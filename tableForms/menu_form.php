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
            <div class="form-group col-md-5">
                <label class="col-form-label" for="item">Item</label>
                <input id="item" name="item" class="form-control" type="text" required value="<?php echo $object->item; ?>"/>
            </div>
            <div class="form-group col-md-5">
                <label class="col-form-label" for="price">Price</label>
                <input id="price" name="price" class="form-control" type="number" required value="<?php echo $object->price; ?>"/>
            </div>
            <div class="form-group col-md-5">
                <label class="col-form-label" for="description">Description</label>
                <input id="description" name="description" class="form-control" type="text" required value="<?php echo $object->description; ?>"/>
            </div>
            <div class="form-group col-md-5">
                <label class="col-form-label" for="img">Image</label>
                <input id="img" name="img" class="form-control" type="file" accept="image" <?php if (!$object->id) echo 'required'; ?> />
            </div>

            <div class="row btn-group-vertical col-md-6 col-md-offset-3">
                <input id="table_name" name="table_name" type="hidden" value="<?php echo $table; ?>"/>
                <input id="hotel" name="hotel" type="hidden" required value="1"/>
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