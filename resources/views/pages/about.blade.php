@extends('layouts.app')
@section('content')

{{-- HERO --}}
<div class="text-center mb-10">
  <h1 class="font-display font-black tracking-tight leading-[1.15] mb-3"
      style="font-size: clamp(1.9rem, 4.5vw, 3.1rem)">
    Tentang <span class="highlight-word">DermayonTL</span>
  </h1>
  <p class="text-gray-500 font-semibold text-[0.95rem]">
    Proyek machine translation bahasa daerah Indramayu
  </p>
</div>

{{-- Cards --}}
<div class="grid grid-cols-1 sm:grid-cols-2 gap-5 slide-up">
  @foreach([
    ['icon'=>'🤖','title'=>'Model',
     'desc'=>'Dibangun di atas <strong>Llama 3</strong> yang di-fine-tune selama 10 epoch dengan dataset paralel Bahasa Indonesia – Bahasa Indramayu (dialek Dermayu).'],
    ['icon'=>'🏡','title'=>'Bahasa Indramayu',
     'desc'=>'Bahasa Indramayu (Dermayu) adalah dialek bahasa Jawa yang digunakan di Kabupaten Indramayu, Jawa Barat, dengan kekhasan fonologi dan kosakata tersendiri.'],
    ['icon'=>'⚡','title'=>'Teknologi',
     'desc'=>'Frontend: <strong>Laravel + Blade + Tailwind CSS</strong>. Backend terpisah menggunakan Python dengan model Llama 3 fine-tuned untuk terjemahan.'],
    ['icon'=>'📊','title'=>'Training',
     'desc'=>'Fine-tuning dilakukan dengan metode LoRA (Low-Rank Adaptation) pada base model Llama 3, memungkinkan model belajar pola terjemahan dengan sumber daya terbatas.'],
  ] as $c)
  <div class="bg-white rounded-xl border border-gray-200 p-6
              hover:border-gold hover:shadow-[0_8px_30px_rgba(0,0,0,0.09)]
              hover:-translate-y-1 transition-all duration-200">
    <div class="text-3xl mb-3">{{ $c['icon'] }}</div>
    <h3 class="font-display font-bold text-lg mb-2">{{ $c['title'] }}</h3>
    <p class="text-gray-500 text-sm leading-relaxed">{!! $c['desc'] !!}</p>
  </div>
  @endforeach
</div>

{{-- CTA --}}
<div class="text-center mt-10">
  <a href="{{ route('utama') }}"
     class="inline-flex items-center gap-2 bg-gold text-gray-900 font-extrabold text-sm
            px-7 py-3.5 rounded-full shadow-[0_4px_18px_rgba(245,200,66,0.4)]
            hover:bg-gold-dark hover:scale-105 transition-all duration-200">
    ← Coba Translator
  </a>
</div>

@endsection