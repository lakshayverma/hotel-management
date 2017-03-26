<?php
$nav_only = TRUE;
$title = "Checkout";
include './layouts/header.php';
members_only();
$current_booking = Booking::find_by_id($session->current_booking());
if ($current_booking->id):
    $current_booking->init_members();
    $invoice = Invoice::make_for_booking($current_booking);
    ?>
    <section class="container-fluid">
        <article class="panel panel-default col-md-8 col-md-offset-2">
            <div id="booking_details" class="panel-body"></div>
        </article>
        <article id="checkout" class="panel panel-primary col-md-8 col-md-offset-2">
            <header class="panel-heading">
                <h3>Checkout.</h3>
            </header>
            <div class="panel-body">
                <blockquote>
                    All bills are system generated, you just need to press Pay and Relax.
                </blockquote>
                <footer class="panel-footer">                
                    <form class="btn-group col-md-8 col-md-offset-2">
                        <select class="form-control" id="coupon" name="coupon">
                            <?php
                            $options = Discount_coupons::find_appropriate_for($current_user);
                            include './layouts/options_list.php';
                            ?>
                        </select>
                        <button type="submit" class="btn btn-primary">
                            <span class="glyphicon glyphicon-check"></span>
                            <span>Checkout and Pay <?php echo $current_booking->bill(); ?></span>
                        </button>
                        <a href="#booking_details" class="btn btn-danger">
                            <span class="glyphicon glyphicon-arrow-up"></span>
                            <span>Recheck the expenses.</span>
                        </a>
                    </form>
                </footer>
            </div>
        </article>
    </section>

<?php endif; ?>
<script>
    get_details(<?php echo $current_booking->id; ?>, false, false);
    $("#coupon").select2();
</script>
<?php include './layouts/footer.php'; ?>
