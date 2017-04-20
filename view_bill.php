<?php
include './layouts/header.php';

$invoice_id = isset($_GET['bill']) ? $_GET['bill'] : false;
$invoice = Invoice::find_by_id($invoice_id);
$invoice->init_members();
$orders = Order_booking::find_completed_for_booking($invoice->bookingObj)["response"];
?>


<style>
    h4.row.header span{
        font-weight: 700;
    }
    #order_time,#order_id,.bolder{
        font-weight: 600;
    }

    article.table{
        padding: 1em;
    }

    .table_heading{
        background: #f9f9f9;
        padding-top: 16px;
        padding-bottom: 8px;
        box-shadow: 0px 2px 2px rgba(0,0,0,0.05);
    }

    .bigger{
        font-size: 1.3em;
    }

    div.table.order_contents{
        background: #fcfcfc;
        margin-top: 8px;
    }

    .order_item{
        padding: 16px;
    }

    #invoice_header{
        margin-top: 1em;
        padding: 2em;
        background: #a97e13;
        color: white;
    }

    #invoice_header h2{
        margin-bottom: 1em;
        padding-bottom: 0.5em;
        border-bottom: 1px solid #e2a91b;
    }

    #final_settlement{
        padding: 2em;
        border: 2px dashed darkgoldenrod;

    }
    #final_settlement span.row:first-child, #final_settlement span.row:last-child{
        color: darkgoldenrod;
        font-weight: 800;
        font-size: 1.3em;
        font-family: serif;
    }
    #final_settlement span.row:first-child *{
        padding: 1.5em;
        border-bottom: 1px solid darkgoldenrod;
    }
    #final_settlement span.row:last-child *{
        padding: 1.5em;
        border-top: 1px solid darkgoldenrod;
    }

    button#printer{
        position: fixed;
        right: 48px;
        top: 96px;
    }


</style>

<button onclick="printContent();" id="printer">
    Print Invoice Copy
</button>

<div class="container" id="invoice">

    <div class="col-md-offset-1 col-md-10">

        <article id="invoice_header">
            <h2 class="row"><?= $invoice->name(); ?></h2>           
            <h3 class="row">
                <span class="col-md-6 text-right">Billed</span> <span class="col-md-6 text-right">₹<?= $invoice->total_amount; ?>/-</span>
            </h3>
        </article>

        <article class="table table-bordered table-hover table-striped">

            <h4 class="row">
                <span class="col-md-2">Order Id</span>
                <span class="col-md-10">Order On</span>            
            </h4>
            <span class="row text-right">Orders placed during the booking period</span>
            <?php while ($order = current($orders)): ?>
                <div class="row table_heading">
                    <span class="col-md-2" id="order_id">
                        <?= $order->id ?>
                    </span>
                    <span class="col-md-10" id="order_time">
                        <?= DatabaseObject::format_datetime("d M Y h:i a", $order->date) ?>
                    </span>
                </div>
                <div class="col-md-offset-2">
                    <div class="table order_contents">
                        <?php
                        $contents = $order->contents;
                        $first_row = true;
                        while ($content = current($contents)):
                            ?>
                            <?php
                            if ($first_row):
                                ?>
                                <div class="row table_heading">
                                    <strong class="col-md-1">Quantity</strong>
                                    <strong class="col-md-6">Item</strong>
                                    <strong class="col-md-3">Amount</strong>
                                </div>
                                <?php
                                $first_row = false;
                            endif;
                            ?>

                            <div class="row order_item">
                                <span class="col-md-1"><?= $content->quantity; ?></span>
                                <span class="col-md-6"><?= $content->itemObj->item; ?></span>
                                <span class="col-md-3">₹<?= $content->bill(); ?>/-</span>
                            </div>
                            <?php
                            next($contents);
                        endwhile;
                        ?>
                    </div>
                </div>
                <?php
                next($orders);
            endwhile;
            ?>
            <section id="final_settlement">
                <span class="row">                    
                    <span class="col-md-5">Invoice Status</span>
                    <span class="col-md-5"><?= $invoice->status(); ?></span>
                </span>
                <span class="row">
                    <span class="col-md-5">Stay at <?= $invoice->bookingObj->facilityObj->name(); ?></span>
                    <span class="col-md-5"><em>₹<?= $invoice->bookingObj->facilityObj->charges ?>/-</em> per day.</span>
                </span>
                <span class="row">                    
                    <span class="col-md-5">Your stay was for</span>
                    <span class="col-md-5"><?= $invoice->bookingObj->stay_period(); ?> days.</span>
                </span>

                <span class="row">
                    <span class="col-md-5">Total amount for the Facility</span>
                    <span class="col-md-5"><strong>₹<?= $invoice->bookingObj->charges(); ?>/-</strong></span>
                </span>


                <big class="row">
                    <span class="col-md-5">Total amount for the Booking <br> (<small>including Facility and Orders</small>)</span>
                    <span class="col-md-5">₹<?= $invoice->total_amount; ?>/-</span>
                </big>


                <span class="row">
                    <span class="col-md-5">Coupon Applied</span>
                    <span class="col-md-5"><?= $invoice->discountObj->name(); ?></span>
                </span>
                <span class="row">
                    <span class="col-md-5">Amount Paid after Discounts</span>
                    <span class="col-md-5">₹<?= $invoice->amount_payable; ?>/-</span>
                </span>
            </section>
        </article>
    </div>
</div>

<script>
    function printContent() {
        $("#page_header").hide();
        $("#page_footer").hide();
        $("button#printer").hide();
        window.print();
        $("#page_header").show();
        $("#page_footer").show();
        $("button#printer").show();
    }
</script>

<?php include './layouts/footer.php'; ?>