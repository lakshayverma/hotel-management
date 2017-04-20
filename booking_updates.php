<?php include './layouts/header.php'; ?>


<div class="container-fluid">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 style="display: inline-block; margin-right: 32px;">Input Booking ID to process</h3>
            <div class="form-inline" style="display: inline-block;">
                <input class="form-control" id="order" type="text"> <button class="btn btn-success" onclick="lala()">Go</button>
            </div>
        </div>
        <div class="panel-body">
            <style>
                a.bill{
                    position: relative;
                }
            </style>
            <div id="bookingRes"></div>
        </div>
    </div>
</div>
<script>
    function lala() {
        var order_id = $("#order").val();
        url = "./logic/booking_details.php";
        data = {
            id: order_id,
            link_checkout: false,
            order_more: false,
            editing: true
        };
        $.post(url, data, function (res) {
            process(res);
        });
    }

    function process(data) {
        $("#bookingRes").html(data);
    }
</script>

<?php include './layouts/footer.php'; ?>