<x-filament-panels::page>
    <div id="calendar" style="height: 75vh; width: 70vw;" class="rounded overflow-hidden mt-4"></div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    events: @json($this->getCalendarEvents()),
                    // add your other FullCalendar options here
                });
                calendar.render();
            });
        </script>
    @endpush

    @livewireScripts
</x-filament-panels::page>
