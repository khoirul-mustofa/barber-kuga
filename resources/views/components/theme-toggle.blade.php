<div x-data="{
    theme: localStorage.getItem('theme') || 'system',
    isDark: false,
    init() {
        this.updateTheme();
        window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => this.updateTheme());
    },
    updateTheme() {
        if (this.theme === 'dark' || (this.theme === 'system' && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
            this.isDark = true;
        } else {
            document.documentElement.classList.remove('dark');
            this.isDark = false;
        }
    },
    toggle() {
        if (this.theme === 'light') {
            this.theme = 'dark';
        } else if (this.theme === 'dark') {
            this.theme = 'system';
        } else {
            this.theme = 'light';
        }
        localStorage.setItem('theme', this.theme);
        this.updateTheme();
    }
}" x-init="init()" class="relative flex items-center">
    <button @click="toggle()" 
        class="group flex items-center justify-center p-2 rounded-lg transition-all duration-300 focus:outline-none"
        :class="isDark ? 'text-amber-400 hover:bg-white/10' : 'text-amber-500 hover:bg-black/5'"
        aria-label="Toggle Theme">
        
        <!-- Sun Icon (Light Mode) -->
        <svg x-show="theme === 'light'" x-transition:enter="transition ease-out duration-300" 
             x-transition:enter-start="transform rotate-90 opacity-0" 
             x-transition:enter-end="transform rotate-0 opacity-100" 
             class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                  d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
        </svg>

        <!-- Moon Icon (Dark Mode) -->
        <svg x-show="theme === 'dark'" x-transition:enter="transition ease-out duration-300" 
             x-transition:enter-start="transform -rotate-90 opacity-0" 
             x-transition:enter-end="transform rotate-0 opacity-100"
             style="display: none;" 
             class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                  d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
        </svg>
        
        <!-- System Icon (Auto) -->
         <svg x-show="theme === 'system'" x-transition:enter="transition ease-out duration-300" 
             x-transition:enter-start="transform scale-50 opacity-0" 
             x-transition:enter-end="transform scale-100 opacity-100"
             style="display: none;"
             class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                  d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
        </svg>
    </button>
</div>
