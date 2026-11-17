
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Clinic Patient Records')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    {{-- Navigation Bar --}}
    <header class="topbar">
        <div class="container nav">

            <a class="brand" href="{{ route('patients.index') }}">
                Clinic Patient Records
            </a>

            <nav aria-label="Main navigation">
                <a
                    href="{{ route('patients.index') }}"
                    class="{{ request()->routeIs('patients.index') ? 'active' : '' }}"
                >
                    Patient List
                </a>

                <a
                    href="{{ route('patients.create') }}"
                    class="navbutton"
                >
                    + Register Patient
                </a>
            </nav>

        </div>
    </header>

    {{-- Main Content --}}
    <main class="container page">

        {{-- Success Message --}}
        @if (session('success'))
            <div class="alert alert-success" role="status">
                {{ session('success') }}
            </div>
        @endif

        {{-- Validation Errors --}}
        @if ($errors->any())
            <div class="alert alert-error" role="alert">

                <strong>Please correct the following errors:</strong>

                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

            </div>
        @endif

        {{-- Page Content --}}
        @yield('content')

    </main>

    {{-- Footer --}}
    <footer class="container muted" style="padding: 0 0 22px; text-align: center;">
        Clinic Patient Records System
    </footer>

</body>
</html>