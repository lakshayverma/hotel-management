<article class="panel">
    <?php
    require_once '../includes/initialize.php';

    $order_more = (isset($_POST['order_more']) && strtolower($_POST['order_more'] == 'true')) ? TRUE : FALSE;
    $link_checkout = (isset($_POST['link_checkout']) && strtolower($_POST['link_checkout'] == 'true')) ? TRUE : FALSE;
    $current_booking = Booking::find_by_id($_POST['id']);
    if ($current_booking):
        $session->current_booking($current_booking->id);
        $current_booking->init_members();
        $past_checkout = $current_booking->past_checkout();
        if ($past_checkout) {
            $order_more = FALSE;
        }
        ?>
        <h1 class="panel-heading">
            <?php echo $current_booking->name(); ?>
        </h1>
        <section class = "panel-body">
            <h4 class = "heading" ><?php echo $current_booking->check_in() . " to " . $current_booking->check_out();
            ?></h4>
            <?php
            if ($current_booking->invoiceObj instanceof Invoice) {
                ?>
                <h4 class="subheading">
                    ==
                    <span class="text small simple">You checked out at</span> <span class="text text-primary glyphicon glyphicon-calendar"></span>
                    <strong>
                        <span class="text text-primary simple"><?php echo $current_booking->invoiceObj->generation_date(); ?></span>
                    </strong>
                    ==
                </h4>

                <a target="_newWindow" href="view_bill.php?bill=<?= $current_booking->invoiceObj->id; ?>" class="btn btn-primary btn-sm">View Invoice</a>
                <?php
            } else {
                if ($link_checkout) {
                    ?>

                    <?php if ($past_checkout) {
                        ?>
                        <p class="alert alert-danger">
                            You should have checked out by now!
                        </p>
                        <?php
                    }
                    ?>
                    <a href = "checkout.php" class = "btn btn-primary pad-8 mar-8">
                        Checkout <span class = "glyphicon glyphicon-log-out"></span>
                    </a>

                    <?php
                }
                if ($order_more) {
                    ?>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#newOrderForm_modal" onclick="setTimeout(renderForm, 200);">
                        <span class="glyphicon glyphicon-cutlery"></span> Order Something
                    </button>
                    <?php
                    include '../layouts/new_order.php';
                }
            }
            ?>


            <h4 class="subheading">Orders</h4>
            <a class="bill" href="#checkout">
                <small><span class="glyphicon glyphicon-file"></span></small><?php echo $current_booking->bill(); ?>
            </a>
            <?php $orders = $current_booking->orders; ?>
            <ul class="list-group orders-list">
                <?php while ($order = current($orders)): ?>
                    <li class="list-group-item list-group-item-heading">
                        <h5>
                            <strong><?php echo $order->name(); ?></strong>
                        </h5>
                        <div class="bill">
                            <small><span class="glyphicon glyphicon-cutlery"></span></small> ₹<?php echo $order->bill; ?>/-
                        </div>
                        <ul class="list-group bookings">
                            <?php while ($menu_item = current($order->contents)): ?>
                                <li class="list-group-item list-group-item-<?php echo $menu_item->item_class(); ?>">
                                    <span>
                                        <?php echo $menu_item->name(); ?>
                                    </span>
                                    Quantity:<strong> <?php echo $menu_item->quantity; ?></strong>
                                    <?php
                                    if (isset($_POST['editing']) && $_POST['editing'] == 'true'):
                                        ?>
                                        <select id="menu_order_<?= $menu_item->id; ?>" onchange="change_order_status(this);">
                                            <?php
                                            $options = Order_contents::order_status();
                                            $selected_option = $menu_item->status;
                                            include '../layouts/options_list.php';
                                            ?>
                                        </select>
                                        <div style="display: inline-block;" id="text_<?= $menu_item->id; ?>"></div>

                                        <?php
                                    else:
                                        ?>
                                        <small>Status: <em>(<?php echo $menu_item->status; ?></em>)</small>

                                    <?php endif; ?>
                                </li>
                                <?php
                                next($order->contents);
                            endwhile;
                            ?>
                        </ul>
                    </li>
                    <?php
                    next($orders);
                endwhile;
                ?>
            </ul>
        </section>
    <?php else: ?>
        <h1>Select a valid booking....</h1>
    <?php endif; ?>
</article>


<script>

    var current_or;
    var order_id;
    function change_order_status(order) {
        current_or = order.id;
        order_id = current_or.substr(current_or.lastIndexOf("_") + 1, current_or.length);
        url = "./logic/update_order.php";
        data = {
            content_id: order_id,
            content_status: $("#" + current_or).val()
        };

        $.post(url, data, function (response) {
            console.log(response.updated);
            console.log(response);
            var span = "#text_" + order_id;
            console.log(span);
            var html;
            if (response.updated) {
                html = "<span class=\"text-success\">Updated " + order_id + "</span>";
                $(span).html(html);
            } else {
                html = "<span class=\"text-danger\">Failed" + order_id + "</span>";
                $(span).html(html);
            }
        }, "json");


    }
</script>