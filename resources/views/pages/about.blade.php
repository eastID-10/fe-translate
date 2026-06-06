@extends('layouts.app')

@section('content')
    {{-- HERO --}}
    <section class="relative overflow-hidden py-16 md:py-24">
        {{-- Decorative circle top-right --}}
        <div class="pointer-events-none absolute -top-16 -right-16 w-64 h-64 rounded-full border border-gray-200 opacity-40">
        </div>
        <div class="pointer-events-none absolute -top-8 -right-8 w-40 h-40 rounded-full border border-gray-200 opacity-40">
        </div>

        <div class="max-w-5xl mx-auto px-6">
            {{-- Tagline --}}
            <p class="text-xs font-semibold uppercase tracking-[0.2em] text-gray-400 mb-6">
                Tentang DermayonTL
            </p>

            {{-- Giant hero text --}}
            <h1 class="font-display font-black uppercase leading-[0.88] tracking-tight text-gray-900 mb-8"
                style="font-size: clamp(3.5rem, 11vw, 8rem);">
                AWAL<br>
                <span class="inline-block relative">
                    MULA DERMAYONTL
                    {{-- Decorative arrow --}}
                    <svg class="absolute -bottom-6 left-1/2 -translate-x-1/2 w-5 h-8 text-gray-400" viewBox="0 0 20 32"
                        fill="none" xmlns="http://www.w3.org/2000/svg">
                        <line x1="10" y1="0" x2="10" y2="28" stroke="currentColor"
                            stroke-width="1" />
                        <polyline points="5,22 10,30 15,22" stroke="currentColor" stroke-width="1" fill="none" />
                    </svg>
                </span>
            </h1>

            <p class="text-sm text-gray-400 max-w-xs leading-relaxed mt-10">
                DermayonTL berfokus pada pelestarian bahasa daerah — menjembatani Bahasa Indonesia dan Bahasa Jawa Dialek
                Indramayu melalui teknologi AI.
            </p>
        </div>
    </section>

    {{-- BOLD STATEMENT --}}
    <section class="border-t border-b border-gray-100 py-14 md:py-20 bg-gray-50">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <p class="font-display font-black  leading-tight text-gray-900"
                style="font-size: clamp(1.6rem, 4.5vw, 3rem);">
                <span class="uppercase">APLIKASI INI MENERJEMAHKAN BAHASA DERMAYON MENGGUNAKAN METODE</span>
                <span class="highlight-word">MODEL LLMs</span>
                <span class="uppercase">YANG DILATIH DARI DATASET BAHASA INDONESIA KE BAHASA INDRAMAYU.</span>
            </p>
        </div>
    </section>

    {{-- SECTION HEADER: THE STORY --}}
    <section class="py-16 md:py-24 bg-gray-100 shadow-lg rounded-lg" >
        <div class="max-w-5xl mx-auto px-6">

            <div class="text-center mb-16 md:mb-24">
                <p class="text-xs font-semibold uppercase tracking-[0.2em] text-gray-400 mb-3">Cerita Sejarah</p>
                <h2 class="font-display italic font-bold text-gray-900 text-3xl md:text-5xl mb-3">
                    The Story Began
                </h2>
                <p class="text-sm text-gray-400">
                    Berawal dari keresahan akan bahasa daerah yang perlahan terlupakan
                </p>
                {{-- Arrow down --}}
                <div class="flex justify-center mt-6">
                    <svg class="w-4 h-10 text-gray-300" viewBox="0 0 16 40" fill="none">
                        <line x1="8" y1="0" x2="8" y2="36" stroke="currentColor"
                            stroke-width="1" />
                        <polyline points="3,30 8,38 13,30" stroke="currentColor" stroke-width="1" fill="none" />
                    </svg>
                </div>
            </div>

            {{-- TIMELINE --}}
            <div class="relative">
                {{-- Center vertical line --}}
                <div class="hidden md:block absolute left-1/2 -translate-x-px top-0 bottom-0 w-px bg-gray-200"></div>

                {{-- ITEM 1: text left, image right --}}
                <div class="relative flex flex-col md:flex-row items-start md:items-center gap-8 md:gap-0 mb-20 md:mb-28">
                    <div class="md:w-1/2 md:pr-16 md:text-right">
                        <p class="text-xs font-semibold uppercase tracking-widest text-gray-400 mb-2">Bahasa & Identitas</p>
                        <h3 class="font-display font-black uppercase text-xl md:text-2xl text-gray-900 leading-tight mb-3">
                            Bahasa Dermayon —<br>Dialek Khas Indramayu
                        </h3>
                        <p class="text-sm text-gray-500 leading-relaxed">
                            Walaupun Indramayu berada di Jawa Barat, sebagian besar warganya bertutur dalam Bahasa Dermayon
                            — dialek Jawa yang hampir serupa dengan Dialek Cirebon, namun memiliki karakter tersendiri yang
                            kaya.
                        </p>
                        <a href="#"
                            class="inline-flex items-center gap-1 mt-4 text-xs font-semibold uppercase tracking-widest text-gray-400 hover:text-gray-900 transition-colors">
                            <span>→</span>
                        </a>
                    </div>

                    {{-- Center dot --}}
                    <div
                        class="hidden md:flex absolute left-1/2 -translate-x-1/2 w-3 h-3 rounded-full border border-gray-300 bg-white z-10">
                    </div>
                    <div class="md:w-1/2 md:pl-16">
                        <div class="aspect-video bg-gray-100 rounded overflow-hidden shadow-lg">
                            <div
                                class="w-full h-full flex items-center justify-center text-gray-300 text-xs tracking-widest uppercase">
                               <img src="{{ asset('images/alun-alun.png') }}" alt=" Alun-alun Indramayu"
                            class="object-cover   rounded">

                            </div>
                        </div>
                    </div>
                     
                </div>

                {{-- ITEM 2: image left, text right --}}
                <div class="relative flex flex-col md:flex-row items-start md:items-center gap-8 md:gap-0 mb-20 md:mb-28">
                      <div class="md:w-1/2 md:pr-16 order-2 md:order-1">
                        <div class="aspect-video bg-gray-100 rounded overflow-hidden shadow-lg">
                            <div
                                class="w-full h-full flex items-center justify-center text-gray-300 text-xs tracking-widest uppercase">
                                <img src="{{ asset('images/genz-scaled.jpg') }}" alt="Ilustrasi Language Mixing"
                                    class="object-cover   rounded">
                            </div>
                        </div>
                    </div>

                    <div
                        class="hidden md:flex absolute left-1/2 -translate-x-1/2 w-3 h-3 rounded-full border border-gray-300 bg-white z-10">
                    </div>

                    <div class="md:w-1/2 md:pl-16 order-1 md:order-2">
                        <p class="text-xs font-semibold uppercase tracking-widest text-gray-400 mb-2">Tantangan Zaman</p>
                        <h3 class="font-display font-black uppercase text-xl md:text-2xl text-gray-900 leading-tight mb-3">
                            Language Mixing<br>di Generasi Z
                        </h3>
                        <p class="text-sm text-gray-500 leading-relaxed">
                            Generasi muda Indramayu kerap mencampur Bahasa Indonesia dan Bahasa Dermayon dalam satu
                            percakapan. Fenomena ini bukan keterbatasan, melainkan identitas sosial — namun tanpa dukungan
                            teknologi, kelangsungan bahasa aslinya semakin rentan.
                        </p>
                        <a href="#"
                            class="inline-flex items-center gap-1 mt-4 text-xs font-semibold uppercase tracking-widest text-gray-400 hover:text-gray-900 transition-colors">
                            <span>→</span>
                        </a>
                    </div>
                </div>

                {{-- ITEM 3: text left, image right --}}
                <div class="relative flex flex-col md:flex-row items-start md:items-center gap-8 md:gap-0 mb-20 md:mb-28">
                    <div class="md:w-1/2 md:pr-16 md:text-right">
                        <p class="text-xs font-semibold uppercase tracking-widest text-gray-400 mb-2">Teknologi AI</p>
                        <h3 class="font-display font-black uppercase text-xl md:text-2xl text-gray-900 leading-tight mb-3">
                            LLM untuk<br>Low-Resource Language
                        </h3>
                        <p class="text-sm text-gray-500 leading-relaxed">
                            Mayoritas model AI berfokus pada Bahasa Indonesia atau Bahasa Jawa standar. DermayonTL mengisi
                            celah ini dengan model Machine Translation yang secara khusus dilatih untuk dialek Indramayu
                            menggunakan pendekatan hibrida data manual dan semi-otomatis.
                        </p>
                        <a href="#"
                            class="inline-flex items-center gap-1 mt-4 text-xs font-semibold uppercase tracking-widest text-gray-400 hover:text-gray-900 transition-colors">
                            <span>→</span>
                        </a>
                    </div>

                    <div
                        class="hidden md:flex absolute left-1/2 -translate-x-1/2 w-3 h-3 rounded-full border border-gray-300 bg-white z-10">
                    </div>

                    <div class="md:w-1/2 md:pl-16">
                        <div class="aspect-video bg-gray-100 rounded overflow-hidden shadow-lg">
                            <div
                                class="w-full h-full flex items-center justify-center text-gray-300 text-xs tracking-widest uppercase">
                                <img src="{{ asset('images/ai.jpg') }}" alt="Ilustrasi AI" class="object-cover rounded">

                            </div>
                        </div>
                    </div>
                </div>

                {{-- ITEM 4: image left, text right --}}
                <div class="relative flex flex-col md:flex-row items-start md:items-center gap-8 md:gap-0">
                    <div class="md:w-1/2 md:pr-16 order-2 md:order-1">
                        <div class="aspect-video bg-gray-100 rounded overflow-hidden shadow-lg">
                            <div
                                class="w-full h-full flex items-center justify-center text-gray-300 text-xs tracking-widest uppercase">
                                <img src="{{ asset('images/ui.png') }}" alt="Ilustrasi Web App" class="object-cover rounded">
                            </div>
                        </div>
                    </div>

                    <div
                        class="hidden md:flex absolute left-1/2 -translate-x-1/2 w-3 h-3 rounded-full border border-gray-300 bg-white z-10">
                    </div>

                    <div class="md:w-1/2 md:pl-16 order-1 md:order-2">
                        <p class="text-xs font-semibold uppercase tracking-widest text-gray-400 mb-2">Implementasi</p>
                        <h3 class="font-display font-black uppercase text-xl md:text-2xl text-gray-900 leading-tight mb-3">
                            Aplikasi Web<br>Terbuka untuk Semua
                        </h3>
                        <p class="text-sm text-gray-500 leading-relaxed">
                            Sebagai wujud nyata riset, DermayonTL hadir sebagai platform web yang dapat diakses tanpa
                            instalasi — oleh penutur asli, pelajar, peneliti, maupun siapa saja yang ingin lebih dekat
                            dengan Bahasa Dermayon.
                        </p>
                        <a href="#"
                            class="inline-flex items-center gap-1 mt-4 text-xs font-semibold uppercase tracking-widest text-gray-400 hover:text-gray-900 transition-colors">
                            <span>→</span>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- CLOSING STATEMENT --}}
    <section class="border-t border-gray-100 py-16 text-center">
        <p class="font-display italic font-bold text-gray-400 text-2xl md:text-3xl tracking-wide mb-12">
            Journey Never Stop
        </p>

        {{-- CTA --}}
        <a href="{{ route('home') }}"
            class="inline-flex items-center gap-2 bg-gold text-gray-900 font-extrabold text-sm
              px-7 py-3.5 rounded-full shadow-[0_4px_18px_rgba(245,200,66,0.4)]
              hover:bg-gold-dark hover:scale-105 transition-all duration-200">
            ← Coba Translator
        </a>
    </section>

    {{-- FOOTER BRAND --}}
    <section class="border-t border-gray-100 pt-10 pb-8">
        <div class="max-w-5xl mx-auto px-6 flex flex-col md:flex-row justify-between items-end gap-8">
            {{-- Giant brand name --}}
            <h2 class="font-display font-black uppercase leading-[0.85] text-gray-900"
                style="font-size: clamp(3rem, 9vw, 6rem);">
                DERMAYON<br>TL
            </h2>

            {{-- Footer links --}}
            <div class="flex gap-12 text-xs text-gray-400 uppercase tracking-widest pb-2">
                <div class="flex flex-col gap-2">
                    <a href="{{ route('home') }}" class="hover:text-gray-900 transition-colors">Translator</a>
                    <a href="{{ route('about') }}" class="hover:text-gray-900 transition-colors">Tentang</a>
                    <a href="#" class="hover:text-gray-900 transition-colors">Riset</a>
                </div>
                <div class="flex flex-col gap-2">
                    <span>Bahasa Dermayon</span>
                    <span>Indramayu, Jawa Barat</span>
                    <span>Indonesia</span>
                </div>
            </div>
        </div>

        <div class="max-w-5xl mx-auto px-6 mt-6 flex justify-between items-center">
            <p class="text-xs text-gray-300">@dermayontl</p>
            <p class="text-xs text-gray-300">DermayonTL · Proyek Machine Translation Dialek Indramayu</p>
        </div>
    </section>
@endsection
