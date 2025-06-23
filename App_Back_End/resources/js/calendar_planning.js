import { Calendar } from '@fullcalendar/core'
import dayGridPlugin from '@fullcalendar/daygrid'
import timeGridPlugin from '@fullcalendar/timegrid';
import interactionPlugin from '@fullcalendar/interaction'
import nlLocale from '@fullcalendar/core/locales/nl';

let calendar;

document.addEventListener('DOMContentLoaded', function () {
    const calendarEl = document.getElementById('calendar')

    calendar = new Calendar(calendarEl, {
        plugins: [dayGridPlugin, interactionPlugin, timeGridPlugin],
        locale: nlLocale,
        initialView: 'timeGridWeek',
        selectable: false,
        editable: false, 
        scrollTime: '07:00:00',   
        events: '/planning/shifts',  

        eventDidMount: function (info) {
        const users = info.event.extendedProps.users
        if (users) {
            info.el.title = 'Arbeiders: ' + users
        }
    }
    })

    calendar.render()
    
})




