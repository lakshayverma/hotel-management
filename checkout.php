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

                    <table class="table table-hover">
                        <tr>
                            <td>
                                Estimated Bill
                            </td>
                            <td>
                                <?= SITE_CURRENCY . $current_booking->bill . "/-"; ?>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                Billed Amount
                                <em>(Items that were delivered + Room Charges)</em>
                            </td>
                            <td>
                                <?= SITE_CURRENCY . $invoice->total_amount . "/-"; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Apply a coupon
                            </td>

                            <td>
                                <select class="form-control" id="coupon" name="coupon" onchange="calculate_bill()">
                                    <option value="">Select a discount coupon</option>
                                    <?php
                                    $options = Discount_coupons::find_appropriate_for($current_user);
                                    include './layouts/options_list.php';
                                    ?>
                                </select>

                                <script>
                                    var bill = <?= $invoice->total_amount; ?>;
                                    function calculate_bill() {
                                        var cpn = $("#coupon").val();
                                        if (cpn !== "") {
                                            var url = "./logic/coupon_validations.php";
                                            var data = {
                                                coupon: cpn,
                                                booking: <?= $current_booking->id; ?>,
                                                amount: bill
                                            };

                                            $.post(url, data, function (data) {
                                                if (!data.error) {
                                                    var am = "₹" + data.bill + "/-";
                                                    
                                                    $("#coupon_id").val(cpn);
                                                    $("#amount").val(data.bill);

                                                    $(".ammount_payable").html(am);
                                                } else {
                                                    $(".ammount_payable").html(bill);
                                                    alert(data.msg);
                                                }
                                            }, 'json');

                                        }

                                    }
                                </script>

                            </td>
                        </tr>
                        <tr>
                            <td>After Discounts</td>
                            <td class="ammount_payable">
                                <?= SITE_CURRENCY . $invoice->amount_payable . "/-"; ?>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <a href="#booking_details" class="btn btn-info">
                                    <span class="glyphicon glyphicon-arrow-up"></span>
                                    <span>Recheck the expenses.</span>
                                </a>
                            </td>
                            <td>
                                <form action="./logic/checkout.php" method="post">
                                    <input id="amount" name="amount" type="hidden"/>
                                    <input id="coupon_id" name="coupon_id" type="hidden"/>
                                    <input id="booking_id" name="booking_id" type="hidden" value="<?=$current_booking->id;?>"/>
                                    <button type="submit" class="btn btn-primary">
                                        <span class="glyphicon glyphicon-check"></span>
                                        Pay <span class="ammount_payable"><?= SITE_CURRENCY . $invoice->amount() . "/-"; ?></span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    </table>
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
