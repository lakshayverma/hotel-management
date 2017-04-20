<pre>
    <?php
    require_once './includes/initialize.php';

    $invoice = Invoice::find_by_id(1);
    $invoice->init_members();
    $orders = Order_booking::find_completed_for_booking($invoice->bookingObj)["response"];
    
    while ($ord = current($orders)){
        print_r($ord);
        echo "<br/>";
        
        next($orders);
    }
    
    ?>
</pre>
