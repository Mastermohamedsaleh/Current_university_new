// resources/js/bootstrap.js

// استيراد Axios للطلبات HTTP
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// استيراد Laravel Echo و Pusher JS
import Echo from "laravel-echo";
import Pusher from "pusher-js";

// ربط Pusher بالمتصفح
window.Pusher = Pusher;

// إنشاء اتصال Laravel Echo مع Pusher
window.Echo = new Echo({
    broadcaster: 'pusher',
    key: 'd44aa666858a5363f137', // حط المفتاح مباشرة للتجربة
    cluster: 'mt1',
    forceTLS: true

});

