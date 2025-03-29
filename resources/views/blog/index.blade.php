@extends('layouts.app_layout_with_navbar')

@section('title', 'Blogs')

@section('main_content')
  <section class="welcome-section">
    <h1 class="welcome-title">Mūsu raksti</h1>
    <p class="welcome-text">
    Mājaslapas sadaļa, veltīta bloga ierakstiem par sērām, būs droša vieta, kur lasītāji varēs rast mierinājumu un sapratni grūtos brīžos. Tajā tiks apskatīti sēru emocionālie un praktiskie aspekti, sniedzot atbalstu un iedrošinājumu pieņemt zaudējumu. Ieraksti dalīsies pieredzē un piedāvās resursus, lai palīdzētu rast iekšējo mieru.
    </p>
  </section>

  <div class="cards-container">
    <div class="card">
      <img src="{{ asset('images/Blogs_1_seras.jpg') }}" alt="Ceļvedis tiem">
      <div class="card-content">
        <h2 class="card-title">Piecas sēru stadijas – kā tās palīdz saprast mūsu emocijas</h2>
        <p class="card-text">Uzziniet, kā piecas sēru stadijas var palīdzēt labāk saprast mūsu emocijas un pakāpeniski pielāgoties zaudējumam.</p>
        <a href="{{ route('blog.piecas-seru-stadijas') }}" class="card-button">Lasīt</a>
      </div>
    </div>

    <div class="card">
      <img src="{{ asset('images/Blogs_2_vainas.jpg') }}" alt="Ceļvedis tiem">
      <div class="card-content">
        <h2 class="card-title">Bailes no nāves – kā tās saprast un pieņemt</h2>
        <p class="card-text">Bailes no nāves ir dabiska parādība, taču, izprotot un pieņemot tās, mēs varam dzīvot pilnvērtīgāk un ar mazāku trauksmi.</p>
        <a href="{{ route('blog.bailes-no-naves') }}" class="card-button">Lasīt</a>
      </div>
    </div>

    <div class="card">
      <img src="{{ asset('images/Blogs_3_bailes.jpg') }}" alt="Ceļvedis tiem">
      <div class="card-content">
        <h2 class="card-title">Vainas apziņa un nāve – kā ar to tikt galā?</h2>
        <p class="card-text">Vainas apziņa pēc tuvinieka zaudējuma ir dabiska sēru daļa, un šajā rakstā aplūkoti veidi, kā to saprast, pieņemt un mazināt.</p>
        <a href="{{ route('blog.vainas-apzina-un-nave') }}" class="card-button">Lasīt</a>
      </div>
    </div>

    <!-- <div class="card">
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
      </div> -->
    </div>
  </div>
  </main>
@endsection
