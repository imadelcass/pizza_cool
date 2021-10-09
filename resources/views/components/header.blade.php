<header class="header container">
    <div class="brand">
        <h2>pizza cool</h2>
    </div>
    <nav class="nav">
        <a class="link" href="/">Home</a>
        <a class="link" href="">Contact</a>
        @auth
            <a class="link" href="/profile/{{auth()->user()->username}}">
                Hi, {{auth()->user()->username}}
            </a>
                @if (auth()->user()->is_admin)
                <a class="link" href="{{ route('admin') }}">Admin</a>
                @endif
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button class="btn btn-primary" type="submit">logout</button>
            </form>
        @endauth
        @guest
            <a class="link" href="{{ route('register') }}">Login / Registre</a>
        @endguest
    </nav>
</header>