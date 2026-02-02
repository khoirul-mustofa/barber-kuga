<div class="space-y-6 animate-fade-in-up">
    <!-- Name -->
    <div>
        <label for="name" class="block text-sm font-medium text-emerald-900 dark:text-emerald-100 mb-1">Nama Lengkap</label>
        <div class="relative rounded-md shadow-sm">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
            </div>
            <input type="text" id="name" wire:model.defer="name" 
                class="block w-full pl-10 pr-3 py-3 border border-emerald-200 rounded-lg leading-5 bg-white dark:bg-emerald-900/40 dark:border-emerald-700 placeholder-emerald-400 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 sm:text-sm transition duration-150 ease-in-out text-emerald-900 dark:text-emerald-100 placeholder-emerald-400/60"
                placeholder="Nama Anda">
        </div>
        @error('name') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
    </div>

    <!-- Phone -->
    <div>
        <label for="phone" class="block text-sm font-medium text-emerald-900 dark:text-emerald-100 mb-1">Nomor Telepon</label>
        <div class="relative rounded-md shadow-sm">
             <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                </svg>
            </div>
            <input type="tel" id="phone" wire:model.defer="phone" 
                class="block w-full pl-10 pr-3 py-3 border border-emerald-200 rounded-lg leading-5 bg-white dark:bg-emerald-900/40 dark:border-emerald-700 placeholder-emerald-400 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 sm:text-sm transition duration-150 ease-in-out text-emerald-900 dark:text-emerald-100 placeholder-emerald-400/60"
                placeholder="08123456789">
        </div>
        @error('phone') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
    </div>

    <!-- Email (Optional) -->
    <div>
        <label for="email" class="block text-sm font-medium text-emerald-900 dark:text-emerald-100 mb-1">Email <span class="text-emerald-400 font-normal">(Opsional)</span></label>
        <div class="relative rounded-md shadow-sm">
             <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
            </div>
            <input type="email" id="email" wire:model.defer="email" 
                class="block w-full pl-10 pr-3 py-3 border border-emerald-200 rounded-lg leading-5 bg-white dark:bg-emerald-900/40 dark:border-emerald-700 placeholder-emerald-400 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 sm:text-sm transition duration-150 ease-in-out text-emerald-900 dark:text-emerald-100 placeholder-emerald-400/60"
                placeholder="you@example.com">
        </div>
        @error('email') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
    </div>

    <!-- Note (Optional) -->
    <div>
        <label for="note" class="block text-sm font-medium text-emerald-900 dark:text-emerald-100 mb-1">Catatan untuk Barber <span class="text-emerald-400 font-normal">(Opsional)</span></label>
        <div class="relative rounded-md shadow-sm">
            <textarea id="note" wire:model.defer="note" rows="3"
                class="block w-full p-3 border border-emerald-200 rounded-lg leading-5 bg-white dark:bg-emerald-900/40 dark:border-emerald-700 placeholder-emerald-400 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 sm:text-sm transition duration-150 ease-in-out text-emerald-900 dark:text-emerald-100 placeholder-emerald-400/60"
                placeholder="Saya ingin model fade..."></textarea>
        </div>
         @error('note') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
    </div>
</div>
