<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $app_name }}</title>

    <link rel="stylesheet" href="{{ asset('mazer') }}/assets/css/main/app.css">

    <link rel="shortcut icon" href="{{ asset('mazer') }}/assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('mazer') }}/assets/images/logo/favicon.png" type="image/png">
    <link rel="stylesheet" href="{{ asset('mazer') }}/assets/css/pages/fontawesome.css">
    <link rel="stylesheet"
        href="{{ asset('mazer') }}/assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="{{ asset('mazer') }}/assets/css/pages/datatables.css">
    <link rel="stylesheet" href="{{ asset('mazer') }}/assets/extensions/toastify-js/src/toastify.css" />
    <link rel="stylesheet" href="{{ asset('mazer') }}/assets/extensions/sweetalert2/sweetalert2.min.css" />
    <link rel="stylesheet" href="{{ asset('mazer') }}/assets/css/shared/iconly.css" />
    @stack('css')
</head>

<body>
    <div id="app">
        @include('layouts.backend.data.sidebar')
        <div id="main" class='layout-navbar'>
            @include('layouts.backend.data.navbar')
            <div id="main-content">
                <div class="page-heading">
                    @include('layouts.backend.data.breadcrumbs')
                    <section class="section">
                        @yield('content')
                    </section>
                </div>
                @include('layouts.backend.data.footer')
            </div>
        </div>
    </div>
    <script src="{{ asset('mazer') }}/assets/js/bootstrap.js"></script>
    <script src="{{ asset('mazer') }}/assets/js/app.js"></script>

    <script src="{{ asset('mazer') }}/assets/extensions/jquery/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
    <script src="{{ asset('mazer') }}/assets/js/pages/datatables.js"></script>
    <script src="{{ asset('mazer') }}/assets/extensions/toastify-js/src/toastify.js"></script>
    <script src="{{ asset('mazer') }}/assets/js/pages/toastify.js"></script>

    <script src="{{ asset('mazer') }}/assets/extensions/sweetalert2/sweetalert2.min.js"></script>
    <script>
        function hapus(url) {
            Swal.fire({
                title: "{{ __('message.dialog_title') }}",
                text: "{{ __('message.dialog_delete') }}",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: "{{ __('message.dialog_yes') }}",
                cancelButtonText: "{{ __('message.dialog_no') }}",
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                }
            })
        }
    </script>
    @if(session()->has('success'))
        <script>
            Toastify({
                text: "{{ session('success') }}",
                duration: 3000,
                close: true,
                gravity: "top",
                position: "right",
                backgroundColor: "#4fbe87",
            }).showToast()
        </script>
    @endif
    @stack('js')
</body>

</html>
