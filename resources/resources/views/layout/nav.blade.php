<nav class="navbar fixed-top navbar-toggleable-md navbar-inverse bg-inverse">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarExample" aria-controls="navbarExample" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="container">
        <a class="navbar-brand" href="/" style="outline : none;">
            <img src="/img/addstoolLogo.png"  style="border: 0; width: 130px; height: 30px;">
        </a>
        <div class="collapse navbar-collapse" id="navbarExample">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active home">
                    <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item product">
                    <a class="nav-link" href="/product">Ads </a>
                </li>
                <li class="nav-item admin">
                    <a class="nav-link" href="/admin">Admin </a>
                </li>  
                @if(Auth::check())              
                <li class="nav-item auth">
                    <a class="nav-link" href="/logout">Logout</a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>