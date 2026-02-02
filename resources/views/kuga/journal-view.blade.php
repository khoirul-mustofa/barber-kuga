@extends('kuga.layouts.app')

@section('content')
    <article class="bg-white dark:bg-emerald-950 min-h-screen">
        {{-- Hero Section --}}
        <div class="relative h-[60vh] min-h-[400px] w-full overflow-hidden">
            <img src="{{ asset('storage/' . $journal->image) }}" 
                 class="absolute inset-0 w-full h-full object-cover"
                 alt="{{ $journal->title }}">
            <div class="absolute inset-0 bg-gradient-to-t from-emerald-950 via-emerald-900/60 to-transparent"></div>
            
            <div class="absolute bottom-0 left-0 w-full p-8 md:p-16">
                <div class="max-w-4xl mx-auto">
                    {{-- Back Link --}}
                    <a href="{{ route('journal.index') }}" class="inline-flex items-center text-white/80 hover:text-white mb-6 transition-colors group">
                        <span class="w-8 h-8 rounded-full bg-white/10 flex items-center justify-center mr-3 group-hover:bg-emerald-500 transition-colors">
                            <svg class="w-4 h-4 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                        </span>
                        Kembali ke Jurnal
                    </a>
                    
                    <h1 class="text-4xl md:text-5xl lg:text-5xl font-extrabold text-white mb-4 leading-tight">
                        {{ $journal->title }}
                    </h1>
                    <p class="text-xl text-emerald-50 font-light max-w-2xl leading-relaxed">
                        {{ $journal->summary }}
                    </p>
                </div>
            </div>
        </div>

        {{-- Content Section --}}
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="prose prose-lg prose-emerald dark:prose-invert max-w-none">
                {!! $journal->content !!}
            </div>
            
            {{-- Share / Action (Optional) --}}
            <div class="mt-16 pt-8 border-t border-emerald-100 dark:border-emerald-800 flex justify-center">
                <a href="{{ route('journal.index') }}" 
                   class="inline-flex items-center px-6 py-3 border border-emerald-300 dark:border-emerald-700 shadow-sm text-base font-medium rounded-md text-emerald-800 dark:text-emerald-200 bg-white dark:bg-emerald-900 hover:bg-emerald-50 dark:hover:bg-emerald-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 transition-colors">
                    Baca Artikel Lainnya
                </a>
            </div>
        </div>
    </article>
@endsection