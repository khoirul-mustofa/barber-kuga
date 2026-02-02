<header class="fixed w-full top-0 z-50 transition-all duration-300" id="header" 
    x-data="{ 
        scrolled: false, 
        isHome: {{ request()->routeIs('home') ? 'true' : 'false' }},
        mobileMenuOpen: false 
    }" 
    @scroll.window="scrolled = (window.pageYOffset > 20)"
    :class="{ 
        'bg-white/95 backdrop-blur-md shadow-md py-2': scrolled || !isHome,
        'bg-transparent py-4': !scrolled && isHome
    }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex justify-between items-center h-16">
            <!-- Logo -->
            <a href="/" class="flex items-center gap-3 group">
                <img src="{{ asset('images/logo.png') }}" alt="KUGA Logo" class="h-10 w-auto transform transition group-hover:scale-105">
                <div class="flex flex-col">
                    <span class="text-xl font-bold tracking-wide font-heading transition-colors duration-300"
                        :class="(scrolled || !isHome) ? 'text-green-900' : 'text-white'">KUGA</span>
                    <span class="text-[0.65rem] font-bold uppercase tracking-[0.2em] -mt-1 transition-colors duration-300"
                        :class="(scrolled || !isHome) ? 'text-yellow-600' : 'text-yellow-400'">Barbershop</span>
                </div>
            </a>

            <!-- Desktop Menu -->
            <ul class="hidden md:flex items-center space-x-8">
                @foreach([
                    ['href' => '/#home', 'label' => 'Beranda'],
                    ['href' => '/#tentang', 'label' => 'Tentang'],
                    ['href' => '/#layanan', 'label' => 'Layanan'],
                    ['href' => '/#galeri', 'label' => 'Galeri'],
                    ['href' => '/#harga', 'label' => 'Harga'],
                    ['href' => route('booking'), 'label' => 'Booking', 'active' => request()->routeIs('booking')],
                    ['href' => route('check-booking'), 'label' => 'Cek Booking', 'active' => request()->routeIs('check-booking')],
                    ['href' => '/#kontak', 'label' => 'Kontak']
                ] as $item)
                    <li>
                        <a href="{{ $item['href'] }}" 
                           class="text-sm font-semibold transition-colors duration-200 relative group"
                           :class="{
                               'text-emerald-700': {{ ($item['active'] ?? false) ? 'true' : 'false' }} && (scrolled || !isHome),
                               'text-emerald-800 hover:text-emerald-600': !{{ ($item['active'] ?? false) ? 'true' : 'false' }} && (scrolled || !isHome),
                               'text-white hover:text-yellow-400': !scrolled && isHome
                           }">
                            {{ $item['label'] }}
                            <span class="absolute -bottom-1 left-0 w-0 h-0.5 transition-all duration-300 group-hover:w-full"
                                  :class="{
                                      'bg-yellow-500': scrolled || !isHome,
                                      'bg-yellow-400': !scrolled && isHome,
                                      'w-full': {{ ($item['active'] ?? false) ? 'true' : 'false' }}
                                  }"></span>
                        </a>
                    </li>
                @endforeach
            </ul>

            <!-- Mobile Menu Button -->
            <div class="flex items-center gap-4">
                <x-theme-toggle />
                
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden p-2 rounded-md focus:outline-none transition-colors"
                    :class="(scrolled || !isHome) ? 'text-emerald-800 hover:text-emerald-600' : 'text-white hover:text-yellow-400'">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" x-show="!mobileMenuOpen"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" x-show="mobileMenuOpen" style="display: none;"/>
                    </svg>
                </button>
            </div>
        </nav>

        <!-- Mobile Menu Dropdown -->
        <div x-show="mobileMenuOpen" 
             x-transition:enter="transition ease-out duration-100"
             x-transition:enter-start="transform opacity-0 scale-95"
             x-transition:enter-end="transform opacity-100 scale-100"
             x-transition:leave="transition ease-in duration-75"
             x-transition:leave-start="transform opacity-100 scale-100"
             x-transition:leave-end="transform opacity-0 scale-95"
             class="md:hidden absolute top-full left-0 w-full bg-white shadow-lg border-t border-emerald-100 py-2" 
             style="display: none;">
             
             @foreach([
                ['href' => '/#home', 'label' => 'Beranda'],
                ['href' => '/#tentang', 'label' => 'Tentang'],
                ['href' => '/#layanan', 'label' => 'Layanan'],
                ['href' => '/#galeri', 'label' => 'Galeri'],
                ['href' => '/#harga', 'label' => 'Harga'],
                ['href' => route('booking'), 'label' => 'Booking'],
                ['href' => route('check-booking'), 'label' => 'Cek Booking'],
                ['href' => '/#kontak', 'label' => 'Kontak']
            ] as $item)
                <a href="{{ $item['href'] }}" 
                   @click="mobileMenuOpen = false"
                   class="block px-6 py-3 text-base font-medium text-emerald-800 hover:bg-emerald-50 hover:text-emerald-600 transition-colors">
                    {{ $item['label'] }}
                </a>
            @endforeach
        </div>
    </div>
</header>