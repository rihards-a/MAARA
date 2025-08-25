@extends('layouts.app_layout_with_navbar')

@section('title', 'Ceļvedis palicējiem')

@section('main_content')
@if (auth()->user()->haslifetime() /*TODO: need to create a pretty screen redirecting anyone unsubscribed to the subscribe page nicely*/ )  
<div class="guide-background">
    <section class="welcome-section-guide">
      <section section class="welcome-section">
        <h1 class="welcome-title">Prieks Tevi redzēt, {{ Auth::user()->name }}</h1>
        <p>
        Tu esi īstajā vietā, lai sāktu apzināti plānot savas izvēles.<br>
          <br>
          1. Veic plānošanas darbu <br>
          2. Saglabā savas vēlmes<br>
          3. Ērti eksportē savu norāžu kopsavilkumu drošai uzglabāšanai.<br>
          <br>
          <b>Plānošanas statuss:</b> aizpildītas {{$completed_questionnaire_count}} no 8 sadaļām <br>                           <b>Pēdējo reizi izmaiņas veiktas:</b>
            @if($latestSubmission && $latestSubmission->updated_at)
              {{ \Carbon\Carbon::parse($latestSubmission->updated_at)->locale('lv')->diffForHumans() }}
            @else
              Izmaiņas vēl nav veiktas.
            @endif<br>
              <div class="w-full flex justify-end">
                <a href="{{ route('generate.pdf') }}" target="_blank" class="block w-full md:w-1/5 text-sm card-button px-6 py-3 bg-moss text-white rounded-md hover:bg-lime-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150 text-center whitespace-normal">
                    Eksportēt kopsavilkumu
                </a>
              </div>
        </p>
      </section>

      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-4 gap-4 items-stretch">
        @php
          $guides = [
            ['type' => 'med', 'title' => 'Medicīniskās izvēles un pilnvaras', 'text' => 'Paredzamais aizpildes laiks: 10 minūtes', 'route' => route('dashboard.med'), 'image' => '/images/a1.svg'],
            ['type' => 'pensija', 'title' => 'Pensijas mantošana', 'text' => 'Paredzamais aizpildes laiks: 5 minūtes', 'route' => route('dashboard.pensija'), 'image' => '/images/a2.svg'],
            ['type' => 'beres', 'title' => 'Apbedīšanas izvēles', 'text' => 'Paredzamais aizpildes laiks: 60 minūtes', 'route' => route('dashboard.beres'), 'image' => '/images/a3.svg'],
            ['type' => 'finanses', 'title' => 'Finanšu pārvaldība', 'text' => 'Paredzamais aizpildes laiks: 30 minūtes', 'route' => route('dashboard.finanses'), 'image' => '/images/a4.svg'],
            ['type' => 'testaments', 'title' => 'Testamenta sagatavošana', 'text' => 'Paredzamais aizpildes laiks: 60 minūtes', 'route' => route('dashboard.testaments'), 'image' => '/images/a5.svg'],
            ['type' => 'digmantojums', 'title' => 'Digitālais mantojums', 'text' => 'Paredzamais aizpildes laiks: 120 minūtes', 'route' => route('dashboard.digmantojums'), 'image' => '/images/a6.svg'],
            ['type' => 'pienakumi', 'title' => 'Dzīves pienākumu pārņemšana', 'text' => 'Paredzamais aizpildes laiks: 60 minūtes', 'route' => route('dashboard.pienakumi'), 'image' => '/images/a7.svg'],
            ['type' => 'zinas', 'title' => 'Ziņas palicējiem', 'text' => 'Paredzamais aizpildes laiks: 60 minūtes', 'route' => route('dashboard.zinas'), 'image' => '/images/a8.svg'],

          ];
        @endphp
@foreach($guides as $guide)
    @php
        $buttonText = $questionnaire_progress[$guide['type']] ?? 'Sākt';
        if ($buttonText === 'Turpināt') {
            $btnClass = 'bg-moss';
        } elseif ($buttonText === 'Labot') {
            $btnClass = 'bg-gray-400 hover:bg-gray-300';
        } else {
            $btnClass = '';
        }
    @endphp

    <div class="bg-white rounded-lg shadow-lg p-6 sm:p-8 flex flex-col items-start overflow-hidden relative min-h-[280px]">
          
        <div class="absolute -top-16 -left-16 w-36 h-36 bg-[color:var(--primary-color)] rounded-full flex items-center justify-center">
            <img src="{{ $guide['image'] }}" alt="Icon" class="w-12 h-12 translate-x-6 translate-y-6" />
        </div>

        <div class="content-area translate-y-4 w-full pt-12 flex flex-col flex-grow"> 
            <h3 class="text-l font-bold mb-3 leading-tight text-gray-800">
                {{ $guide['title'] }}
            </h3>
            
            <div class="mt-auto w-full"> 
                <p class="text-sm text-gray-600 mb-2">
                    {{ $guide['text'] }}
                </p>
                
                <div class="w-full px-8 flex justify-center mt-4"> 
                    <a href="{{ $guide['route'] }}" 
                       class="card-button text-white px-4 py-2 rounded transition-colors duration-200 {{ $btnClass }}">
                        {{ $buttonText }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endforeach


      </div>

        <div class="mt-10 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-4 items-stretch">
            <a href="mailto:info@maara.id.lv" class="text-sm card-button px-6 py-3 bg-moss text-white rounded-md hover:bg-lime-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150">
                Tehniskais atbalsts
            </a>

            <a href="{{ route('profile.edit') }}" class="text-sm card-button px-6 py-3 bg-moss text-white rounded-md hover:bg-lime-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150">
                Profila iestatījumi
            </a>

            <a>
              <!-- Trigger -->
              <button onclick="showDeletePopup()" class="text-sm card-button px-6 py-3 bg-moss text-white rounded-md hover:bg-lime-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150">Dzēst manas atbildes</button>

              <!-- Popup -->
              <div id="delete-popup" class="fixed inset-0 bg-black/50 flex items-center justify-center hidden z-50">
                <div class="text-black bg-white p-6 rounded-md shadow-md text-center max-w-xs">
                  <p>Vai tiešām vēlaties dzēst visas atbildes?</p>
                  <form method="POST" action="{{ route('dashboard.responses.delete.all') }}">
                    @csrf
                    <div class="mt-10 grid grid-cols-2 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 gap-4 items-stretch">
                      <button type="submit" class="card-button">Dzēst</button>
                      <button type="button" onclick="hideDeletePopup()" class="card-button">Atcelt</button>
                    </div>
                  </form>
                </div>
              </div>
            </a>
        </div>

    </section>
  </div>

  <script>
  function showDeletePopup() {
    document.getElementById('delete-popup').classList.remove('hidden');
  }

  function hideDeletePopup() {
    document.getElementById('delete-popup').classList.add('hidden');
  }
</script>
@else
<section class="welcome-section px-6 py-6">
  <h1 class="welcome-title text-2xl font-bold mb-4">
    Jauna lietotāja reģistrācija: piekļuve MAARA sistēmai
  </h1>

  <p class="welcome-text text-sm mb-6">
    Lai izmantotu MAARA plānošanas funkcionalitāti, <b>iegādājies bezlimita piekļuvi</b> MAARA pēcdzīves plānošanas rīkam par tikai EUR 14,99.
  </p>

  <div class="mb-6">
    <img src="{{ asset('images/samplepageb.png') }}" 
         alt="samplepageb" 
         class="w-full h-auto p-2">
  </div>

  <div class="flex justify-center my-6">
    <button class="card-button-green max-w-sm" data-url="{{ route('lifetime.index') }}">Sākt plānot</button>
  </div>

  <p class="text-lg mb-4">
    <b>Pēc šī vienreizējā maksājuma veikšanas, Tu iegūsi:</b>
  </p>

  <ul class="list-disc list-inside text-sm ml-4 mt-2 space-y-1">
    <ul class="list-none space-y-2">
      <li class="flex items-start"><span class="text-green-500 mr-2">✔</span> Beztermiņa piekļuvi plānošanas rīkam</li>
      <li class="flex items-start"><span class="text-green-500 mr-2">✔</span> Ātru un ērtu eksporta funkcionalitāti</li>
      <li class="flex items-start"><span class="text-green-500 mr-2">✔</span> Plānošanas padomus, kas seko līdzi izmaiņām likumos</li>
      <li class="flex items-start"><span class="text-green-500 mr-2">✔</span> Pieeju tehniskajam un informatīvajam lietotāju atbalstam</li>
      <li class="flex items-start"><span class="text-green-500 mr-2">✔</span> Nosūtīsim Tev ikgadēju atgādinājumu pārskatīt savas atbildes</li>
  </ul>

</section>


@endif
@endsection



