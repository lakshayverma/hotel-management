function showPopup(url) {
    newwindow = window.open(url, "Checklist", 'height=480,width=320,top=50,left=200,location=0,resizable');
    if (window.focus) {
        newwindow.focus()
    }
}


function attend_event(invitation_id, status) {
    $.post("./logic/attend.php",
            {
                invitation_id: invitation_id,
                status: status
            },
            function (response) {
                $('#invite-' + invitation_id + " div.response").html(response.msg);
            }, 'json'
            )
}

var previous_booking_id;
function get_details(booking_id,order_more,link_checkout) {
    if(order_more === undefined){
        order_more = true;
    }
    if(link_checkout === undefined){
        link_checkout = true;
    }
    
    $("#booking-" + previous_booking_id).removeClass("active");
    $("#booking-" + booking_id).addClass("active");
    $.post("./logic/booking_details.php",
            {
                id: booking_id,
                order_more: order_more,
                link_checkout: link_checkout
            },
            function (response) {
                $("#booking_details").html(response);
            }
    );
    previous_booking_id = booking_id;
}

function jquery_calendar() {
    format = "yy-mm-dd";
    check_in = $("input#check_in");
    check_out = $("input#check_out");
    $("input#check_in").datepicker()
            .on("change", function () {
                check_out.datepicker("option", "minDate", check_in.val());
            });
    $("input#check_out").datepicker()
            .on("change", function () {
                check_in.datepicker("option", "maxDate", check_out.val());
            });
    check_in.datepicker("option", "dateFormat", format);
    check_out.datepicker("option", "dateFormat", format);

    $("#ui-datepicker-div").hide();
}