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

        monthNames: ['Styczeń','Luty','Marzec','Kwiecień','Maj','Czerwiec','Lipiec','Sierpień','Wrzesień','Październik','Listopad','Grudzień'],
        monthNamesShort: ['Sty','Lut','Mar','Kwi','Maj','Cze','Lip','Sie','Wrz','Paź','Lis','Gru'],
        dayNames: ['Niedziela','Poniedziałek','Wtorek','Środa','Czwartek','Piątek','Sobota'],
        dayNamesShort: ['Nie','Pon','Wto','Śro','Czw','Pią','Sob'],
        buttonText: {
            today: 'Dzisiaj',
            month: 'Miesiąc',
            day: 'Dzień',
            week: 'Tydzień'
        },

        dayClick: function(date, allDay, jsEvent, view) {

            if (allDay) {
                //alert('Clicked on the entire day: ' + date);

                window.open(Routing.generate('tor_rezerwuj', { date: date }), 'window name', 'width=300,height=300,scrollbars=yes');
            } else {
                window.open(Routing.generate('tor_rezerwuj', { date: date }), 'window name', 'width=300,height=300,scrollbars=yes');
            }
        },

        viewDisplay: function (view) {
            $('.fc-content').find('td').css('cursor', 'pointer');
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
