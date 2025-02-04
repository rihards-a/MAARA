@extends('layouts.app_layout_with_navbar')

@section('title', 'Ziedot')

@section('main_content')
  <section class="welcome-section">
    <h1 class="welcome-title">Mūsu raksti</h1>
    <p class="welcome-text">
    Mājaslapas sadaļa, veltīta bloga ierakstiem par sērām, būs droša vieta, kur lasītāji varēs rast mierinājumu un sapratni grūtos brīžos. Tajā tiks apskatīti sēru emocionālie un praktiskie aspekti, sniedzot atbalstu un iedrošinājumu pieņemt zaudējumu. Ieraksti dalīsies pieredzē un piedāvās resursus, lai palīdzētu rast iekšējo mieru.
    </p>
  </section>

  <div class="cards-container">
    <div class="card">
      <img src="{{ asset('images/1.png') }}" alt="Ceļvedis tiem">
      <div class="card-content">
        <h2 class="card-title">Svētku laiks un sēras</h2>
        <p class="card-text">Kuri organizē ar tuvinieka nāvi saistītos praktiskos jautājumus (bēres, finansiālos jautājumus, u.c.)</p>
        <button class="card-button">Lasīt</button>
      </div>
    </div>

    <div class="card">
      <img src="{{ asset('images/2.png') }}" alt="Ceļvedis tiem">
      <div class="card-content">
        <h2 class="card-title">Ceļvedis tiem</h2>
        <p class="card-text">Kuri organizē ar tuvinieka nāvi saistītos praktiskos jautājumus (bēres, finansiālos jautājumus, u.c.)</p>
        <button class="card-button">Lasīt</button>
      </div>
    </div>

    <div class="card">
      <img src="{{ asset('images/3.png') }}" alt="Ceļvedis tiem">
      <div class="card-content">
        <h2 class="card-title">Ceļvedis tiem</h2>
        <p class="card-text">Kuri organizē ar tuvinieka nāvi saistītos praktiskos jautājumus (bēres, finansiālos jautājumus, u.c.)</p>
        <button class="card-button">Lasīt</button>
      </div>
    </div>

    <div class="card">
      <img src="https://i.postimg.cc/dQRss7hR/image1.png" alt="Ceļvedis tiem">
      <div class="card-content">
        <h2 class="card-title">Ceļvedis tiem</h2>
        <p class="card-text">Kuri organizē ar tuvinieka nāvi saistītos praktiskos jautājumus (bēres, finansiālos jautājumus, u.c.)</p>
        <button class="card-button">Lasīt</button>
      </div>
    </div>

    <div class="card">
      <img src="https://i.postimg.cc/ncHHCHmy/image2.png" alt="Ceļvedis ikkatram">
      <div class="card-content">
        <h2 class="card-title">Ceļvedis ikkatram</h2>
        <p class="card-text">Par to, par ko būtu jāpadomā vēl šajā saulē esot, lai neradītu tuviniekiem liekus sarežģījumus</p>
        <button class="card-button">Lasīt</button>
      </div>
    </div>
  </div>
  </main>
@endsection
