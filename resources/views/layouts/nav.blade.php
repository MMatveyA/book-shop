<header class="p-3 mb-3 border-bottom">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="{{ route('home') }}" class="nav-link px-2 link-secondary">Главная</a></li>
                <li><a href="{{ route('adv_search') }}" class="nav-link px-2 link-dark">Расширенный поиск</a></li>
                <li><a href="{{ route('author.index') }}" class="nav-link px-2 link-dark">Авторы</a></li>
                <li><a href="{{ route('author.create') }}" class="nav-link px-2 link-dark">Добавить автора</a></li>
            </ul>
        
            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search" method="POST" action="/">
                @csrf
                <input type="search" name="name" class="form-control" placeholder="Поиск..." aria-label="Поиск">
            </form>
        
        </div>
    </div>
</header>
