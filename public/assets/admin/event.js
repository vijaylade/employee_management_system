$(document).ready(function() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var calendar = $('#calendar').fullCalendar({
        editable: true,
        events: "/view-events",
        displayEventTime: true,
        eventRender: function(event, element) {
            element.find('.fc-title').html(event.title); 
        },
        selectable: true,
        selectHelper: true,
        select: function(start_date, end_date, allDay) {
            var title = prompt('Event Title:');
            if (title) {
                var formatted_start_date  = $.fullCalendar.formatDate(start_date, "Y-MM-DD");
                var formatted_end_date  = $.fullCalendar.formatDate(end_date, "Y-MM-DD");
                $.ajax({
                    url: "/fullcalenderAjax",
                    data: {
                        title: title,
                        start_date: formatted_start_date,
                        end_date: formatted_end_date,
                        type: 'add'
                    },
                    type: "POST",
                    success: function(data) {
                        displayMessage("Event Created Successfully");

                        calendar.fullCalendar('renderEvent', {
                            id: data.id,
                            title: title,
                            start: formatted_start_date,
                            end: formatted_end_date,
                            allDay: allDay
                        }, true);

                        calendar.fullCalendar('unselect');
                    }
                });
            }
        },
        eventDrop: function(event) {
            var start_date = $.fullCalendar.formatDate(event.start_date, "Y-MM-DD");
            var end_date = $.fullCalendar.formatDate(event.end_date, "Y-MM-DD");

            $.ajax({
                url: '/fullcalenderAjax',
                data: {
                    title: event.title,
                    start_date: start_date,
                    end_date: end_date,
                    id: event.id,
                    type: 'update'
                },
                type: "POST",
                success: function(response) {
                    displayMessage("Event Updated Successfully");
                }
            });
        },
        eventClick: function(event) {
            var deleteMsg = confirm("Do you really want to delete?");
            if (deleteMsg) {
                $.ajax({
                    type: "POST",
                    url: '/fullcalenderAjax',
                    data: {
                        id: event.id,
                        type: 'delete'
                    },
                    success: function(response) {
                        calendar.fullCalendar('removeEvents', event.id);
                        displayMessage("Event Deleted Successfully");
                    }
                });
            }
        }

    });

});

function displayMessage(message) {
    toastr.success(message, 'Event');
}