$(function () {
    var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();

    $('#calendar-holder').fullCalendar({
        header: {
            left: 'prev, next, today',
            center: 'title',
            right: 'month, agendaWeek, agendaDay,'
        },
        lazyFetching: true,
        axisFormat: 'H:mm',

        timeFormat: {
            // for agendaWeek and agendaDay
            agenda: 'H:mm{ - H:mm}',    // 5:00 - 6:30

            // for all other views
            '': 'H:mm{ - H:mm}'         // 7p
        },
        dayClick: function(date, allDay, jsEvent, view) {

            if (allDay) {
                //alert('Clicked on the entire day: ' + date);

                window.open(Routing.generate('tor_rezerwuj', { date: date }), 'window name', 'width=300,height=300,scrollbars=yes');
            } else {
                window.open(Routing.generate('tor_rezerwuj', { date: date }), 'window name', 'width=300,height=300,scrollbars=yes');
            }
        },


            eventSources: [
            {
                url: Routing.generate('fullcalendar_loader'),
                type: 'POST',
                // A way to add custom filters to your event listeners
                data: {
                },
                error: function() {
                   //alert('There was an error while fetching Google Calendar!');
                }
            }
        ]



    });
});
