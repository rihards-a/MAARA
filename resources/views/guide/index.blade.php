@extends('layouts.app_layout_with_navbar')

@section('title', 'Guide')

@section('main_content')
<div class="guide-background">
    <section class="welcome-section-guide">
      <h1 class="welcome-title">Kā rīkoties pēc tuvinieka nāves</h1>
      <p>
      Šajā ceļvedī apkopotā informācija ir sagatavota ar mērķi sniegt praktisku atbalstu sarežģītā dzīves brīdī. Tā balstās uz publiski pieejamiem avotiem, un, lai arī esam centušies to veidot pēc iespējas precīzu un saprotamu, pastāv iespējamas izmaiņas vai nianses, kas šeit nav ietvertas. Aicinām nepieciešamības gadījumā vērsties pie atbildīgajām iestādēm vai speciālistiem, lai saņemtu oficiālu informāciju. Ceļveža veidotāji neuzņemas juridisku atbildību par šeit sniegtās informācijas precizitāti. Ja jūs pamanāt kādas detaļas, kas nav bijušas atbilstošas jūsu pieredzei, vai jums ir papildinājumi, lūdzu, sazinieties ar mums, rakstot uz info@maara.id.lv
        <br><br>
      </p>

      <div class="cards-container-guide">
        @php
          $guides = [
            ['number' => 1, 'title' => 'Ko darīt uzreiz pēc tuvinieka nāves?', 'text' => 'Pirmie svarīgie soļi pēc tuvinieka aiziešanas – praktiski padomi, kam zvanīt, kā rīkoties un kur vērsties.', 'route' => route('guide.afterloss')],
            ['number' => 2, 'title' => 'Miršanas fakta reģistrācija', 'text' => 'Skaidrojums par miršanas fakta reģistrēšanu – nepieciešamie dokumenti, atbildīgās iestādes un praktiski soļi.', 'route' => route('guide.registering')],
            ['number' => 3, 'title' => 'Pieejamais pabalsts', 'text' => 'Kur pieteikties apbedīšanas pabalstam, lai segtu tuvinieka bēru izdevumus – termiņš un noderīgas saites.', 'route' => route('guide.available_support')],
            ['number' => 4, 'title' => 'Mantojuma lietas uzsākšana', 'text' => 'Svarīgākais par mantojuma lietas sākšanu – kur vērsties, kādi dokumenti nepieciešami un kas jāzina.', 'route' => route('guide.inheritance')],
            ['number' => 5, 'title' => 'Saziņa ar banku', 'text' => 'Kam vērts pievērst uzmanību, sazinoties ar banku pēc tuvinieka nāves – dokumenti un nianses.', 'route' => route('guide.establishments')],
            ['number' => 6, 'title' => 'Apbedīšana', 'text' => 'Izvēles un pārdomas par bēru norisi – no apbedīšanas veida līdz ceremonijas sajūtām un detaļām.', 'route' => route('guide.burial')],
            ['number' => 7, 'title' => 'Emocionāls atbalsts palicējiem', 'text' => 'Kā atļaut sev sērot, būt klātesošam savās emocijās un kur meklēt sev piemērotu atbalstu.', 'route' => route('guide.legacy')],
          ];
        @endphp

        @foreach($guides as $guide)
          <div class="card-guide">
            <div class="card-content-guide">
              <div class="card-top">
                <p class="guide-numbers">{{ $guide['number'] }}</p>
                <h2 class="card-title-guide">{{ $guide['title'] }}</h2>
              </div>
              <div class="card-bottom">
                <p class="card-text-guide">{{ $guide['text'] }}</p>
                <a href="{{ $guide['route'] }}" class="card-button">Lasīt</a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </section>
  </div>
@endsection

