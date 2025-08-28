
@extends('layouts.app_layout_with_navbar')

@section('title', 'paymentsuccess')

@section('main_content')
<div class="guide-background">
  <section class="welcome-section px-6 py-6">
<img src="{{ asset('images/handshake_.svg') }}" 
     alt="veiksmigi" 
     style="width: 100%; height: 120px; padding: 10px;">
    </h1>
    
    <p class="text-lg mb-6 text-center">
      Paldies, Tavs maksājums ir saņemts un reģistrācija noritējusi veiksmīgi!
    </p>

    <div class="text-center">
      <button class="bg-gradient-to-r from-moss to-emerald-800 hover:from-emerald-800 hover:to-moss text-white font-bold py-4 px-8 rounded-3xl shadow-lg transform hover:-translate-y-1 transition-all duration-200" onclick="window.location.href = '{{ route('dashboard') }}'">
        Sākt plānot
      </button>
    </div>

  </section>
</div>

@endsection