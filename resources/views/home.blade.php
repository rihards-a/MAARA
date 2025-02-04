@extends('layouts.app_layout_with_navbar')

@section('title', 'Ziedot')

@section('main_content')<section class="welcome-section">
    <h1 class="welcome-title">Sveiciens</h1>
    <p class="welcome-text">
      Mēs esam xyz, kuras pašas izgājušas cauri apjukumam, ko pavada tuvinieka aiziešana, tāpēc mēs izveidojām 2 gidus, kas kalpos kā padomdevēji grūtā brīdī.
      Pirmais no tiem izskaidro un dod padomus organizējot visus praktiskos ar aiziešanu saistītos jautājums: soli pa solim. Otrais no tiem paredzēts kā ceļvedis jautājumiem, par ko mums katram jāpadomā vēl dzīviem esot, lai, mūsu aiziešanas gadījumā, aiztaupītu tuviniekiem vismaz daļu satraukumu un apjukuma. Droši lejuplādē tos - tie ir bezmaksas.
    </p>
  </section>

  <div class="cards-container">
    <div class="card">
      <img src="https://i.postimg.cc/dQRss7hR/image1.png" alt="Ceļvedis tiem">
      <div class="card-content">
        <h2 class="card-title">Ceļvedis tiem</h2>
        <p class="card-text">Kuri organizē ar tuvinieka nāvi saistītos praktiskos jautājumus (bēres, finansiālos jautājumus, u.c.)</p>
        <button class="card-button">Izvēlēties</button>
      </div>
    </div>

    <div class="card">
      <img src="https://i.postimg.cc/ncHHCHmy/image2.png" alt="Ceļvedis ikkatram">
      <div class="card-content">
        <h2 class="card-title">Ceļvedis ikkatram</h2>
        <p class="card-text">Par to, par ko būtu jāpadomā vēl šajā saulē esot, lai neradītu tuviniekiem liekus sarežģījumus</p>
        <button class="card-button">Izvēlēties</button>
      </div>
    </div>
  </div>
@endsection
