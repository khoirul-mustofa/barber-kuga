// ===================================
// BOOKING PAGE - ADVANCED FEATURES (DP SYSTEM & AVAILABILITY)
// ===================================

document.addEventListener('DOMContentLoaded', function () {

    // Get form elements
    const bookingForm = document.getElementById('bookingForm');
    const serviceOptions = document.querySelectorAll('input[name="service"]');
    const barberOptions = document.querySelectorAll('input[name="barber"]');
    const paymentOptions = document.querySelectorAll('input[name="payment"]');
    const dateInput = document.getElementById('bookingDate');
    const timeInput = document.getElementById('bookingTime');
    const timeSlotsGrid = document.getElementById('timeSlotsGrid');
    const optionCards = document.querySelectorAll('.option-card');

    // Summary elements
    const summaryService = document.getElementById('summaryService');
    const summaryBarber = document.getElementById('summaryBarber');
    const summaryDate = document.getElementById('summaryDate');
    const summaryTime = document.getElementById('summaryTime');
    const summaryDuration = document.getElementById('summaryDuration');
    const summaryPayment = document.getElementById('summaryPayment');
    const summaryTotal = document.getElementById('summaryTotal');
    const summaryDP = document.getElementById('summaryDP');

    // Payment Modal elements
    const paymentModal = document.getElementById('paymentModal');
    const closePaymentModal = document.getElementById('closePaymentModal');
    const modalPaymentMethod = document.getElementById('modalPaymentMethod');
    const modalDPAmount = document.getElementById('modalDPAmount');
    const modalAccountInfo = document.getElementById('modalAccountInfo');
    const qrisContainer = document.getElementById('qrisContainer');
    const confirmPaidBtn = document.getElementById('confirmPaidBtn');
    const successOverlay = document.getElementById('successOverlay');
    const randomIdSpan = document.getElementById('randomId');

    // ===================================
    // CONFIGURATION & MOCK DATA
    // ===================================
    const workingHours = [
        "09:00", "10:00", "11:00", "12:00",
        "13:00", "14:00", "15:00", "16:00",
        "17:00", "18:00", "19:00", "20:00"
    ];

    // Helper to get date string YYYY-MM-DD for X days from now
    function getDateString(daysFromNow) {
        const d = new Date();
        d.setDate(d.getDate() + daysFromNow);
        return d.toISOString().split('T')[0];
    }

    // MOCK BOOKED SLOTS (Simulated Backend Data)
    // Format: "YYYY-MM-DD": ["HH:MM", "HH:MM"]
    const mockBookedSlots = {
        [getDateString(1)]: ["10:00", "14:00", "15:00", "19:00"], // Tomorrow
        [getDateString(2)]: ["09:00", "12:00", "13:00"],          // Day after tomorrow
        [getDateString(3)]: ["16:00", "17:00", "20:00"]           // 3 days from now
    };

    // ===================================
    // TIME SLOT GENERATION LOGIC
    // ===================================
    function generateTimeGrid(selectedDate) {
        if (!timeSlotsGrid) return;

        // Clear existing slots
        timeSlotsGrid.innerHTML = '';

        if (!selectedDate) {
            timeSlotsGrid.innerHTML = '<p style="color: var(--gray-text); font-size: 0.9rem; grid-column: 1/-1;">Silakan pilih tanggal terlebih dahulu.</p>';
            return;
        }

        const bookedTimes = mockBookedSlots[selectedDate] || [];

        workingHours.forEach(time => {
            const isBooked = bookedTimes.includes(time);
            const range = `${time} - ${parseInt(time.split(':')[0]) + 1}:00`;

            const btn = document.createElement('div');
            btn.className = `time-slot-btn ${isBooked ? 'booked' : ''}`;
            btn.textContent = time; // Displaying start time only keeps grid clean
            btn.setAttribute('data-time', time);
            btn.setAttribute('title', isBooked ? 'Sudah Dibooking' : range);

            if (!isBooked) {
                btn.addEventListener('click', function () {
                    // Visual Selection
                    document.querySelectorAll('.time-slot-btn').forEach(b => b.classList.remove('selected'));
                    this.classList.add('selected');

                    // Update Hidden Input & Summary
                    timeInput.value = range; // Store full range "09:00 - 10:00"
                    updateSummary();
                });
            }

            timeSlotsGrid.appendChild(btn);
        });
    }

    // Event Listener for Date Input
    if (dateInput) {
        dateInput.addEventListener('change', function () {
            generateTimeGrid(this.value);
            // Reset time selection when date changes
            timeInput.value = '';
            updateSummary();
        });
    }

    // ===================================
    // OPTION CARD SELECTION VISUAL FEEDBACK
    // ===================================
    optionCards.forEach(card => {
        card.addEventListener('click', function () {
            const radio = this.querySelector('input[type="radio"]');
            const radioName = radio.getAttribute('name');

            // Remove selected class from all cards with same name
            document.querySelectorAll(`input[name="${radioName}"]`).forEach(r => {
                r.closest('.option-card').classList.remove('selected');
            });

            // Add selected class to clicked card
            this.classList.add('selected');
            radio.checked = true;

            // Update summary
            updateSummary();
        });
    });

    // ===================================
    // SET MINIMUM DATE TO TOMORROW
    // ===================================
    const today = new Date();
    const tomorrow = new Date(today);
    tomorrow.setDate(tomorrow.getDate() + 1);

    const minDate = tomorrow.toISOString().split('T')[0];
    if (dateInput) dateInput.setAttribute('min', minDate);

    // ===================================
    // UPDATE SUMMARY FUNCTION
    // ===================================
    function updateSummary() {
        // Get selected service
        const selectedService = document.querySelector('input[name="service"]:checked');
        let price = 0;
        if (selectedService) {
            const serviceCard = selectedService.closest('.option-card');
            const serviceName = serviceCard.querySelector('.option-title').textContent;
            price = parseInt(selectedService.getAttribute('data-price'));
            const serviceDuration = selectedService.getAttribute('data-duration');

            summaryService.textContent = serviceName;
            summaryTotal.textContent = formatRupiah(price);
            summaryDP.textContent = formatRupiah(price / 2);
            summaryDuration.textContent = serviceDuration + ' menit';
        } else {
            summaryService.textContent = '-';
            summaryTotal.textContent = 'Rp 0';
            summaryDP.textContent = 'Rp 0';
            summaryDuration.textContent = '-';
        }

        // Get selected barber
        const selectedBarber = document.querySelector('input[name="barber"]:checked');
        if (selectedBarber) {
            const barberCard = selectedBarber.closest('.option-card');
            const barberName = barberCard.querySelector('.option-title').textContent;
            summaryBarber.textContent = barberName;
        } else {
            summaryBarber.textContent = '-';
        }

        // Get selected payment
        const selectedPayment = document.querySelector('input[name="payment"]:checked');
        if (selectedPayment) {
            const paymentCard = selectedPayment.closest('.option-card');
            const paymentName = paymentCard.querySelector('.option-title').textContent;
            summaryPayment.textContent = paymentName;
        } else {
            summaryPayment.textContent = '-';
        }

        // Get selected date
        if (dateInput.value) {
            const date = new Date(dateInput.value);
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            summaryDate.textContent = date.toLocaleDateString('id-ID', options);
        } else {
            summaryDate.textContent = '-';
        }

        // Get selected time from hidden input
        if (timeInput.value) {
            summaryTime.textContent = timeInput.value;
        } else {
            summaryTime.textContent = '-';
        }
    }

    // ===================================
    // FORMAT RUPIAH FUNCTION
    // ===================================
    function formatRupiah(amount) {
        return 'Rp ' + parseInt(amount).toLocaleString('id-ID');
    }

    // ===================================
    // FORM VALIDATION & SUBMISSION
    // ===================================
    bookingForm.addEventListener('submit', function (e) {
        e.preventDefault();

        // Basic Info
        const name = document.getElementById('fullName').value;
        const phone = document.getElementById('phone').value;

        // Selections
        const service = document.querySelector('input[name="service"]:checked');
        const barber = document.querySelector('input[name="barber"]:checked');
        const payment = document.querySelector('input[name="payment"]:checked');

        if (!service || !barber || !payment || !dateInput.value || !timeInput.value) {
            alert('❌ Mohon lengkapi semua pilihan booking, tanggal, dan waktu!');
            return;
        }

        // Calculate DP
        const totalPrice = parseInt(service.getAttribute('data-price'));
        const dpPrice = totalPrice / 2;

        // Prepare Modal Data
        modalPaymentMethod.textContent = payment.closest('.option-card').querySelector('.option-title').textContent;
        modalDPAmount.textContent = formatRupiah(dpPrice);

        // Set Account Info
        const payType = payment.value;
        qrisContainer.style.display = 'none';

        if (payType === 'bca') {
            modalAccountInfo.innerHTML = 'Nomor Rekening BCA: **123-456-7890** <br> a/n KUGA BARBERSHOP';
        } else if (payType === 'mandiri') {
            modalAccountInfo.innerHTML = 'Nomor Rekening Mandiri: **987-654-3210** <br> a/n KUGA BARBERSHOP';
        } else if (payType === 'gopay' || payType === 'dana') {
            modalAccountInfo.innerHTML = `Nomor HP ${payType.toUpperCase()}: **0812-5662-6112** <br> a/n KUGA BARBERSHOP`;
        } else if (payType === 'qris') {
            modalAccountInfo.innerHTML = 'Silakan scan QR Code di bawah menggunakan aplikasi e-wallet Anda.';
            qrisContainer.style.display = 'block';
        }

        // Show Payment Modal
        paymentModal.style.display = 'block';
    });

    // Close Modal
    closePaymentModal.onclick = () => paymentModal.style.display = 'none';
    window.onclick = (event) => {
        if (event.target == paymentModal) paymentModal.style.display = 'none';
    };

    // CONFIRM PAID BUTTON
    confirmPaidBtn.addEventListener('click', function () {
        // 1. Close payment modal
        paymentModal.style.display = 'none';

        // 2. Prepare Success State
        randomIdSpan.textContent = Math.floor(1000 + Math.random() * 9000);

        // 3. Trigger WhatsApp Message
        sendWhatsApp();

        // 4. Show Success Overlay
        successOverlay.style.display = 'flex';
    });

    function sendWhatsApp() {
        const name = document.getElementById('fullName').value;
        const phone = document.getElementById('phone').value;
        const serviceName = document.querySelector('input[name="service"]:checked').closest('.option-card').querySelector('.option-title').textContent;
        const barberName = document.querySelector('input[name="barber"]:checked').closest('.option-card').querySelector('.option-title').textContent;
        const paymentName = document.querySelector('input[name="payment"]:checked').closest('.option-card').querySelector('.option-title').textContent;
        const totalPrice = parseInt(document.querySelector('input[name="service"]:checked').getAttribute('data-price'));
        const dpPrice = totalPrice / 2;
        const date = summaryDate.textContent;
        const time = timeInput.value;
        const notes = document.getElementById('notes').value || '-';

        const message = `
*KONFIRMASI PEMBAYARAN DP - KUGA BARBERSHOP*
---------------------------------------
👤 *Nama:* ${name}
📱 *WhatsApp:* ${phone}
---
✂️ *Layanan:* ${serviceName}
💈 *Barber:* ${barberName}
📅 *Jadwal:* ${date} (${time})
---
💳 *Metode DP:* ${paymentName}
💰 *Total Harga:* ${formatRupiah(totalPrice)}
🪙 *DP Dibayar:* ${formatRupiah(dpPrice)}
---
📝 *Catatan:* ${notes}

*Status: PEMBAYARAN SELESAI (Bukti terlampir)*
_Mohon instruksi selanjutnya, terima kasih!_
        `.trim();

        const waUrl = `https://wa.me/6281256626112?text=${encodeURIComponent(message)}`;
        window.open(waUrl, '_blank');
    }

});
