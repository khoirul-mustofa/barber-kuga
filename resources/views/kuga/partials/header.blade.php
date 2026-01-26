<header class="header" id="header">
    <div class="container">
        <nav class="nav">
            <a href="#home" class="logo">
                <img src="{{ asset("images/logo.png") }}" alt="KUGA Logo" class="logo-img">
                <div class="logo-text">
                    <span class="brand-name">KUGA</span>
                    <span class="brand-subtext">Barbershop</span>
                </div>
            </a>
            <ul class="nav-menu" id="navMenu">
                <li><a href="/#home" class="nav-link">Beranda</a></li>
                <li><a href="/#tentang" class="nav-link">Tentang</a></li>
                <li><a href="/#layanan" class="nav-link">Layanan</a></li>
                <li><a href="/#galeri" class="nav-link">Galeri</a></li>
                <li><a href="/#harga" class="nav-link">Harga</a></li>
                <li><a href="{{ route('booking') }}" class="nav-link">Booking</a></li>
                <li><a href="/#kontak" class="nav-link">Kontak</a></li>
            </ul>
            <div class="hamburger" id="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </nav>
    </div>
</header>