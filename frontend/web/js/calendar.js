document.addEventListener('DOMContentLoaded', function() {

    const calendarEl = document.getElementById('calendar')
    // var [object_id, field, classname] = [calendarEl.dataset.id, calendarEl.dataset.field, calendarEl.dataset.classname]
    var object_id = typeof calendarEl.dataset.id !== 'undefined' ? calendarEl.dataset.id : '';
    var field = typeof calendarEl.dataset.field !== 'undefined' ? calendarEl.dataset.field : '';
    var classname = typeof calendarEl.dataset.classname !== 'undefined' ? calendarEl.dataset.classname : '';
    cmd = '/' + [classname, 'get-events?'].join('/') + [field,object_id].join('=');
    const calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'timeGridWeek',
        events: cmd,
        editable: false,
        slotMinTime: '07:00:00',
        slotMaxTime: '21:00:00',
        selectable: true
    })
    calendar.render()
})