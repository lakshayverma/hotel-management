<div id="openOrderPanel">
    <script>
        function renderForm() {
            $("#menu_item").select2();
        }
        function quantity_tag(for_item)
        {
            var lable = "<lable>" + for_item + "</lable>";
            return lable + "<input min=\"1\" value=\"1\" name=\"quantity[]\" class=\"form-control\" type=\"number\" required placeholder=\"" + for_item + " Quantity\" />";
        }

        function handle_quantity() {
            var sendBack = "";
            $("#menu_item :selected").each(function () {
                sendBack += quantity_tag($(this).text().trim());
            });
            $("#quantity").html(sendBack);
            console.log(sendBack);
        }

    </script>

    <div id="newOrderForm_modal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <form id="newOrderForm" class="modal-content" method="post" action="./logic/order.php" enctype="multipart/form-data">
                <h2 class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    Order and proceed.
                </h2>
                <div class="modal-body">
                    <label class="col-form-label" for="menu_item">Menu Item</label>

                    <label class="col-form-label" for="menu_item">Items in your order</label>
                    <select id="menu_item" name="menu_item[]" class="form-control" multiple required onchange="handle_quantity();">
                        <?php
                        $options = Menu::find_all();
                        include '../layouts/options_list.php';
                        ?>                    
                    </select>

                    <label class="col-form-label" for="quantity">Quantity</label>
                    <div id="quantity">
                        Select a Menu Item to continue...
                    </div>
                </div>
                <input name="booking" type="hidden" readonly value="<?php echo $current_booking->id; ?>"/>
                <input name="redirect_url" type="hidden" readonly value="<?php echo $_SERVER["SERVER_NAME"] . "/mannhotel/my_booking.php"; ?>"/>
                <div class="modal-footer">
                    <button class="btn btn-success" type="submit">
                        <span class="glyphicon glyphicon-cutlery"></span>Order Now
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>