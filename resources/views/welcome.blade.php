<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="https://i0.wp.com/it-solutions.center/wp-content/uploads/2021/12/what-is-bootstrap-logo.png?fit=400%2C335&ssl=1"
                            width="30" height="30" class="d-inline-block align-top" alt="">
                        Navbar</a>
                </div>
                <div class="navbar-nav">
                    @if (Route::has('login'))
                        <div class="d-flex align-items-center">
                            @auth
                                <a class="nav-link active" aria-current="page" href="{{ url('/dashboard') }}">Home</a>
                            @else
                                <a class="nav-link" href="{{ route('login') }}">Log in</a>
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <div class="d-flex" style="height: 90vh;">
        <div class="align-items-center" style="width: 100%;">
            <div class="p-5 w-50"
                style="background-image: url('https://i.pinimg.com/564x/86/cc/70/86cc70298aac723dc451fed72f3a7ae4.jpg');height: 50%;">
            </div>
            <h1 class="text-center display-1" style="margin-top: -30vh;">Welcome page!</h1>
        </div>
    </div>

</body>

</html>
