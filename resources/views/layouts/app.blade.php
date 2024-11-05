{{-- Set default value for variable, if no value is passed --}}
@props(['title' => 'Page'])

<!doctype html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="{{ asset('/lib/fontawesome-free-6.5.1-web/css/all.css') }}">
    <!-- Bootstrap CSS file -->
    <link rel="stylesheet" href="{{ asset('/lib/bootstrap-5.3.3-dist/css/bootstrap.rtl.min.css') }}">

    <!-- Fonts CSS file -->
    <link rel="stylesheet" href="{{ asset('/css/fonts.css') }}">

    <link rel="stylesheet" href="{{ asset('/css/style.css?ver='.time()) }}">
    {{-- <link rel="stylesheet" href="{{ asset('/css/style.css?ver=9') }}"> --}}

    <link rel="icon" type="image/png" href="{{ asset('/favicon.png') }}">

    <title>{{ $title }}</title>
</head>

<body>

    {{-- Bootstrap JS file --}}
    <script src="{{ asset('lib/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js') }}"></script>

    {{-- jQuery --}}
    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>

    {{-- Custom js --}}
    <script src="{{ asset('js/script.js?ver=0.0.0004') }}"></script>

    <main>
        @if (session('alert'))
        {{-- Display alert if alert exists in session --}}
        <div class="container-fluid">
            <div class="row text-center justify-content-center">
                <div class="col-11 my-2">
                    <div class="alert alert-info alert-dismissible fade show my-1" role="alert">
                        {{ session('alert') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <!-- <div class="container-fluid gx-0"> -->
            {{-- Page Content : --}}
            {{ $slot }}
        <!-- </div> -->
    </main>

    <x-navbar />

</body>

</html>