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
    Aplikasi penerjemah bahasa indonesia ke bahasa indramayu, ditujukan untuk melestarikan bahasa daerah sekaligus memudahkan komunikasi lintas bahasa.
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
        <span id="inputLabel"
              class="text-[0.73rem] font-bold text-gray-700 uppercase tracking-widest">
          Kalimat Indonesia
        </span>
        <span id="charCount" class="text-[0.73rem] font-semibold text-gray-400">0 / 500</span>
      </div>
      <textarea id="inputText"
                class="w-full min-h-[190px] p-4 bg-transparent border-none outline-none
                       font-semibold text-[0.97rem] text-gray-900 leading-relaxed
                       placeholder:text-gray-400 placeholder:font-normal"
                placeholder="Ketik atau tempel teks di sini…"
                maxlength="500" spellcheck="false"></textarea>
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
        <span id="outputLabel"
              class="text-[0.73rem] font-bold text-gray-700 uppercase tracking-widest">
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
      @foreach([
        'Saya pergi ke pasar setiap hari Minggu' => 'Saya pergi ke pasar',
        'Apa kabar kamu hari ini?'               => 'Apa kabar kamu?',
        'Terima kasih banyak atas bantuannya'    => 'Terima kasih banyak',
        'Rumah saya ada di dekat sungai'         => 'Rumah saya di sungai',
      ] as $full => $short)
        <button class="example-chip font-bold text-[0.83rem] px-4 py-1.5 rounded-full
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

@endsection

@push('scripts')
<script>
// ── API base URL (change in TranslatorController.php) ─────────
const API_BASE = @json($apiBase);

// ── DOM refs ──────────────────────────────────────────────────
const inputText     = document.getElementById('inputText');
const outputText    = document.getElementById('outputText');
// const translateBtn  = document.getElementById('translateBtn');
const btnLabel      = document.getElementById('btnLabel');
const btnSpinner    = document.getElementById('btnSpinner');
const clearBtn      = document.getElementById('clearBtn');
const copyInputBtn  = document.getElementById('copyInputBtn');
const copyOutputBtn = document.getElementById('copyOutputBtn');
// const speakBtn      = document.getElementById('speakBtn');
// const swapBtn       = document.getElementById('swapBtn');
const charCount     = document.getElementById('charCount');
const statusDot     = document.getElementById('statusDot');
const inputLabel    = document.getElementById('inputLabel');
const outputLabel   = document.getElementById('outputLabel');
// const badge1        = document.getElementById('badge1');
// const badge2        = document.getElementById('badge2');
const toast         = document.getElementById('toast');

// ── State ─────────────────────────────────────────────────────
let isSwapped     = false;
let debounce      = null;
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
  if (state === 'ok')    statusDot.className += 'bg-emerald-500 shadow-[0_0_0_3px_rgba(52,211,153,0.2)]';
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
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ text }),
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
    document.getElementById('translator').scrollIntoView({ behavior: 'smooth' });
  });
});
</script>
@endpush