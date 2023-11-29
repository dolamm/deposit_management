import Echo from 'laravel-echo';
import 'socket.io-client/dist/socket.io.js';
window.Echo = new Echo({
    broadcaster: 'socket.io',
    host: "127.0.0.1" + ":6001",
})

