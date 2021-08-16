/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './src/main.js'

import Echo from 'laravel-echo';

window.Pusher = require('pusher-js');

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: 'myKey',
    wsHost: "admissionjockey.com/ws/",
    // authEndpoint: 'http://206.189.137.226:8000/broadcasting/auth',
    encrypted: true,
    forceTLS: true,
    wsPort: "",
    wssPort: "",
    disableStats: true,
    enabledTransports: ['ws','wss'],
    // disableTransports: ['wss']
});

document.addEventListener('contextmenu', event => event.preventDefault());
// document.onkeydown = function(e) {
//     if(event.keyCode == 123) {
//         return false;
//     }
//     if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
//         return false;
//     }
//     if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
//         return false;
//     }
//     if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
//         return false;
//     }
//     if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
//         return false;
//     }
// }
