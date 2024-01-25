<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    @yield('head')
</head>

<body class="d-flex flex-column min-vh-100 w-100">
    {{-- Navbar --}}
    <header>
        <div class="d-flex flex-row justify-content-center align-items-center gap-5 px-4 py-2 bg-success">
            <div class="">
                <h1>Amazing E-Grocery</h1>
            </div>
    
            @yield('authButton')
            @auth
                @if (auth()->user()->role_id == 1 || auth()->user()->role_id == 2)
                    <div class="d-flex gap-5 px-2 bg-warning">
                        <a href="{{ route('logout') }}" class="text-decoration-none">
                            <p class="text-black">Logout</p>
                        </a>
                    </div>
                @endif
            @endauth
        </div>

        @auth
        <div class="bg-warning">
            <ul class="d-flex flex-row justify-content-center gap-5 py-2">
                <li class="list-unstyled mx-5">
                    <a href="/home" class="fs-4 text-black fw-semibold text-decoration-none">Home</a>
                </li>
                <li class="list-unstyled mx-5">
                    <a href="/cart" class="fs-4 text-black fw-semibold text-decoration-none">Cart</a>
                </li>
                <li class="list-unstyled mx-5">
                    <a href="/account_profile" class="fs-4 text-black fw-semibold text-decoration-none">Profile</a>
                </li>
                @if(Auth::user()->role_id == 2)
                    <li class="list-unstyled mx-5"><a href="/account_maintanance" class="fs-4 text-black fw-semibold text-decoration-none">Account Maintanance</a></li>
                @endif
            </ul>
        </div>
        @endauth
    </header>
    
    @yield('content')

    <footer class="w-100 d-flex flex-row align-items-center justify-content-center mt-auto bg-success">
        <p><span>&#169</span>Amazing E-Grocery 2023</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>



</html>