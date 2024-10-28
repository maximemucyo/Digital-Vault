import Echo from "laravel-echo"

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: '65db8d333bfaf7067936',
    cluster: 'ap2',
    encrypted: true
});

// app_id = "1858660"
// key = "65db8d333bfaf7067936"
// secret = "2fb14f62e7e9f08c7f0e"
// cluster = "ap2"