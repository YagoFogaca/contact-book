<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">

        <a class="navbar-brand" href="#"><img width="75px" src="{{ asset('/imgs/logo-bg.png') }}" alt=""></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent" style="justify-content: flex-end">

            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            </form>

            <ul class="navbar-nav mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.logout') }}">
                        <i class="bi
                        bi-box-arrow-right"
                            style="color: #f6f4eb ; margin-left: 15px; font-size: 2rem;"></i>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>
