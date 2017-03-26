<div class="modal about-modal fade" id="myModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
                <h4 class="modal-title">Make Your Reservation Now</h4>
            </div> 
            <div class="modal-body book-form">
                <form action="./logic/book_table.php" method="post">
                    <?php if (!$current_user->id): ?>
                        <div class="phone_email">
                            <label>First Name : </label>
                            <div class="form-text">
                                <span class="fa fa-user" aria-hidden="true"></span>
                                <input type="text" name="first_name" placeholder="First Name" required="">
                            </div> 
                        </div>
                        <div class="phone_email">
                            <label>Last Name : </label>
                            <div class="form-text">
                                <span class="fa fa-user" aria-hidden="true"></span>
                                <input type="text" name="last_name" placeholder="Last Name" required="">
                            </div> 
                        </div>
                        <div class="phone_email phone_email1">
                            <label>Email : </label>
                            <div class="form-text">
                                <span class="fa fa-envelope" aria-hidden="true"></span>
                                <input type="text" name="email" placeholder="Email" required="">
                            </div>
                        </div>
                        <div class="phone_email">
                            <label>Password : </label>
                            <div class="form-text">
                                <span class="fa fa-user" aria-hidden="true"></span>
                                <input type="text" name="password" placeholder="Password" required="">
                            </div> 
                        </div>

                        <div class="phone_email">
                            <label>Phone Number : </label>
                            <div class="form-text">
                                <span class="fa fa-phone" aria-hidden="true"></span>
                                <input type="text" name="phone_no" placeholder="Phone no" required="">
                            </div> 
                        </div> 
                        <div class="phone_email phone_email1">
                            <label>Address : </label>
                            <div class="form-text">
                                <span class="fa fa-map-marker" aria-hidden="true"></span>
                                <input type="text" name="address" placeholder="Your Address" required="">
                            </div> 
                        </div>
                    <?php endif; ?>
                    <div class="clearfix"></div>
                    <div class="agileits_reservation_grid">
                        <div class="span1_of_1">
                            <label>Check In : </label> 
                            <div class="book_date"> 
                                <span class="fa fa-calendar" aria-hidden="true"></span>
                                <input class="date" id="check_in" type="text" name="check_in" required="">
                            </div>					
                        </div>
                        <div class="span1_of_1">
                            <label>Check Out : </label> 
                            <div class="book_date"> 
                                <span class="fa fa-calendar" aria-hidden="true"></span>
                                <input class="date" id="check_out" type="text" name="check_out" required="">
                            </div>					
                        </div>

                        <div class="clearfix"></div>

                        <div class="span1_of_1">
                            <label>Type : </label>
                            <!-- start_section_room -->
                            <div class="section_room">
                                <span class="fa fa-users" aria-hidden="true"></span>
                                <select class="mandeep" name="type" onchange="change_country(this.value)" class="frm-field required sect">
                                    <?php
                                    $options = Facility::find_types();
                                    include './layouts/options_list.php';
                                    ?>
                                </select>
                            </div>	
                        </div>
                        <div class="span1_of_1">
                            <label>No.of People : </label>
                            <!-- start_section_room -->
                            <div class="section_room">
                                <span class="fa fa-users" aria-hidden="true"></span>
                                <select class="mandeep" name="capacity" onchange="change_country(this.value)" class="frm-field required sect">
                                    <option value="1">1 People</option>
                                    <option value="2">2 People</option>
                                    <option value="3">3 People</option>         
                                    <option value="4">4 People</option>
                                    <option value="5">More</option>
                                </select>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div> 
                    <input name="redirect_url" type="hidden" readonly value="<?php echo $_SERVER["REQUEST_URI"]; ?>"/>
                    <input type="submit" value="Book Now" />
                </form>
            </div>
            <!-- Calendar -->
            <link rel="stylesheet" href="css/jquery-ui.css" />
            <script src="js/jquery-ui.js"></script>
            <script>
                                    $(jquery_calendar());
            </script>
            <!-- //Calendar -->  
        </div>
    </div>
</div>
<!-- //modal -->  
<!-- FlexSlider -->
<script defer src="js/jquery.flexslider.js"></script>
<script type="text/javascript">
                                    $(window).load(function () {
                                        $('.flexslider').flexslider({
                                            animation: "slide",
                                            controlsContainer: $(".custom-controls-container"),
                                            customDirectionNav: $(".custom-navigation a")
                                        });
                                    });
</script>