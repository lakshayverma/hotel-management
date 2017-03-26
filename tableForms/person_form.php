<?php
$tbClass = ucfirst($table);
if (isset($_GET['id'])) {
    $object = $tbClass::find_by_id($_GET['id']);
} else {
    $object = new $tbClass();
}
$object->init_members();
?>

<div class="container-fluid">

    <div class="panel panel-default col-md-8 col-md-offset-2">
        <h3 class="panel-heading text-capitalize">Insert new <?php echo $table; ?></h3>

        <form id="form" class="panel-body" method="post" action="tableForms/insert.php" enctype="multipart/form-data">
            <?php if ($object->id): ?>
                <div class="form-group col-md-2">
                    <label class="col-form-label" for="id">Id</label>
                    <input id="id" name="id" class="form-control" type="number" readonly value="<?php echo $object->id; ?>"/>
                </div>
            <?php endif; ?>
            <input id="redirect_url" name="redirect_url" type="hidden" readonly value="<?php echo $_SERVER["REQUEST_URI"]; ?>"/>

            <div class="form-group col-md-5">
                <label class="col-form-label" for="first_name">First Name</label>
                <input id="first_name" name="first_name" class="form-control" type="text" required value="<?php echo $object->first_name; ?>"/>
            </div>

            <div class="form-group col-md-5">
                <label class="col-form-label" for="last_name">Last Name</label>
                <input id="last_name" name="last_name" class="form-control" type="text" required value="<?php echo $object->last_name; ?>"/>
            </div>

            <div class="form-group col-md-8">
                <label class="col-form-label" for="address">Address</label>
                <input id="address" name="address" class="form-control" type="text" required value="<?php echo $object->address; ?>"/>
            </div>

            <div class="form-group col-md-4">
                <label class="col-form-label" for="email">Email</label>
                <input id="email" name="email" class="form-control" type="text" required value="<?php echo $object->email; ?>"/>
            </div>
            <div class="form-group col-md-4">
                <label class="col-form-label" for="email">Phone No</label>
                <input id="phone" name="phone" class="form-control" type="text" required value="<?php echo $object->phone; ?>"/>
            </div>

            <div class="form-group col-md-6">
                <label class="col-form-label" for="dob">Date of Birth</label>
                <input id="dob" name="dob" class="form-control" type="date" required value="<?php echo $object->dob; ?>"/>
            </div>

            <div class="form-group col-md-6">
                <label class="col-form-label" for="anniversary">Anniversary</label>
                <input id="anniversary" name="anniversary" class="form-control" type="date" value="<?php echo $object->anniversary; ?>"/>
            </div>
            <div class="form-group col-md-12">
                <label class="col-form-label" for="img">Image</label>
                <input id="img" name="img" class="form-control" type="file" accept="image/*" <?php if (!$object->id) echo 'required'; ?>/>
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