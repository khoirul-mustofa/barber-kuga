<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Style Journal - KUGA Barbershop</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <!-- HEADER & NAVIGATION -->
    <header class="header scrolled" id="header">
        <div class="container">
            <nav class="nav">
                <a href="index.html" class="logo">
                    <img src="{{ asset('images/logo.png') }}" alt="KUGA Logo" class="logo-img">
                    <div class="logo-text">
                        <span class="brand-name">KUGA</span>
                        <span class="brand-subtext">Barbershop</span>
                    </div>
                </a>
                <ul class="nav-menu" id="navMenu">
                    <li><a href="index.html#home" class="nav-link">Beranda</a></li>
                    <li><a href="#tentang" class="nav-link">Tentang</a></li>
                    <li><a href="#layanan" class="nav-link">Layanan</a></li>
                    <li><a href="#galeri" class="nav-link">Galeri</a></li>
                    <li><a href="#harga" class="nav-link">Harga</a></li>
                    <li><a href="booking.html" class="nav-link">Booking</a></li>
                    <li><a href="#kontak" class="nav-link">Kontak</a></li>
                </ul>
                <div class="hamburger" id="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </nav>
        </div>
    </header>

    <section class="section" style="padding-top: 150px;">
        <div class="container">
            <div class="section-title">
                <h1>Style <span class="gradient-text">Journal</span></h1>
                <p>Panduan lengkap gaya rambut dan tips grooming terbaik dari Barber Expert kami.</p>
            </div>

            <div class="services-grid">
                <!-- 1. Taper Fade -->
                <div class="service-card" style="padding: 0; overflow: hidden;">
                    <img src="images/styles/taper-fade.png" style="width: 100%; height: 250px; object-fit: cover;">
                    <div style="padding: 2rem;">
                        <h3>Taper Fade</h3>
                        <p>Gradasi halus yang memberikan kesan clean dan profesional tanpa terlihat terlalu ekstrim.</p>
                        <a href="articles/taper-fade.html" class="btn btn-outline"
                            style="width: 100%; margin-top: 1rem;">Baca Panduan</a>
                    </div>
                </div>

                <!-- 2. Classic Side Part -->
                <div class="service-card" style="padding: 0; overflow: hidden;">
                    <img src="images/jurnal/jurnal1.jpeg" style="width: 100%; height: 250px; object-fit: cover;">
                    <div style="padding: 2rem;">
                        <h3>Classic Side Part</h3>
                        <p>Simbol pria eksekutif. Garis belahan rambut yang tegas untuk kesan berwibawa.</p>
                        <a href="articles/side-part.html" class="btn btn-outline"
                            style="width: 100%; margin-top: 1rem;">Baca Panduan</a>
                    </div>
                </div>

                <!-- 3. Modern Two Block -->
                <div class="service-card" style="padding: 0; overflow: hidden;">
                    <img src="images/jurnal/jurnal1.jpeg" style="width: 100%; height: 250px; object-fit: cover;">
                    <div style="padding: 2rem;">
                        <h3>Modern Two Block</h3>
                        <p>Tren Korea yang dinamis. Memberikan volume dan tekstur maksimal pada rambut Asia.</p>
                        <a href="articles/two-block.html" class="btn btn-outline"
                            style="width: 100%; margin-top: 1rem;">Baca Panduan</a>
                    </div>
                </div>

                <!-- 4. French Crop -->
                <div class="service-card" style="padding: 0; overflow: hidden;">
                    <img src="images/jurnal/jurnal1.jpeg" style="width: 100%; height: 250px; object-fit: cover;">
                    <div style="padding: 2rem;">
                        <h3>French Crop</h3>
                        <p>Gaya minimalis dengan poni pendek yang edgy. Sangat rendah perawatan namun tetap modis.</p>
                        <a href="articles/french-crop.html" class="btn btn-outline"
                            style="width: 100%; margin-top: 1rem;">Baca Panduan</a>
                    </div>
                </div>

                <!-- 5. Modern Mullet -->
                <div class="service-card" style="padding: 0; overflow: hidden;">
                    <img src="images/jurnal/jurnal1.jpeg" style="width: 100%; height: 250px; object-fit: cover;">
                    <div style="padding: 2rem;">
                        <h3>Modern Mullet</h3>
                        <p>Ekspresi kebebasan dengan gaya lawas yang kembali tren. Unik dan penuh karakter.</p>
                        <a href="articles/mullet.html" class="btn btn-outline"
                            style="width: 100%; margin-top: 1rem;">Baca Panduan</a>
                    </div>
                </div>

                <!-- 6. Pompadour -->
                <div class="service-card" style="padding: 0; overflow: hidden;">
                    <img src="images/jurnal/jurnal1.jpeg" style="width: 100%; height: 250px; object-fit: cover;">
                    <div style="padding: 2rem;">
                        <h3>Classic Pompadour</h3>
                        <p>Volume berkelas yang menonjolkan kepercayaan diri tinggi dan kesan mewah.</p>
                        <a href="articles/pompadour.html" class="btn btn-outline"
                            style="width: 100%; margin-top: 1rem;">Baca Panduan</a>
                    </div>
                </div>

                <!-- 7. Buzz Cut -->
                <div class="service-card" style="padding: 0; overflow: hidden;">
                    <img src="images/jurnal/jurnal1.jpeg" style="width: 100%; height: 250px; object-fit: cover;">
                    <div style="padding: 2rem;">
                        <h3>Buzz Cut</h3>
                        <p>Kepraktisan tanpa batas. Potongan bersih yang menonjolkan fitur wajah Anda secara jujur.</p>
                        <a href="articles/buzz-cut.html" class="btn btn-outline"
                            style="width: 100%; margin-top: 1rem;">Baca Panduan</a>
                    </div>
                </div>

                <!-- 8. Undercut -->
                <div class="service-card" style="padding: 0; overflow: hidden;">
                    <img src="images/jurnal/jurnal1.jpeg" style="width: 100%; height: 250px; object-fit: cover;">
                    <div style="padding: 2rem;">
                        <h3>Modern Undercut</h3>
                        <p>Disconnected cut yang memberikan kontras tajam dan versatilitas styling yang tinggi.</p>
                        <a href="articles/undercut.html" class="btn btn-outline"
                            style="width: 100%; margin-top: 1rem;">Baca Panduan</a>
                    </div>
                </div>

                <!-- 9. Wolf Cut -->
                <div class="service-card" style="padding: 0; overflow: hidden;">
                    <img src="images/jurnal/jurnal1.jpeg" style="width: 100%; height: 250px; object-fit: cover;">
                    <div style="padding: 2rem;">
                        <h3>Wolf Cut</h3>
                        <p>Perpaduan liar antara Shag & Mullet. Memberikan tekstur artistik dan volume maksimal.</p>
                        <a href="articles/wolf-cut.html" class="btn btn-outline"
                            style="width: 100%; margin-top: 1rem;">Baca Panduan</a>
                    </div>
                </div>

                <!-- 10. Burst Fade -->
                <div class="service-card" style="padding: 0; overflow: hidden;">
                    <img src="images/jurnal/jurnal1.jpeg" style="width: 100%; height: 250px; object-fit: cover;">
                    <div style="padding: 2rem;">
                        <h3>Burst Fade</h3>
                        <p>Gradasi melengkung di sekitar telinga yang tajam dan urban. Cocok untuk tampilan modern.</p>
                        <a href="articles/burst-fade.html" class="btn btn-outline"
                            style="width: 100%; margin-top: 1rem;">Baca Panduan</a>
                    </div>
                </div>

                <!-- 11. Top Knot -->
                <div class="service-card" style="padding: 0; overflow: hidden;">
                    <img src="images/jurnal/jurnal1.jpeg" style="width: 100%; height: 250px; object-fit: cover;">
                    <div style="padding: 2rem;">
                        <h3>Modern Top Knot</h3>
                        <p>Gaya simpul samurai yang maskulin. Menggabungkan rambut panjang dengan samping yang bersih.
                        </p>
                        <a href="articles/top-knot.html" class="btn btn-outline"
                            style="width: 100%; margin-top: 1rem;">Baca Panduan</a>
                    </div>
                </div>

                <!-- 12. Slick Back -->
                <div class="service-card" style="padding: 0; overflow: hidden;">
                    <img src="images/jurnal/jurnal1.jpeg" style="width: 100%; height: 250px; object-fit: cover;">
                    <div style="padding: 2rem;">
                        <h3>Classic Slick Back</h3>
                        <p>Definisi ketegasan pria. Tampilan klimis yang berwibawa dan penuh rasa percaya diri.</p>
                        <a href="articles/slick-back.html" class="btn btn-outline"
                            style="width: 100%; margin-top: 1rem;">Baca Panduan</a>
                    </div>
                </div>

                <!-- 13. Combed Over -->
                <div class="service-card" style="padding: 0; overflow: hidden;">
                    <img src="images/jurnal/jurnal1.jpeg" style="width: 100%; height: 250px; object-fit: cover;">
                    <div style="padding: 2rem;">
                        <h3>Modern Combed Over</h3>
                        <p>Sentuhan modern pada gaya belahan samping. Volume tinggi yang menawan dan ramah.</p>
                        <a href="articles/combed-over.html" class="btn btn-outline"
                            style="width: 100%; margin-top: 1rem;">Baca Panduan</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <a href="#home" class="footer-logo">
                        <div class="logo-text">
                            <span class="brand-name">KUGA</span>
                            <span class="brand-subtext">Barbershop</span>
                        </div>
                    </a>
                    <p>Barbershop modern dengan pelayanan premium untuk penampilan maksimal Anda. Life begins after
                        haircut!</p>
                    <div class="social-links-footer">
                        <a href="https://www.instagram.com/kuga.gallery" target="_blank" class="social-icon-btn ig"
                            title="Instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://wa.me/6281256626112" target="_blank" class="social-icon-btn wa"
                            title="WhatsApp">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </div>
                </div>
                <div class="footer-section">
                    <h3>Quick Links</h3>
                    <a href="#tentang">Tentang Kami</a>
                    <a href="#layanan">Layanan</a>
                    <a href="#galeri">Galeri</a>
                    <a href="#harga">Harga</a>
                </div>
                <div class="footer-section">
                    <h3>Layanan</h3>
                    <a href="#layanan">Classic Haircut</a>
                    <a href="#layanan">Premium Styling</a>
                    <a href="#layanan">Beard Grooming</a>
                    <a href="#layanan">Hair Treatment</a>
                </div>
                <div class="footer-section">
                    <h3>Kontak</h3>
                    <p>Jl. melanti RT. 37. No. 23<br>Palaran Samarinda</p>
                    <p>Phone: +62 812 5662 6112</p>
                    <p>Email: kuga03042022@gmail.com</p>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2026 KUGA Barbershop. All rights reserved. Designed with ❤️ for PALCUMPING.GL</p>
            </div>
        </div>
    </footer>
</body>

</html>