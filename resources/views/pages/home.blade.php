@extends('layouts.app')
@section('content')
    {{-- HERO --}}
    <div class="text-center mb-10">
        <h1 class="font-display font-black tracking-tight leading-[1.15] mb-3"
            style="font-size: clamp(1.9rem, 4.5vw, 3.1rem)">
            <span class="highlight-word">Translate</span>
            Bahasa Indonesia<br class="hidden sm:block">
            ke dalam Bahasa Indramayu
        </h1>
        <p class="text-gray-500 font-semibold text-[0.95rem]">
            Aplikasi penerjemah bahasa indonesia ke bahasa indramayu, ditujukan untuk melestarikan bahasa daerah sekaligus
            memudahkan komunikasi lintas bahasa.
        </p>
    </div>

    {{-- TRANSLATOR CARD --}}
    <div id="translator"
        class="slide-up bg-white rounded-2xl border border-gray-200
            shadow-[0_16px_56px_rgba(0,0,0,0.09)] p-6 md:p-8">



        {{-- Two panels + center button --}}
        <div class="grid grid-cols-1 md:grid-cols-[1fr_72px_1fr] gap-4 items-start">

            {{-- INPUT --}}
            <div class="panel rounded-xl border border-gray-200 overflow-hidden bg-[#FDFCF9] transition-all">
                <div class="flex justify-between items-center px-4 py-2.5 bg-gray-50 border-b border-gray-200">
                    <span id="inputLabel" class="text-[0.73rem] font-bold text-gray-700 uppercase tracking-widest">
                        Kalimat Indonesia
                    </span>
                    <span id="charCount" class="text-[0.73rem] font-semibold text-gray-400">0 / 500</span>
                </div>
                <textarea id="inputText"
                    class="w-full min-h-[190px] p-4 bg-transparent border-none outline-none
                       font-semibold text-[0.97rem] text-gray-900 leading-relaxed
                       placeholder:text-gray-400 placeholder:font-normal"
                    placeholder="Ketik atau tempel teks di sini…" maxlength="500" spellcheck="false"></textarea>
                <div class="flex justify-end gap-1 px-3 py-2 bg-gray-50 border-t border-gray-200">
                    {{-- Copy input --}}
                    <button id="copyInputBtn" title="Salin teks"
                        class="w-8 h-8 flex items-center justify-center rounded-lg
                       text-gray-400 hover:bg-gold-light hover:text-gray-700 transition">
                        @include('components.icon-copy')
                    </button>
                    {{-- Clear --}}
                    <button id="clearBtn" title="Hapus"
                        class="w-8 h-8 flex items-center justify-center rounded-lg
                       text-gray-400 hover:bg-gold-light hover:text-gray-700 transition">
                        @include('components.icon-x')
                    </button>
                </div>
            </div>

            {{-- CENTER: Translate button --}}
            <div class="flex items-center justify-center md:pt-[116px] z-10">

            </div>

            {{-- OUTPUT --}}
            <div class="panel rounded-xl border border-gray-200 overflow-hidden bg-[#FDFCF9] transition-all">
                <div class="flex justify-between items-center px-4 py-2.5 bg-gray-50 border-b border-gray-200">
                    <span id="outputLabel" class="text-[0.73rem] font-bold text-gray-700 uppercase tracking-widest">
                        Kalimat Indramayu
                    </span>
                    <span id="statusDot" class="w-2 h-2 rounded-full transition-all duration-300"></span>
                </div>
                <div id="outputText"
                    class="min-h-[190px] p-4 font-semibold text-[0.97rem] text-gray-900
                  leading-relaxed whitespace-pre-wrap break-words">
                    <span class="text-gray-400 font-normal italic">Hasil terjemahan akan muncul di sini…</span>
                </div>
                <div class="flex justify-end gap-1 px-3 py-2 bg-gray-50 border-t border-gray-200">
                    {{-- Copy output --}}
                    <button id="copyOutputBtn" title="Salin hasil"
                        class="w-8 h-8 flex items-center justify-center rounded-lg
                       text-gray-400 hover:bg-gold-light hover:text-gray-700 transition">
                        @include('components.icon-copy')
                    </button>
                    <button id="clearBtn" title="Hapus"
                        class="w-8 h-8 flex items-center justify-center rounded-lg
                       text-gray-400 hover:bg-gold-light hover:text-gray-700 transition">
                        @include('components.icon-x')
                    </button>
                    {{-- TTS --}}
                    {{-- <button id="speakBtn" title="Dengarkan"
                class="w-8 h-8 flex items-center justify-center rounded-lg
                       text-gray-400 hover:bg-gold-light hover:text-gray-700 transition">
          @include('components.icon-speaker')
        </button> --}}
                </div>
            </div>

        </div>{{-- end grid --}}

        {{-- Example chips --}}
        <div class="flex flex-wrap items-center gap-3 mt-6 pt-5 border-t border-gray-200">
            <span class="text-[0.73rem] font-bold text-gray-400 uppercase tracking-widest shrink-0">
                Contoh kalimat:
            </span>
            <div class="flex flex-wrap gap-2">
                @foreach ([
            'Saya pergi ke pasar setiap hari Minggu' => 'Saya pergi ke pasar',
            'Apa kabar kamu hari ini?' => 'Apa kabar kamu?',
            'Terima kasih banyak atas bantuannya' => 'Terima kasih banyak',
            'Rumah saya ada di dekat sungai' => 'Rumah saya di sungai',
        ] as $full => $short)
                    <button
                        class="example-chip font-bold text-[0.83rem] px-4 py-1.5 rounded-full
                       border border-gray-300 bg-[#FAFAF7] text-gray-600
                       hover:bg-gold-light hover:border-gold-dark hover:text-gray-900
                       hover:-translate-y-px transition-all duration-150"
                        data-text="{{ $full }}">
                        {{ $short }}
                    </button>
                @endforeach
            </div>
        </div>

    </div>{{-- end card --}}
    <section id="about" class="relative overflow-hidden py-16 md:py-24">
        {{-- Decorative circle top-right --}}
        <div
            class="pointer-events-none absolute -top-16 -right-16 w-64 h-64 rounded-full border border-gray-200 opacity-40">
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
    <section id="foundation" class="border-t border-b border-gray-100 py-14 md:py-20 bg-gray-50">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <p class="font-display font-black  leading-tight text-gray-900" style="font-size: clamp(1.6rem, 4.5vw, 3rem);">
                <span class="uppercase">APLIKASI INI MENERJEMAHKAN BAHASA DERMAYON MENGGUNAKAN METODE</span>
                <span class="highlight-word">MODEL LLMs</span>
                <span class="uppercase">YANG DILATIH DARI DATASET BAHASA INDONESIA KE BAHASA INDRAMAYU.</span>
            </p>
        </div>
    </section>

    {{-- SECTION HEADER: THE STORY --}}
    <section id="history" class="py-16 md:py-24 bg-gray-100 shadow-lg rounded-lg">
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
                        <p class="text-xs font-semibold uppercase tracking-widest text-gray-400 mb-2">Bahasa & Identitas
                        </p>
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
                                <img src="{{ asset('images/ui.png') }}" alt="Ilustrasi Web App"
                                    class="object-cover rounded">
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

@push('scripts')
    <script>
        // ── API base URL (change in TranslatorController.php) ─────────
        const API_BASE = @json($apiBase);

        // ── DOM refs ──────────────────────────────────────────────────
        const inputText = document.getElementById('inputText');
        const outputText = document.getElementById('outputText');
        // const translateBtn  = document.getElementById('translateBtn');
        const btnLabel = document.getElementById('btnLabel');
        const btnSpinner = document.getElementById('btnSpinner');
        const clearBtn = document.getElementById('clearBtn');
        const copyInputBtn = document.getElementById('copyInputBtn');
        const copyOutputBtn = document.getElementById('copyOutputBtn');
        // const speakBtn      = document.getElementById('speakBtn');
        // const swapBtn       = document.getElementById('swapBtn');
        const charCount = document.getElementById('charCount');
        const statusDot = document.getElementById('statusDot');
        const inputLabel = document.getElementById('inputLabel');
        const outputLabel = document.getElementById('outputLabel');
        // const badge1        = document.getElementById('badge1');
        // const badge2        = document.getElementById('badge2');
        const toast = document.getElementById('toast');

        // ── State ─────────────────────────────────────────────────────
        let isSwapped = false;
        let debounce = null;
        const PLACEHOLDER = 'Hasil terjemahan akan muncul di sini…';

        // ── Helpers ───────────────────────────────────────────────────
        function setOutput(text) {
            outputText.innerHTML = '';
            outputText.textContent = text;
        }

        function clearOutputToPlaceholder() {
            outputText.innerHTML =
                `<span class="text-gray-400 font-normal italic">${PLACEHOLDER}</span>`;
        }

        function setStatus(state) {
            statusDot.className = 'w-2 h-2 rounded-full transition-all duration-300 ';
            if (state === 'ok') statusDot.className += 'bg-emerald-500 shadow-[0_0_0_3px_rgba(52,211,153,0.2)]';
            if (state === 'error') statusDot.className += 'bg-red-500 shadow-[0_0_0_3px_rgba(248,113,113,0.2)]';
        }

        let toastTimer;

        function showToast(msg) {
            toast.textContent = msg;
            toast.classList.add('show');
            clearTimeout(toastTimer);
            toastTimer = setTimeout(() => toast.classList.remove('show'), 2800);
        }

        // ── Char counter --────────────────────────────────────────────
        inputText.addEventListener('input', () => {
            const len = inputText.value.length;
            charCount.textContent = `${len} / 500`;
            charCount.style.color = len > 450 ? '#D94F4F' : '';

            clearTimeout(debounce);
            if (len > 3) {
                debounce = setTimeout(doTranslate, 650);
            } else {
                clearOutputToPlaceholder();
                setStatus(null);
            }
        });

        // ── Translate ─────────────────────────────────────────────────
        // translateBtn.addEventListener('click', doTranslate);
        // inputText.addEventListener('keydown', e => {
        //   if (e.key === 'Enter' && (e.ctrlKey || e.metaKey)) doTranslate();
        // });

        async function doTranslate() {
            const text = inputText.value.trim();
            if (!text) return;

            // Loading state
            // translateBtn.disabled = true;
            // btnLabel.classList.add('hidden');
            // btnSpinner.classList.remove('hidden');
            outputText.innerHTML = '';
            outputText.classList.add('loading-dots');
            setStatus(null);

            try {
                const endpoint = `${API_BASE}/translate`;

                const res = await fetch(endpoint, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        text
                    }),
                });

                if (!res.ok) {
                    const err = await res.json().catch(() => ({}));
                    throw new Error(err.detail || `Error ${res.status}`);
                }

                const data = await res.json();
                setOutput(data.translate);
                setStatus('ok');

            } catch (err) {
                clearOutputToPlaceholder();
                setStatus('error');
                showToast('❌ ' + err.message);
            } finally {
                // translateBtn.disabled = false;
                // btnLabel.classList.remove('hidden');
                // btnSpinner.classList.add('hidden');
                outputText.classList.remove('loading-dots');
            }
        }

        // ── Clear ─────────────────────────────────────────────────────
        clearBtn.addEventListener('click', () => {
            inputText.value = '';
            charCount.textContent = '0 / 500';
            clearOutputToPlaceholder();
            setStatus(null);
            inputText.focus();
        });

        // ── Copy ──────────────────────────────────────────────────────
        copyInputBtn.addEventListener('click', () => {
            const t = inputText.value.trim();
            if (!t) return;
            navigator.clipboard.writeText(t).then(() => showToast('✅ Teks disalin!'));
        });

        copyOutputBtn.addEventListener('click', () => {
            const t = outputText.innerText.trim();
            if (!t || t === PLACEHOLDER) return;
            navigator.clipboard.writeText(t).then(() => showToast('✅ Terjemahan disalin!'));
        });

        // ── TTS ───────────────────────────────────────────────────────
        // speakBtn.addEventListener('click', () => {
        //   const t = outputText.innerText.trim();
        //   if (!t || t === PLACEHOLDER) return;
        //   if (!('speechSynthesis' in window)) { showToast('❌ TTS tidak didukung'); return; }
        //   window.speechSynthesis.cancel();
        //   const u = new SpeechSynthesisUtterance(t);
        //   u.lang = 'id-ID'; u.rate = 0.9;
        //   window.speechSynthesis.speak(u);
        //   showToast('🔊 Memutar…');
        // });

        // ── Swap ──────────────────────────────────────────────────────
        // swapBtn.addEventListener('click', () => {
        //   isSwapped = !isSwapped;

        //   const prevOut = outputText.innerText.trim() === PLACEHOLDER ? '' : outputText.innerText.trim();
        //   const prevIn  = inputText.value;
        //   inputText.value = prevOut;
        //   charCount.textContent = `${inputText.value.length} / 500`;

        //   if (isSwapped) {
        //     inputLabel.textContent  = 'Kalimat Indramayu';
        //     outputLabel.textContent = 'Kalimat Indonesia';
        //     badge1.textContent = '🏡 Indramayu';
        //     badge2.textContent = '🇮🇩 Indonesia';
        //   } else {
        //     inputLabel.textContent  = 'Kalimat Indonesia';
        //     outputLabel.textContent = 'Kalimat Indramayu';
        //     badge1.textContent = '🇮🇩 Indonesia';
        //     badge2.textContent = '🏡 Indramayu';
        //   }

        //   prevIn ? setOutput(prevIn) : clearOutputToPlaceholder();
        //   setStatus(null);
        //   if (inputText.value.trim()) doTranslate();
        // });

        // ── Example chips ─────────────────────────────────────────────
        document.querySelectorAll('.example-chip').forEach(chip => {
            chip.addEventListener('click', () => {
                inputText.value = chip.dataset.text;
                charCount.textContent = `${inputText.value.length} / 500`;
                doTranslate();
                document.getElementById('translator').scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
@endpush
