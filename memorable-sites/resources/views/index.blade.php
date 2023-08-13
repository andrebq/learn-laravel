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
                    @foreach ($bookmarks as $item)
                    <li>
                        <article>
                            <h3><a href="#{{$item->slug}}">{{ $item->title }}</a></h3>
                            {!! $item->body_as_safe_html() !!}
                            <ul>
                            @foreach ($item->tags as $tag)
                                <li><span>{{$tag->key}}</span><span>{{$tag->value}}</span></li>
                            @endforeach
                            </ul>
                        </article>
                    </li>
                    @endforeach
                </ul>
            </section>
        </section>
    </body>
</html>
