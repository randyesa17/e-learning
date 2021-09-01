$(document).ready(function () {

    var calendar = $('#calendar').fullCalendar({
        editable: true,
        eventSources: [

            // your event source


            // any other sources...

        ],
        color: 'yellow',    // an option!
        textColor: 'black',  // an option!
        // events: site_url + "/jadwal/isi",
        displayEventTime: false,
        editable: false,
        eventRender: function (event, element, view) {
            if (event.allDay === 'true') {
                event.allDay = true;
            } else {
                event.allDay = false;
            }
        },
        selectable: true,
        selectHelper: true,
    });

});

function displayMessage(message) {
    toastr.success(message, 'Event');
}