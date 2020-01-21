<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Laravel Basic 5.8')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        .alert {
            z-index: 99;
            top: 60px;
            right: 18px;
            min-width: 30%;
            position: fixed;
            animation: slide 0.5s forwards;
        }

        @keyframes slide {
            100% {
                top: 30%;
            }
        }

        /*Center the alert on small screens*/

        @media screen and (max-width: 668px) {
            .alert {
                left: 10px;
                right: 10px;
            }
        }
    </style>
</head>
<body>
@include('inc.navbar')
<main class="container mt-4">
    @yield('content')
</main>
@include('inc.footer')
<script src="{{ asset('js/app.js') }}"></script>
@if(session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('status') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<script>
    $(document).ready(function () {
        setTimeout(function () {
            $('.alert').alert('close');
        }, 3000);
    });
</script>
</body>
</html>
