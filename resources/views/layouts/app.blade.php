
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title', 'TaskFlow')
    </title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #fdf2f8;
            color: #1f2937;
        }

        /* =========================
           Navbar
        ========================= */

        nav {
            background: #ec4899;
            padding: 16px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 3px 12px rgba(236, 72, 153, 0.20);
        }

        .logo {
            color: white;
            font-size: 23px;
            font-weight: bold;
            text-decoration: none;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 22px;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            font-size: 15px;
            font-weight: 600;
            padding: 8px 12px;
            border-radius: 8px;
            transition: 0.2s;
        }

        .nav-links a:hover {
            background: #db2777;
        }

        .logout-button {
            background: white;
            border: none;
            color: #db2777;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
            padding: 9px 15px;
            border-radius: 8px;
            transition: 0.2s;
        }

        .logout-button:hover {
            background: #fce7f3;
        }


        /* =========================
           Main
        ========================= */

        main {
            min-height: calc(100vh - 130px);
            padding: 40px;
        }

        .container {
            max-width: 1000px;
            margin: auto;
        }


        /* =========================
           Footer
        ========================= */

        footer {
            background: white;
            color: #9ca3af;
            text-align: center;
            padding: 20px;
            border-top: 1px solid #fbcfe8;
        }


        /* =========================
           Pink Theme Helpers
        ========================= */

        .pink-card {
            background: white;
            border: 1px solid #fbcfe8;
            border-radius: 16px;
            box-shadow: 0 4px 15px rgba(236, 72, 153, 0.08);
        }

        .pink-button {
            background: #ec4899;
            color: white;
            border: none;
            border-radius: 10px;
            padding: 11px 18px;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            display: inline-block;
            transition: 0.2s;
        }

        .pink-button:hover {
            background: #db2777;
        }

    </style>

</head>


<body>


{{-- =========================
     Navbar
========================= --}}

<nav>

    <a href="{{ route('dashboard') }}" class="logo">
        🩷 TaskFlow
    </a>


    <div class="nav-links">

        <a href="{{ route('dashboard') }}">
            Dashboard
        </a>


        @auth

            <a href="{{ route('tasks.index') }}">
                My Tasks
            </a>


            <a href="{{ route('tasks.create') }}">
                + Add Task
            </a>


            <form
                method="POST"
                action="{{ route('logout') }}"
                style="display: inline;"
            >

                @csrf

                <button
                    type="submit"
                    class="logout-button"
                >
                    Logout
                </button>

            </form>

        @else

            <a href="{{ route('login') }}">
                Login
            </a>


            <a href="{{ route('register') }}">
                Register
            </a>

        @endauth

    </div>

</nav>


{{-- =========================
     Main Content
========================= --}}

<main>

    @yield('content')

</main>


{{-- =========================
     Footer
========================= --}}

<footer>

    <p>
        © {{ date('Y') }} TaskFlow. All rights reserved.
    </p>

</footer>


</body>

</html>

