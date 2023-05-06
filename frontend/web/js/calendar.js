document.addEventListener('DOMContentLoaded', function() {
    const calendarEl = document.getElementById('calendar')
    const calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        events: 'https://fullcalendar.io/api/demo-feeds/events.json',
        editable: true,
        selectable: true
    })
    calendar.render()
})