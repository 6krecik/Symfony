$(function () {
    var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();
console.log('aac');
    $('#calendar-holder').fullCalendar({
        header: {
            left: 'prev, next',
            center: 'title',
            right: 'month, basicWeek, basicDay,'
        },
        lazyFetching: true,
        timeFormat: {
            // for agendaWeek and agendaDay
            agenda: 'H(:mm)',    // 5:00 - 6:30

            // for all other views
            '': 'H(:mm)'         // 7p
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
