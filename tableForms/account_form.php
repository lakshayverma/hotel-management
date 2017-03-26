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

            <div class="form-group col-md-3">
                <label class="col-form-label" for="user_name">User Name</label>
                <input id="user_name" name="user_name" class="form-control" type="text" required value="<?php echo $object->user_name; ?>"/>
            </div>

            <div class="form-group col-md-3">
                <label class="col-form-label" for="authority_level">Authority Level</label>                
                <select id="authority_level" name="authority_level" class="form-control">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>

            </div>

            <div class="form-group col-md-3">
                <label class="col-form-label" for="person">Person</label>

                <select id="person" name="person" class="form-control" required>
                    <option value="0">No One</option>
                    <?php
                    $selected_option = $object->person;
                    $options = Person::find_all();
                    include './layouts/options_list.php';
                    ?>
                </select>
            </div>



            <div class="form-group col-md-4">
                <label class="col-form-label" for="password">Password</label>
                <input id="password" name="password" class="form-control" type="password" required/>
            </div>
            <div class="form-group col-md-4">
                <label class="col-form-label" for="password2">Repeat Password</label>
                <input id="password2" name="password2" class="form-control" type="password" required/>
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
            user_name: {
                required: true,
                minlength: 6
            },
            password2: {
                required: true,
                minlength: 6,
                equalTo: "#password",
                maxlength: 30
            }

        },
        messages: {
        }
    };
</script>