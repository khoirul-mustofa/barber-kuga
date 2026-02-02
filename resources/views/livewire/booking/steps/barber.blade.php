<div class="space-y-6 animate-fade-in-up">
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
        @foreach($barbers as $barber)
            <div wire:click="selectBarber({{ $barber->id }})"
                 class="relative block p-4 rounded-xl border-2 cursor-pointer transition-all duration-200 group text-center
                {{ $barber_id == $barber->id
                    ? 'border-yellow-500 bg-emerald-50 dark:bg-emerald-900/50 shadow-md transform scale-105'
                    : 'border-emerald-100 dark:border-emerald-800 hover:border-emerald-300 dark:hover:border-emerald-600 bg-white dark:bg-emerald-900/30'
                }}">

                {{-- Checkmark for selected --}}
                @if($barber_id == $barber->id)
                    <div class="absolute top-4 right-4 text-emerald-500">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                    </div>
                @endif

                <div class="mx-auto h-24 w-24 rounded-full overflow-hidden border-4 {{ $barber_id == $barber->id ? 'border-yellow-500' : 'border-emerald-100 dark:border-emerald-800 group-hover:border-emerald-300' }} transition-colors">
                    {{-- Placeholder Avatar if no image --}}
                    <div class="h-full w-full bg-emerald-200 dark:bg-emerald-800 flex items-center justify-center text-4xl">
                       {{ $barber->avatar }}
                    </div>
                    {{-- <img src="{{ $barber->avatar_url }}" alt="{{ $barber->name }}" class="h-full w-full object-cover"> --}}
                </div>

                <div class="mt-4">
                    <h3 class="mt-4 text-lg font-bold text-emerald-950 dark:text-white group-hover:text-emerald-700 transition-colors">
                        {{ $barber->name }}
                    </h3>
                    <p class="text-sm text-emerald-600 dark:text-emerald-400">
                       {{ $barber->status ?? 'Top Stylist' }}
                    </p>
                </div>

                <!-- <div class="mt-4 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $barber->is_available ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                     {{ $barber->is_available ? 'Tersedia' : 'Penuh' }}
                </div> -->
            </div>
        @endforeach
    </div>
</div>
