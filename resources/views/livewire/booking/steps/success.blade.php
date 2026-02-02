<div class="text-center py-12 animate-fade-in-up">
    <div class="mx-auto flex items-center justify-center h-20 w-20 rounded-full bg-emerald-100 dark:bg-emerald-900/50 mb-6">
        <svg class="h-10 w-10 text-emerald-600 dark:text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M5 13l4 4L19 7"></path>
        </svg>
    </div>

    <h2 class="text-3xl font-extrabold text-emerald-900 dark:text-white mb-2">Booking Berhasil!</h2>
    <p class="text-emerald-600 dark:text-emerald-300 mb-8 max-w-sm mx-auto">
        Terima kasih. Kami telah menerima bukti pembayaran Anda dan akan segera memverifikasinya.
    </p>

    <div class="bg-emerald-50 dark:bg-emerald-900/50 rounded-xl p-6 mb-8 inline-block w-full max-w-sm border border-emerald-100 dark:border-emerald-800">
        <p class="text-sm text-emerald-600 dark:text-emerald-300 mb-1">Kode Booking Anda</p>
        <p class="text-3xl font-mono font-bold text-emerald-700 dark:text-emerald-400 tracking-wider select-all">
            {{ $booking_code }}
        </p>
        <p class="text-xs text-emerald-500 dark:text-emerald-400 mt-2">Simpan kode ini untuk cek status booking.</p>
        <div class="mt-4">
             <a href="{{ route('check-booking') }}" target="_blank" class="text-sm text-emerald-600 hover:text-emerald-800 underline">Cek Status Booking Sekarang -></a>
        </div>
    </div>

    <div class="flex justify-center space-x-4">
        <a href="{{ route('home') }}"
            class="px-6 py-3 border border-transparent text-base font-medium rounded-lg text-emerald-800 bg-emerald-100 hover:bg-emerald-200 transition">
            Kembali ke Beranda
        </a>
         <button onclick="window.print()"
            class="px-6 py-3 border border-emerald-300 dark:border-emerald-700 text-base font-medium rounded-lg text-emerald-700 dark:text-emerald-300 bg-white dark:bg-emerald-900/50 hover:bg-emerald-50 dark:hover:bg-emerald-800 transition">
            Cetak Detail
        </button>
    </div>
</div>
