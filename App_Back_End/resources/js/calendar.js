import { Calendar } from '@fullcalendar/core'
import dayGridPlugin from '@fullcalendar/daygrid'
import interactionPlugin from '@fullcalendar/interaction'
import nlLocale from '@fullcalendar/core/locales/nl';

let selectedDateRange = null;
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
            selectedDateRange = {
                start: info.startStr,
                end: info.endStr
            } 
        },
        events: '/api/availability',  
    })

    calendar.render()
})

document.getElementById('available').addEventListener('click', function(){
    if (!selectedDateRange) return alert('Geen datum geselecteerd');

    sendAvailabilityForRange(selectedDateRange, 1); 
});

document.getElementById('unavailable').addEventListener('click', function () {
    if (!selectedDateRange) return alert('Geen datum geselecteerd');

    sendAvailabilityForRange(selectedDateRange, 0);
});

function sendAvailabilityForRange(dateRange, available) {
    // Generate array of dates between start and end
    const dates = getDatesInRange(dateRange.start, dateRange.end);
    
    // Send availability for each date
    const promises = dates.map(date => {
        return fetch('/api/availability', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({
                date: date,
                available: available
            })
        });
    });

    // Wait for all requests to complete
    Promise.all(promises)
        .then(responses => {
            // Check if all responses are ok
            const allSuccessful = responses.every(res => res.ok);
            if (allSuccessful) {
                calendar.refetchEvents();
            } else {
                throw new Error('Some requests failed');
            }
        })
        .catch(err => {
            console.error(err);
            alert('Er is iets misgegaan.');
        });
}

function getDatesInRange(startDate, endDate) {
    const dates = [];
    const start = new Date(startDate);
    const end = new Date(endDate);
    
    // FullCalendar's endStr is exclusive, so we need to go one day before
    end.setDate(end.getDate() - 1);
    
    const current = new Date(start);
    
    for (let d = new Date(start); d <= end; d.setDate(d.getDate() + 1)) {
        dates.push(d.toISOString().split('T')[0]); // YYYY-MM-DD format
    }
    
    return dates;
}
