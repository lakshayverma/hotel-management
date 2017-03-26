<?php
$table = (isset($_GET["table"])) ? $_GET["table"] : "person";
$page_title = "Listing " . ucwords($table) . " table";

$nav_only = TRUE;
include './layouts/header.php';
admins_only();
?>
<div class="container-fluid">
    <?php
    global $database;
    if ($table) {
        $table_records = $table::find_all();
    }
    ?>
    <nav class="navbar">
        <div class="navbar-header">
            <a class="navbar-toggle" data-toggle="collapse" data-target="#table_list">
<!--                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>-->
                <span class="glyphicon glyphicon-chevron-down"></span>
            </a>
            <a class="navbar-brand" href="#">Tables </a>
        </div>
        <div id="table_list" class="navbar-collapse collapse" data-spy="affix" data-offset-top="300">
            <ul class="nav navbar-nav">
                <?php
                $tables = get_all_tables();
                while (($rec = current($tables)) !== FALSE):
                    ?>
                    <li class=" <?php if (strcasecmp($table, key($tables)) == 0) echo "current active"; ?>">
                        <a href="?table=<?php echo key($tables); ?>"><?php echo ucfirst(key($tables)); ?></a>
                    </li>
                    <?php
                    next($tables);
                endwhile;
                ?>
            </ul>
        </div>
    </nav>
    <article id="details" class="panel panel-info">
        <h3 class="panel-heading"><?php echo ucfirst($table); ?></h3>
        <div class="table-responsive">
            <?php
            if ($table_records) {
                include '/layouts/table_render.php';
            } else {
                ?>
                <p class="text-danger">
                <big>No records found...</big>
                Try other tables
                </p>
            </div>
        <?php }; ?>

    </article>

    <?php
    $formFile = "./tableForms/{$table
            }_form.php";
    if (file_exists($formFile)) {
        include $formFile;
        $form = TRUE;
    } else {
        $form = FALSE;
        ?>
        <div class="container-fluid">
            <h4 class="text-danger">
                Could not find the Form for inserting new rows.
            </h4>
        </div>
        <?php
    }
    ?>
    
</div>

<?php include './layouts/footer.php'; ?>

<?php if ($form): ?>
    <script>
        $("#form").validate(formRules);        
        $("#form select").select2();
        $("#form .row:last").append("<a class=\"btn btn-default\" href=\"./list_tables.php?table=<?php echo $table;?>\">Insert a new Record</a>");
    </script>
<?php endif; ?>