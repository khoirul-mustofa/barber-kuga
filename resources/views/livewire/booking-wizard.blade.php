<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 min-h-screen">
    {{-- Header --}}
    <div class="mb-8 text-center mt-20">
        <h1 class="text-3xl font-extrabold text-emerald-900 dark:text-emerald-400">
            Reservasi Jadwal
        </h1>
        <p class="mt-2 text-emerald-700 dark:text-emerald-300">
            Potongan dan gaya premium, hanya dengan beberapa klik.
        </p>
    </div>  

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        {{-- LEFT COLUMN: WIZARD STEPS --}}
        <div class="lg:col-span-8">
            {{-- Progress Bar (Desktop) --}}
            <div class="mb-8 hidden sm:block">
                <div class="relative">
                    <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-emerald-100 dark:bg-emerald-900">
                        <div style="width:{{ ($step / 6) * 100 }}%"
                            class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-emerald-500 transition-all duration-500 ease-in-out">
                        </div>
                    </div>
                    <div class="flex justify-between text-xs text-emerald-400 font-medium uppercase tracking-wider">
                        <span class="{{ $step >= 1 ? 'text-emerald-700 font-bold dark:text-emerald-400' : '' }}">Layanan</span>
                        <span class="{{ $step >= 2 ? 'text-emerald-700 font-bold dark:text-emerald-400' : '' }}">Barber</span>
                        <span class="{{ $step >= 3 ? 'text-emerald-700 font-bold dark:text-emerald-400' : '' }}">Waktu</span>
                        <span class="{{ $step >= 4 ? 'text-emerald-700 font-bold dark:text-emerald-400' : '' }}">Data Diri</span>
                        <span class="{{ $step >= 5 ? 'text-emerald-700 font-bold dark:text-emerald-400' : '' }}">Pembayaran</span>
                        <span class="{{ $step >= 6 ? 'text-emerald-700 font-bold dark:text-emerald-400' : '' }}">Selesai</span>
                    </div>
                </div>
            </div>

            {{-- Main Card --}}
            <div class="bg-white dark:bg-emerald-900 shadow-xl rounded-2xl p-6 sm:p-8 border border-emerald-100 dark:border-emerald-800 relative overflow-hidden">
                {{-- Step Title --}}
                <h2 class="text-2xl font-bold text-emerald-900 dark:text-white mb-6 border-b border-emerald-100 dark:border-emerald-800 pb-4">
                    @if ($step == 1) Pilih Layanan
                    @elseif($step == 2) Pilih Barber
                    @elseif($step == 3) Tanggal & Waktu
                    @elseif($step == 4) Informasi Anda
                    @elseif($step == 5) Metode Pembayaran
                    @elseif($step == 6) Booking Dikonfirmasi
                    @endif
                </h2>

                {{-- Steps --}}
                <div class="min-h-[300px]">
                    @if ($step === 1)
                        @include('livewire.booking.steps.service')
                    @elseif ($step === 2)
                        @include('livewire.booking.steps.barber')
                    @elseif ($step === 3)
                        @include('livewire.booking.steps.datetime')
                    @elseif ($step === 4)
                        @include('livewire.booking.steps.customer')
                    @elseif ($step === 5)
                        @include('livewire.booking.steps.payment')
                    @elseif ($step === 6)
                        @include('livewire.booking.steps.success')
                    @endif
                </div>

                {{-- Navigation --}}
                @if ($step < 6)
                    <div class="mt-8 pt-6 border-t border-emerald-100 dark:border-emerald-800 flex justify-between items-center">
                        @if ($step > 1)
                            <button wire:click="prevStep"
                                class="px-6 py-2.5 rounded-lg text-emerald-600 dark:text-emerald-300 font-medium hover:bg-emerald-50 dark:hover:bg-emerald-800 transition  focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-300">
                                ← Kembali
                            </button>
                        @else
                            <div></div>
                        @endif

                        @if ($step > 2 && $step < 5)
                            {{-- Step 3,4,5 use Next button. Step 1&2 usually auto-advance or have specific selection logic --}}
                            <button wire:click="nextStep"
                                class="px-8 py-2.5 rounded-lg bg-emerald-900 text-white font-semibold hover:bg-emerald-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-900 shadow-lg hover:shadow-xl transition transform hover:-translate-y-0.5 border border-yellow-500/50">
                                Lanjut →
                            </button>
                        @endif
                        {{-- Note: Step 1 (Services) and Step 2 (Barbers) often advance on card click, but we can keep Next if selection is separate --}}
                    </div>
                @endif
            </div>
        </div>

        {{-- RIGHT COLUMN: SUMMARY PANEL (Sticky) --}}
        <div class="lg:col-span-4">
            <div class="sticky top-24">
                <div class="bg-white dark:bg-emerald-900 shadow-xl rounded-2xl p-6 border border-emerald-100 dark:border-emerald-800">
                    <h3 class="text-lg font-bold text-emerald-950 dark:text-white mb-4 flex items-center">
                        <span class="bg-emerald-100 text-emerald-600 p-1.5 rounded-md mr-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                        </span>
                        Ringkasan Booking
                    </h3>

                    <div class="space-y-4 text-sm">
                         {{-- Service --}}
                         <div class="flex justify-between pb-3 border-b border-emerald-100 dark:border-emerald-800">
                            <span class="text-emerald-600 dark:text-emerald-400">Layanan</span>
                            <span class="font-medium text-emerald-900 dark:text-white">
                                {{ $services->find($service_id)?->name ?? 'Belum dipilih' }}
                            </span>
                        </div>

                         {{-- Barber --}}
                         <div class="flex justify-between pb-3 border-b border-emerald-100 dark:border-emerald-800">
                            <span class="text-emerald-600 dark:text-emerald-400">Barber</span>
                            <span class="font-medium text-emerald-900 dark:text-white">
                                {{ $barbers->find($barber_id)?->name ?? 'Belum dipilih' }}
                            </span>
                        </div>

                         {{-- Date & Time --}}
                         <div class="flex justify-between pb-3 border-b border-emerald-100 dark:border-emerald-800">
                            <span class="text-emerald-600 dark:text-emerald-400">Antrian</span>
                            <div class="text-right">
                                <div class="font-medium text-emerald-900 dark:text-white">{{ $booking_date ? \Carbon\Carbon::parse($booking_date)->format('d M Y') : '-' }}</div>
                                <div class="text-emerald-600 font-semibold">{{ $booking_time ? substr($booking_time, 0, 5) : '-' }}</div>
                            </div>
                        </div>

                        {{-- Total --}}
                         <div class="pt-2">
                            <div class="flex justify-between items-center mb-1">
                                <span class="text-emerald-600 dark:text-emerald-300">Total Harga</span>
                                <span class="font-bold text-emerald-900 dark:text-white">
                                    Rp {{ $service_id ? number_format($services->find($service_id)->price, 0, ',', '.') : '0' }}
                                </span>
                            </div>
                            <div class="flex justify-between items-center text-lg">
                                <span class="font-bold text-emerald-700">DP Diperlukan (50%)</span>
                                <span class="font-extrabold text-emerald-700">
                                     Rp {{ $service_id ? number_format($services->find($service_id)->price * 0.5, 0, ',', '.') : '0' }}
                                </span>
                            </div>
                        </div>
                    </div>

                    {{-- Help Support --}}
                    <div class="mt-6 pt-4 border-t border-emerald-100 dark:border-emerald-800 text-center">
                        <p class="text-xs text-emerald-400">Butuh bantuan? <a href="#" class="text-emerald-600 hover:text-emerald-700 underline">Hubungi Admin</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
