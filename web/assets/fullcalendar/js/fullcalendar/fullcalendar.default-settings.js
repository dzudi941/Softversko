$(function () {
    $('#calendar-holder').fullCalendar({
        header: {
            left: 'prev, next',
            center: 'title',
            right: 'month, basicWeek, basicDay,'
        },
        lazyFetching: true,
        timeFormat: {
            agenda: 'h:mmt',
            '': 'h:mmt'
        },
        eventStartEditable:{
          default:true
        },
        eventSources: [
            {
                url: '/event/testCalendarEvent',
                type: 'POST',
                data: {},
                error: function () {}
            }
        ],
        eventDrop: function (event, dayDelta, minuteDelta, allDay, revertFunc, jsEvent, ui, view) {
            console.log(event);
        }
        });
});
