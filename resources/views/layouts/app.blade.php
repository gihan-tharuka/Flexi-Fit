@include('layouts.head')


<body class="font-sans antialiased">

    {{-- @livewire('navigation-menu') --}}
    @include('layouts.navbar')

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>




    @include('layouts.footer')



    @include('layouts.bottom-nav ')




    <!-- component -->
    <link rel="stylesheet"
        href="{{ url('https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}">


    {{-- pwa script start --}}
    <script src="{{ asset('/sw.js') }}"></script>
    <script>
        if ("serviceWorker" in navigator) {
            // Register a service worker hosted at the root of the
            // site using the default scope.
            navigator.serviceWorker.register("/sw.js").then(
                (registration) => {
                    console.log("Service worker registration succeeded:", registration);
                },
                (error) => {
                    console.error(`Service worker registration failed: ${error}`);
                },
            );
        } else {
            console.error("Service workers are not supported.");
        }
    </script>
    {{-- pwa script end --}}

    @stack('modals')
    @livewireScripts

<script>
    navigator.serviceWorker.register("{{URL::asset('service-worker.js')}}");


        Notification.requestPermission().then((permission) => {
            if (permission === 'granted') {
                navigator.serviceWorker.ready.then((sw) => {
                    sw.pushManager.subscribe({
                        userVisibleOnly: true,
                        applicationServerKey: "BFT0mbmT0C7jz1wieAxMEN19NUVJPNaZrbEj20qm2VF7hlOHhIzQqAuMBfFIrkCRNpUd8lNO3_smXhI9cpxuzBk"
                    }).then((subscription) => {
                        console.log(subscription);
                        saveSub(JSON.stringify(subscription));
                    });
                });
            }
        });
function saveSub(sub){
    $.ajax({
        type: 'post',
        url: '{{URL('save-push-notification-sub')}}',
        data: {
            '_token': "{{csrf_token()}}",
            'sub': sub
        },
        success: function (data) {
            console.log(data);
        }
    })
}

</script>

</body>

</html>

{{--Public Key:--}}
{{--BFT0mbmT0C7jz1wieAxMEN19NUVJPNaZrbEj20qm2VF7hlOHhIzQqAuMBfFIrkCRNpUd8lNO3_smXhI9cpxuzBk--}}

{{--Private Key:--}}
{{--bTTs2WSJ823qZYpumH4fJzWgkcN9fy8EfBVSdwoBZT0--}}
