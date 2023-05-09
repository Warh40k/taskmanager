document.addEventListener('DOMContentLoaded', function() {
    const calendarEl = document.getElementById('calendar')
    const calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'timeGridWeek',
        events: 'get-events?schedule_id=16',
        editable: true,
        selectable: true
    })
    calendar.render()
})