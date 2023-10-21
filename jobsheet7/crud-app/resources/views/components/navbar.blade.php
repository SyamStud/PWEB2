<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid ms-4">
        <a class="navbar-brand" href="/">SIAKAD</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @php
                    $url = $_SERVER['REQUEST_URI'];
                    $path = basename(parse_url($url, PHP_URL_PATH));
                @endphp

                <li class="nav-item">
                    <a class="nav-link {{ request()->path() === 'mahasiswa' ? 'active' : '' }}"
                        href="mahasiswa">Mahasiswa</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->path() === 'dosen' ? 'active' : '' }}" href="dosen">Dosen</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
