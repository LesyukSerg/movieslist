<nav class="navbar navbar-expand-sm navbar-light bg-light">
    <a class="navbar-brand" href="#">Serhii Lesiuk</a>
    <div class="navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item mx-2">
                <a class="nav-link <?=($page_name=='movies'?'active':'')?>" href="/index.php">Movies</a>
            </li>
            <li class="nav-item mx-2">
                <a class="nav-link <?=($page_name=='directors'?'active':'')?>" href="/directors.php">Directors</a>
            </li>
            <li class="nav-item mx-2">
                <a class="nav-link" href="/login.php?out=1">Exit</a>
            </li>
        </ul>
    </div>
</nav>
