<nav>
    <div class="navbar d-flex justify-content-between align-items-center">
        <div class="logo">
            <a href="/">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" width="200px" height="auto"
                    style="object-position: center">
            </a>
        </div>
        <ul class="menu d-flex align-items-center d-lg-flex d-none">
            <li><a href="{{ route('beranda') }}">Beranda</a></li>
            <li><a href="{{ route('cek-diagnosa') }}">Cek Diagnosa</a></li>
            <li><a href="{{ route('daftar-penyakit') }}">Daftar Penyakit</a></li>
            <li><a href="{{ route('tentang-aplikasi') }}">Tentang Aplikasi</a></li>
            <li>
                <a class="nav-link d-flex align-items-center" href="/dashboard">
                    <img src="{{ asset('images/pasfoto.jpg') }}" alt="Profile Picture" class="profile-img">
                </a>
            </li>
        </ul>
        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="collapse navbar-collapse bg-white p-3" id="navbarNav">
        <ul class="navbar-nav d-flex flex-column align-items-center">
            <li class="nav-item my-3"><a class="nav-link" href="{{ route('beranda') }}">Beranda</a></li>
            <li class="nav-item my-3"><a class="nav-link" href="{{ route('cek-diagnosa') }}">Cek Diagnosa</a></li>
            <li class="nav-item my-3"><a class="nav-link" href="{{ route('daftar-penyakit') }}">Daftar Penyakit</a></li>
            <li class="nav-item my-3"><a class="nav-link" href="{{ route('tentang-aplikasi') }}">Tentang Aplikasi</a>
            </li>
            <li class="nav-item my-3 w-100 d-flex justify-content-center">
                <a class="nav-link d-flex align-items-center" href="/dashboard">
                    <img src="{{ asset('images/pasfoto.jpg') }}" alt="Profile Picture" class="profile-img">
                    {{ Auth::user()->name }}
                </a>
            </li>
        </ul>
    </div>
</nav>

<style>
    li {
        font-family: 'Montserrat', sans-serif;
        font-size: 26px;
        /* Atur ukuran font sesuai kebutuhan */
    }

    /* Jika Anda memiliki elemen khusus yang perlu pengaturan font */


    .profile-img {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        border: 2px solid #7030A0;
        /* Add purple border */
        margin-right: 10px;
        /* Add margin between image and name */
    }

    .profile-name {
        font-size: 1.5rem;
    }

    .btn-ungu {
        background-color: #7030A0;
        color: white;
    }

    .btn-outline-ungu {
        border-color: #7030A0;
        color: #7030A0;
    }

    .w-66 {
        width: 66.67% !important;
    }

    @media (max-width: 992px) {

        .navbar {
            display: flex;
            justify-content: center;
        }

        .navbar-nav {
            display: flex;
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        .nav-item {
            margin: 0 10px;
        }

        .nav-link {
            text-decoration: none;
            color: #333;
        }
    }
</style>
