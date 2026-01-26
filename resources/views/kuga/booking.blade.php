@extends('kuga.layouts.app')
@section('content')
    {{-- css booking --}}
    <link rel="stylesheet" href="{{ asset('css/booking.css') }}">
    <!-- BOOKING HERO -->
    <section class="booking-hero hero">
        <div class="hero-content">
            <p class="hero-subtitle">Reservasi Online</p>
            <h1 class="hero-title" style="font-size: 3.5rem;">Booking Sekarang</h1>
            <p class="hero-description">
                Pesan jadwal potong rambut Anda dengan mudah dan cepat. Pilih layanan, barber favorit, dan waktu yang
                sesuai.
            </p>
        </div>
    </section>

    <!-- BOOKING FORM -->
    <section class="section">
        <div class="booking-container">
            <div class="booking-notes">
                <h4>📌 Informasi Penting</h4>
                <ul>
                    <li>Harap datang 5-10 menit sebelum waktu yang dijadwalkan</li>
                    <li>saat waktu booking sudah tiba dan anda belum datang maka DP booking hangus</li>
                    <li>Konfirmasi booking akan dikirim via WhatsApp</li>
                </ul>
            </div>

            <div class="booking-form-wrapper fade-in">
                <form id="bookingForm">
                    <!-- INFORMASI PRIBADI -->
                    <div class="form-section">
                        <h3>1️⃣ Informasi Pribadi</h3>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="fullName">Nama Lengkap *</label>
                                <input type="text" id="fullName" name="fullName" required
                                    placeholder="Masukkan nama lengkap">
                            </div>
                            <div class="form-group">
                                <label for="phone">Nomor Telepon *</label>
                                <input type="tel" id="phone" name="phone" required placeholder="08xx-xxxx-xxxx">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email (Opsional)</label>
                            <input type="email" id="email" name="email" placeholder="email@example.com">
                        </div>
                    </div>

                    <!-- PILIH LAYANAN -->
                    <div class="form-section">
                        <h3>2️⃣ Pilih Layanan</h3>
                        <div class="service-options">
                            <label class="option-card">
                                <input type="radio" name="service" value="classic" data-price="75000" data-duration="45"
                                    required>
                                <div class="option-icon">✂️</div>
                                <div class="option-title">Classic Haircut</div>
                                <div class="option-duration">⏱️ 45 menit</div>
                                <div class="option-price">Rp 75.000</div>
                            </label>
                            <label class="option-card">
                                <input type="radio" name="service" value="premium" data-price="95000" data-duration="60">
                                <div class="option-icon">💈</div>
                                <div class="option-title">Premium Styling</div>
                                <div class="option-duration">⏱️ 60 menit</div>
                                <div class="option-price">Rp 95.000</div>
                            </label>
                            <label class="option-card">
                                <input type="radio" name="service" value="beard" data-price="50000" data-duration="30">
                                <div class="option-icon">🪒</div>
                                <div class="option-title">Beard Grooming</div>
                                <div class="option-duration">⏱️ 30 menit</div>
                                <div class="option-price">Rp 50.000</div>
                            </label>
                            <label class="option-card">
                                <input type="radio" name="service" value="treatment" data-price="85000" data-duration="50">
                                <div class="option-icon">✨</div>
                                <div class="option-title">Hair Treatment</div>
                                <div class="option-duration">⏱️ 50 menit</div>
                                <div class="option-price">Rp 85.000</div>
                            </label>
                            <label class="option-card">
                                <input type="radio" name="service" value="coloring" data-price="250000" data-duration="120">
                                <div class="option-icon">🎨</div>
                                <div class="option-title">Hair Coloring</div>
                                <div class="option-duration">⏱️ 120 menit</div>
                                <div class="option-price">Rp 250.000</div>
                            </label>
                            <label class="option-card">
                                <input type="radio" name="service" value="massage" data-price="45000" data-duration="25">
                                <div class="option-icon">💆</div>
                                <div class="option-title">Head Massage</div>
                                <div class="option-duration">⏱️ 25 menit</div>
                                <div class="option-price">Rp 45.000</div>
                            </label>
                        </div>
                    </div>

                    <!-- PILIH BARBER -->
                    <div class="form-section">
                        <h3>3️⃣ Pilih Barber</h3>
                        <div class="barber-options">
                            <label class="option-card">
                                <input type="radio" name="barber" value="random" required>
                                <div class="barber-card">
                                    <div class="barber-avatar">🎲</div>
                                    <div class="option-title">Random</div>
                                    <div class="option-duration">Barber Tersedia</div>
                                </div>
                            </label>
                            <label class="option-card">
                                <input type="radio" name="barber" value="Galih">
                                <div class="barber-card">
                                    <div class="barber-avatar">👨</div>
                                    <div class="option-title">Galih</div>
                                    <div class="option-duration">Senior Barber</div>
                                </div>
                            </label>
                            <label class="option-card">
                                <input type="radio" name="barber" value="Novialdi">
                                <div class="barber-card">
                                    <div class="barber-avatar">👨‍🦱</div>
                                    <div class="option-title">Novialdi</div>
                                    <div class="option-duration">Expert Barber</div>
                                </div>
                            </label>
                        </div>
                    </div>

                    <!-- PILIH TANGGAL & WAKTU -->
                    <div class="form-section">
                        <h3>4️⃣ Pilih Tanggal & Waktu</h3>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="bookingDate">Tanggal *</label>
                                <input type="date" id="bookingDate" name="bookingDate" required>
                            </div>
                            <div class="form-group">
                                <label>Waktu *</label>
                                <!-- TIME SLOT GRID CONTAINER -->
                                <div id="timeSlotsGrid" class="time-slots-grid">
                                    <!-- Time slots will be generated here by booking.js -->
                                    <p style="color: var(--gray-text); font-size: 0.9rem;">Silakan pilih tanggal
                                        terlebih dahulu untuk melihat waktu yang tersedia.</p>
                                </div>
                                <input type="hidden" id="bookingTime" name="bookingTime" required>
                            </div>
                        </div>
                    </div>

                    <!-- CATATAN TAMBAHAN -->
                    <div class="form-section">
                        <h3>5️⃣ Catatan Tambahan (Opsional)</h3>
                        <div class="form-group">
                            <label for="notes">Catatan untuk Barber</label>
                            <textarea id="notes" name="notes"
                                placeholder="Contoh: Saya ingin model rambut seperti..."></textarea>
                        </div>
                    </div>

                    <!-- METODE PEMBAYARAN DP -->
                    <div class="form-section">
                        <h3>6️⃣ Metode Pembayaran (DP 50%)</h3>
                        <p style="margin-bottom: var(--spacing-md); font-size: 0.95rem; color: var(--gray-text);">
                            Silakan
                            pilih metode untuk pembayaran DP sebesar 50%. Sisa pembayaran dilakukan di tempat.</p>

                        <div class="service-options">
                            <!-- Bank Transfer -->
                            <label class="option-card">
                                <input type="radio" name="payment" value="bca" required>
                                <div class="option-icon">🏦</div>
                                <div class="option-title">Transfer BCA</div>
                                <div class="option-duration">Nomor Rekening:</div>
                                <div class="option-price" style="font-size: 0.9rem;">123-456-7890</div>
                            </label>
                            <label class="option-card">
                                <input type="radio" name="payment" value="mandiri">
                                <div class="option-icon">🏦</div>
                                <div class="option-title">Transfer Mandiri</div>
                                <div class="option-duration">Nomor Rekening:</div>
                                <div class="option-price" style="font-size: 0.9rem;">987-654-3210</div>
                            </label>

                            <!-- E-Wallet -->
                            <label class="option-card">
                                <input type="radio" name="payment" value="gopay">
                                <div class="option-icon">📱</div>
                                <div class="option-title">GoPay</div>
                                <div class="option-duration">Nomor HP:</div>
                                <div class="option-price" style="font-size: 0.9rem;">0812-5662-6112</div>
                            </label>
                            <label class="option-card">
                                <input type="radio" name="payment" value="dana">
                                <div class="option-icon">📱</div>
                                <div class="option-title">DANA</div>
                                <div class="option-duration">Nomor HP:</div>
                                <div class="option-price" style="font-size: 0.9rem;">0812-5662-6112</div>
                            </label>
                            <label class="option-card">
                                <input type="radio" name="payment" value="qris">
                                <div class="option-icon">📸</div>
                                <div class="option-title">QRIS</div>
                                <div class="option-duration">Semua E-Wallet</div>
                                <div class="option-price" style="font-size: 0.9rem;">Scan Barcode</div>
                            </label>
                        </div>
                    </div>

                    <!-- BOOKING SUMMARY -->
                    <div class="booking-summary">
                        <h3>📋 Ringkasan Booking</h3>
                        <div class="summary-item">
                            <span>Layanan:</span>
                            <strong id="summaryService">-</strong>
                        </div>
                        <div class="summary-item">
                            <span>Barber:</span>
                            <strong id="summaryBarber">-</strong>
                        </div>
                        <div class="summary-item">
                            <span>Tanggal:</span>
                            <strong id="summaryDate">-</strong>
                        </div>
                        <div class="summary-item">
                            <span>Waktu:</span>
                            <strong id="summaryTime">-</strong>
                        </div>
                        <div class="summary-item">
                            <span>Durasi:</span>
                            <strong id="summaryDuration">-</strong>
                        </div>
                        <div class="summary-item">
                            <span>Metode Pembayaran:</span>
                            <strong id="summaryPayment">-</strong>
                        </div>
                        <div class="summary-item summary-total">
                            <span>Total Harga:</span>
                            <span id="summaryTotal">Rp 0</span>
                        </div>
                        <div class="summary-item"
                            style="background: rgba(102, 126, 234, 0.15); padding: var(--spacing-sm); border-radius: var(--radius-sm); margin-top: var(--spacing-sm);">
                            <span style="font-weight: 600; color: var(--accent-color);">DP 50% yang harus
                                dibayar:</span>
                            <span id="summaryDP" style="font-size: 1.8rem; font-weight: 800; color: var(--accent-color);">Rp
                                0</span>
                        </div>
                    </div>

                    <!-- SUBMIT BUTTON -->
                    <button type="submit" class="btn btn-primary"
                        style="width: 100%; margin-top: var(--spacing-md); font-size: 1.2rem; padding: 1.2rem;">
                        Konfirmasi Booking 🎉
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <!-- MODAL INSTRUKSI PEMBAYARAN -->
    <div id="paymentModal" class="custom-modal">
        <div class="modal-content">
            <span class="close-modal" id="closePaymentModal">&times;</span>
            <h2 style="text-align: center; color: var(--primary-color);">Langkah Pembayaran DP</h2>
            <div class="payment-details-box">
                <p>Silakan transfer **DP 50%** sesuai rincian di bawah:</p>
                <div class="payment-info-card">
                    <p>Metode: <strong id="modalPaymentMethod">-</strong></p>
                    <p>Sebesar: <strong id="modalDPAmount" style="font-size: 1.5rem; color: var(--accent-color);">Rp
                            0</strong></p>
                    <p id="modalAccountInfo">Nomor Tujuan: **123-456-7890**</p>
                </div>

                <!-- QRIS Image (hidden by default) -->
                <div id="qrisContainer" style="display: none; text-align: center; margin-top: 1rem;">
                    <img src="{{ asset('images/qr-code.svg') }}" alt="QRIS Barcode"
                        style="max-width: 250px; border-radius: var(--radius-md);">
                </div>

                <div class="payment-steps">
                    <ol>
                        <li>Lakukan transfer sesuai nominal di atas.</li>
                        <li>Simpan bukti transaksi (Screenshot).</li>
                        <li>Klik tombol **"Saya Sudah Bayar"** di bawah.</li>
                    </ol>
                </div>

                <div style="margin-top: 2rem;">
                    <button id="confirmPaidBtn" class="btn btn-primary" style="width: 100%;">Saya Sudah Bayar &
                        Konfirmasi ✅</button>
                </div>
            </div>
        </div>
    </div>

    <!-- OVERLAY SELESAI / BERHASIL -->
    <div id="successOverlay" class="success-overlay">
        <div class="success-card">
            <div class="success-icon">✅</div>
            <h2>Booking Berhasil Diterima!</h2>
            <p>Terima kasih! Pembayaran DP telah kami catat. Reservasi Anda telah masuk ke sistem kami.</p>
            <div class="booking-id-tag">Booking ID: #KGA-<span id="randomId">8293</span></div>
            <p style="font-size: 0.9rem; color: var(--gray-text); margin-top: 1rem;">Konfirmasi final dan detail lokasi
                telah dikirim ke WhatsApp Anda.</p>
            <button onclick="window.location.href='index.html'" class="btn btn-outline" style="margin-top: 2rem;">Kembali ke
                Beranda</button>
        </div>
    </div>

    <script src="{{ asset('js/booking.js') }}"></script>
@endsection