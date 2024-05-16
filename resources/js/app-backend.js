// Import all of CoreUI's CSS
import * as coreui from '@coreui/coreui';
window.coreui = coreui;

import "/node_modules/simplebar/dist/simplebar.min.js";
import "/resources/js/laravel.js";
import "/resources/js/backend-custom.js";

// Enable tooltips everywhere
const tooltipTriggerList = document.querySelectorAll('[data-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new coreui.Tooltip(tooltipTriggerEl))

// live clock 
$(function () {
    showTime();
});

function showTime() {
    var d = new Date();
    var localTime = d.getTime();
    var localOffset = d.getTimezoneOffset() * 60000;
    var utc = localTime + localOffset;
    var offset = 4;    //UTC of Dubai is +04.00
    var dubai = utc + (3600000*offset);
    var date = new Date(dubai); 
    
    var hours = date.getHours();
    var minutes = date.getMinutes();
    var seconds = date.getSeconds();

    var session = hours >= 12 ? 'pm' : 'am';

    hours = hours % 12;
    hours = hours ? hours : 12;
    minutes = minutes < 10 ? '0' + minutes : minutes;
    seconds = seconds < 10 ? '0' + seconds : seconds;

    var locale = document.getElementsByTagName("html")[0].getAttribute("lang");
    var time = hours.toLocaleString(locale) + ":" + minutes.toLocaleString(locale) + ":" + seconds.toLocaleString(locale) + " " + session.toLocaleString(locale);
    document.getElementById("liveClock").innerText = time;
    document.getElementById("liveClock").textContent = time;

    setTimeout(showTime, 1000);
}