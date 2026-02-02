@extends('kuga.layouts.app')

@section('content')
    <div class="bg-white dark:bg-emerald-950 min-h-screen pt-32 pb-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            {{-- Title Section --}}
            <div class="text-center max-w-3xl mx-auto mb-16 animate-fade-in-up">
                <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 dark:text-white mb-4">
                    Style <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-600 to-teal-500">Journal</span>
                </h1>
                <p class="text-lg text-emerald-600 dark:text-emerald-300">
                    Panduan lengkap gaya rambut dan tips grooming terbaik dari Barber Expert kami.
                </p>
                <div class="h-1 w-24 bg-emerald-500 mx-auto mt-6 rounded-full"></div>
            </div>

            {{-- Journals Grid --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($journals as $journal)
                    <div class="bg-white dark:bg-emerald-900 rounded-2xl shadow-lg border border-emerald-100 dark:border-emerald-800 overflow-hidden flex flex-col hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 group">
                        {{-- Image Wrapper --}}
                        <div class="relative h-64 overflow-hidden">
                            <img src="{{ asset('storage/' . $journal->image) }}" 
                                 class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700"
                                 alt="{{ $journal->title }}">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </div>

                        {{-- Content --}}
                        <div class="p-6 flex-1 flex flex-col">
                            <h3 class="text-xl font-bold text-emerald-950 dark:text-white mb-3 line-clamp-2">
                                {{ $journal->title }}
                            </h3>
                            <p class="text-emerald-600 dark:text-emerald-300 mb-6 flex-1 line-clamp-3 leading-relaxed">
                                {{ $journal->summary }}
                            </p>
                            
                            <a href="{{ route('journal.view', $journal->title) }}" 
                               class="inline-flex justify-center items-center w-full px-4 py-3 bg-white dark:bg-emerald-800 border-2 border-emerald-500 text-emerald-600 dark:text-emerald-300 font-semibold rounded-xl hover:bg-emerald-500 hover:text-white transition-all duration-300 group-hover/btn">
                                <span>Baca Panduan</span>
                                <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection