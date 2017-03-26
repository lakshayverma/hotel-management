<?php
$selected_option = (isset($selected_option)) ? $selected_option : 0;
while ($option = current($options)):
    if ($option instanceof DatabaseObject) {
        ?>
        <option title="<?php echo trim($option->title()); ?>" value="<?php echo $option->id; ?>"  <?php echo ($selected_option == $option->id) ? 'selected' : ''; ?> >
            <?php echo trim($option->name()); ?>
        </option>
    <?php } else {
        ?>
        <option value="<?php echo $option; ?>"  <?php echo ($selected_option == $option) ? 'selected' : ''; ?> >
            <?php echo $option; ?>
        </option>
        <?php
    }
    ?>
    <?php
    next($options);
endwhile;
?>
