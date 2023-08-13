<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Memorable Sites</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="antialiased">
        <section>
            @if (Route::has('login'))
                <div>
                    @auth
                        <a href="{{ url('/dashboard') }}">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </section>
        <nav>
        </nav>
        <section>
            <h1>Memorable Sites<small> | yet another bookmark app</small></h1>
            <section>
                <h2>Bookmarks</h2>
                <ul>
                    <li>
                        <article>
                            <h3><a href="#">Laracasts</a></h3>
                            <p>
                                A wonderful resource for those that venture through the non-sense of overly complex frameworks
                                designed to make the author rich-af
                            </p>
                            <ul>
                                <li><span>language</span><span>php</span></li>
                                <li><span>framework</span><span>laravel</span></li>
                            </ul>
                        </article>
                    </li>
                </ul>
            </section>
        </section>
    </body>
</html>
