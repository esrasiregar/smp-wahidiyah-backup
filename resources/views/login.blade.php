{{-- resources/views/login.blade.php --}}
@extends('layout.app')

@section('title', 'Login')

@section('content')
  <div class="fixed inset-0 z-50 flex items-center justify-center p-4">
    {{-- Overlay --}}
    <div class="fixed inset-0 bg-black/30 backdrop-blur-sm"></div>

    {{-- Modal --}}
    <div class="relative z-10 w-full max-w-md">
      <div class="bg-white rounded-2xl shadow-2xl overflow-hidden">

        {{-- Close Button --}}
      <a href="{{ url('/') }}"
        class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 transition-colors z-10"
        aria-label="Tutup">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M6 18L18 6M6 6l12 12"/>
        </svg>
      </a>


        {{-- Header --}}
        <div class="pt-10 pb-6 px-8 text-center">
          <div class="mx-auto w-24 h-24 mb-4">
            <img src="{{ asset('images/logosmp.png') }}"
                 alt="Logo SMP Wahidiyah"
                 class="w-full h-full object-contain">
          </div>
          <h1 class="text-xl font-bold text-gray-800">SMP WAHIDIYAH</h1>
          <p class="text-lg text-gray-600">SAMARINDA</p>
        </div>

        {{-- Single Login Button --}}
        <div class="px-8 pb-10 text-center">
          <a href="{{ url('/dashboard') }}"
                  target="_blank"
        rel="noopener noreferrer"
             class="w-full block bg-teal-500 hover:bg-teal-600 text-white font-semibold py-3 rounded-lg transition-all duration-200 transform hover:scale-[1.02] focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2 uppercase tracking-wide">
            Masuk ke Dashboard
          </a>
        </div>

        {{-- Footer --}}
        <div class="bg-gray-50 px-8 py-4 text-center border-t">
          <p class="text-xs text-gray-500">
            © {{ now()->year }} SMP Wahidiyah Samarinda.
          </p>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('styles')
<style>
  body { overflow: hidden; }
  @keyframes fadeIn { from {opacity:0; transform:translateY(-12px)} to {opacity:1; transform:translateY(0)} }
  .relative.z-10 { animation: fadeIn .25s ease-out }
</style>
@endpush
