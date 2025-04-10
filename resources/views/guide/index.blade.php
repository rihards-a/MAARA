@extends('layouts.app_layout_with_navbar')

@section('title', 'Guide')

@section('main_content')
  <section class="welcome-section-guide">
    <h1 class="welcome-title">Kas jādara pēc tuvinieka nāves - ceļvedis palicējiem.</h1>
    <p class="welcome-text">Lorem impsum<br></p>

      <div class="cards-container-guide">
        <div class="card-guide">
          <div class="card-content-guide">
            <p class="guide-numbers">1</p>
            <h2 class="card-title-guide">Ko darīt uzreiz pēc tuvinieka nāves?</h2>
            <p class="card-text-guide">Pirmie svarīgie soļi pēc tuvinieka aiziešanas – praktiski padomi, kam zvanīt, kā rīkoties un kur vērsties.</p>
            <a href="{{ route('guide.afterloss') }}" class="card-button">Lasīt</a>  
          </div>
        </div>
        <div class="card-guide">
          <div class="card-content-guide">
            <p class="guide-numbers">2</p>
            <h2 class="card-title-guide">Miršanas fakta reģistrācija</h2>
            <p class="card-text-guide">Skaidrojums par miršanas fakta reģistrēšanu – nepieciešamie dokumenti, atbildīgās iestādes un praktiski soļi.</p>
            <a href="{{ route('guide.registering') }}" class="card-button">Lasīt</a>
          </div>
        </div>
        <div class="card-guide">
          <div class="card-content-guide">
            <p class="guide-numbers">3</p>
            <h2 class="card-title-guide">Pieejamais pabalsts</h2>
            <p class="card-text-guide">Kur pieteikties apbedīšanas pabalstam, lai segtu tuvinieka bēru izdevumus – termiņš un noderīgas saites.</p>
            <a href="{{ route('guide.available_support') }}" class="card-button">Lasīt</a>
          </div>
        </div>
        <div class="card-guide">
          <div class="card-content-guide">
            <p class="guide-numbers">4</p>
            <h2 class="card-title-guide">Mantojuma lietas uzsākšana</h2>
            <p class="card-text-guide">Svarīgākais par mantojuma lietas sākšanu – kur vērsties, kādi dokumenti nepieciešami un kas jāzina.</p>
            <a href="{{ route('guide.inheritance') }}" class="card-button">Lasīt</a>  
          </div>
        </div>
        <div class="card-guide">
          <div class="card-content-guide">
            <p class="guide-numbers">5</p>
            <h2 class="card-title-guide">Saziņa ar banku</h2>
            <p class="card-text-guide">Kam vērts pievērst uzmanību, sazinoties ar banku pēc tuvinieka nāves – dokumenti un nianses.</p>
            <a href="{{ route('guide.establishments') }}" class="card-button">Lasīt</a>
          </div>
        </div>
        <div class="card-guide">
          <div class="card-content-guide">
            <p class="guide-numbers">6</p>
            <h2 class="card-title-guide">Apbedīšana</h2>
            <p class="card-text-guide">Izvēles un pārdomas par bēru norisi – no apbedīšanas veida līdz ceremonijas sajūtām un detaļām.</p>
            <a href="{{ route('guide.burial') }}" class="card-button">Lasīt</a>
          </div>
        </div>
        <div class="card-guide">
          <div class="card-content-guide">
            <p class="guide-numbers">7</p>
            <h2 class="card-title-guide">Emocionāls atbalsts palicējiem</h2>
            <p class="card-text-guide">Kā atļaut sev sērot, būt klātesošam savās emocijās un kur meklēt sev piemērotu atbalstu.</p>
            <a href="{{ route('guide.legacy') }}" class="card-button">Lasīt</a>  
                     </div>
        </div>
      </div>
  </section>
@endsection

