<div class="container">
    <nav class="navbar">
        <div class="navbar__inner">
            <div class="navbar__left">
                <div class="logo">Echo Hub</div>
                <ul class="navbar__list">
                    <li class="navbar__item item-navbar">
                        <a href="{{ route('home.page') }}" class="item-navbar__link">Home</a>
                    </li>
                    @if(auth()->user()->is_admin ?? null)
                        <li class="navbar__item item-navbar">
                            <a href="{{ route('post.page.add') }}" class="item-navbar__link">Add Post</a>
                        </li>
                    @endif
                </ul>
            </div>
            <div class="navbar__right">

            @if(auth()->check())
                    <a href="{{ route('profile.page', auth()->id()) }}" class="navbar__profile">Profile</a>
                    <form action="{{ route('logout.action') }}" method="POST">
                        <button type="submit" class="navbar__logout">Logout</button>
                    </form>
            @else
                    <a href="{{ route('login.page') }}" class="navbar__login">Login</a>
                    <a href="{{ route('register.page') }}" class="navbar__register">Register</a>
            @endif
            </div>

        </div>
    </nav>
</div>
