import './bootstrap';
import './calendar';
import Echo from 'laravel-echo';
import io from 'socket.io-client';

window.io = io;


window.Echo = new Echo({
    broadcaster: 'reverb',
    key: '', // Not needed for Reverb
    wsHost: window.location.hostname,
    wsPort: 8080,
    wssPort: 8080,
    forceTLS: false,
    disableStats: true,
});