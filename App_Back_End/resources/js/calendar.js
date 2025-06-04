import { Calendar } from '@fullcalendar/core'
import dayGridPlugin from '@fullcalendar/daygrid'
import interactionPlugin from '@fullcalendar/interaction'
import nlLocale from '@fullcalendar/core/locales/nl';

let selectedDate = null;
let calendar;

//Checks if a date is selected
document.addEventListener('DOMContentLoaded', function () {
    const calendarEl = document.getElementById('calendar')

    calendar = new Calendar(calendarEl, {
        plugins: [dayGridPlugin, interactionPlugin],
        locale: nlLocale,
        initialView: 'dayGridMonth',
        selectable: true,
        select: function (info) {
            selectedDate = info.startStr; 
        },
        events: '/availability/data',  
    })

    calendar.render()
})

// Activated when 'Beschikbaar' button is clicked
document.getElementById('available').addEventListener('click', function(){
    if (!selectedDate) return alert('Geen datum geselecteerd');

    sendAvailability(selectedDate, 1); 
});

// Activated when 'Niet Beschikbaar' button is clicked
document.getElementById('unavailable').addEventListener('click', function () {
    if (!selectedDate) return alert('Geen datum geselecteerd');

    sendAvailability(selectedDate, 0);
});

function sendAvailability(date, available) {
    fetch('/availability', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({
            date: date,
            available: available
        })
    })
    .then(res => res.json())
    .then(data => {
        alert('Informatie opgeslagen!');
        calendar.refetchEvents();  
    })
    .catch(err => {
        console.error(err);
        alert('Er is iets misgegaan.');
    });
}
