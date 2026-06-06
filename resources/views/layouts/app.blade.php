<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <link rel="icon" type="image/png" href="{{ asset('images/logo-final.png') }}"> 
    <title>DermayonTL — {{ $title ?? 'Translate Indramayu' }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&family=Playfair+Display:wght@700;900&display=swap"
        rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Nunito', 'sans-serif'],
                        display: ['Playfair Display', 'serif'],
                    },
                    colors: {
                        gold: {
                            DEFAULT: '#F5C842',
                            dark: '#D4A800',
                            light: '#FDF3C0'
                        },
                        cream: '#FAFAF7',
                    },
                }
            }
        }
    </script>

    <style>
        body {
            background: #FAFAF7;
        }

        /* Hero title yellow underline */
        .highlight-word {
            position: relative;
            color: #D4A800;
        }

        .highlight-word::after {
            content: '';
            position: absolute;
            bottom: 2px;
            left: 0;
            width: 100%;
            height: 7px;
            background: #F5C842;
            border-radius: 4px;
            opacity: 0.45;
            z-index: -1;
        }

        /* Card entrance */
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .slide-up {
            animation: slideUp 0.4s ease both;
        }

        /* Swap button arrow spin */
        .swap-btn svg {
            transition: transform 0.35s ease;
        }

        .swap-btn:hover svg {
            transform: rotate(180deg);
        }

        /* Spinner */
        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        .spin {
            animation: spin 0.85s linear infinite;
        }

        /* Output loading dots */
        .loading-dots::after {
            content: '';
            display: inline-block;
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #D4A800;
            animation: blink 1.1s infinite;
            margin-left: 5px;
            vertical-align: middle;
        }

        @keyframes blink {

            0%,
            80%,
            100% {
                opacity: 0;
                transform: scale(0.8);
            }

            40% {
                opacity: 1;
                transform: scale(1);
            }
        }

        /* Toast */
        #toast {
            transition: opacity 0.3s ease, transform 0.3s ease;
        }

        #toast.show {
            opacity: 1 !important;
            transform: translateX(-50%) translateY(0) !important;
        }

        /* Focus ring on panels */
        .panel:focus-within {
            border-color: #D4A800 !important;
        }
    </style>

    @stack('head')
</head>

<body class="font-sans min-h-screen flex flex-col text-gray-900 antialiased">

    {{-- NAVBAR --}}
    <nav
        class="sticky top-0 z-50 flex items-center  bg-white/80
              px-6 md:px-10 h-16
              {{-- bg-[#FAFAF7]/90 backdrop-blur-md --}}
              border-b border-gray-200">
        <div class="w-1/2 md:w-1/3">

            <a href="{{ route('home') }}" class="flex items-center gap-2.5">
                {{-- Logo icon --}}
                <img src="{{ asset('images/logo-final.svg') }}" alt="DermayonTL Logo" class="w-10 h-10">
                <span class="font-extrabold text-[1.18rem] tracking-tight">DermayonTL</span>
            </a>
        </div>
        <div class="flex-1">

            <div class="flex items-center gap-1">
                <a href="{{ route('home') }}"
                    class="font-bold text-sm px-4 py-2 rounded-lg transition-all  
                {{ request()->routeIs('home')
                    ? 'border-b-2 border-[#D4A800]  text-gray-900 shadow-[0_2px_5px_rgba(245,200,66,0.4)]'
                    : 'text-gray-500 hover:text-gray-800 hover:bg:gold-light' }}">
                    Terjemah
                </a>
                <a href="{{ route('about') }}"
                    class="font-bold text-sm px-4 py-2 rounded-lg transition-all
                {{ request()->routeIs('about')
                    ? 'border-b-2 border-[#D4A800]  text-gray-900 shadow-[0_2px_5px_rgba(245,200,66,0.4)]'
                    : 'text-gray-500 hover:text-gray-800 hover:bg:gold-light' }}">
                    Profil
                </a>
            </div>
        </div>
    </nav>

    {{-- PAGE CONTENT --}}
    <main class="flex-1 w-full max-w-5xl mx-auto px-5 py-12 md:py-16">
        @yield('content')
    </main>

    {{-- FOOTER --}}
    <footer class="text-center py-5 text-xs font-semibold text-gray-400 border-t border-gray-200">
        © {{ date('Y') }} <strong class="text-gray-500">DermayonTL</strong>
        &mdash; Model MT Bahasa Indramayu · Powered by Llama 3 Fine-Tuned
    </footer>

    {{-- Toast --}}
    <div id="toast"
        class="fixed bottom-7 left-1/2 -translate-x-1/2 translate-y-3
              bg-gray-900 text-white text-sm font-bold
              px-6 py-3 rounded-full z-[999]
              opacity-0 pointer-events-none whitespace-nowrap">
    </div>

    @stack('scripts')
</body>

</html>
