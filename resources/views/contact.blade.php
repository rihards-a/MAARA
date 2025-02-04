@extends('layouts.app_layout_with_navbar')

@section('title', 'Ziedot')

@section('main_content')
  <section class="welcome-section">
    <h1 class="welcome-title">Kontakti</h1>
      <p class="welcome-text">
        Mēs atrodamies inovāciju, sadarbības un izaugsmes veicināšanas centrā Startup House Riga.
      </p>
  </section>

  <div class="map">
    <img src="{{ asset('images/map2.png') }}" alt="map">
  </div>
@endsection
