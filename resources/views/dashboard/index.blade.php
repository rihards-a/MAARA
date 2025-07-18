@extends('layouts.app_layout_with_navbar')

@section('title', 'Ceļvedis palicējiem')

@section('main_content')
@if (auth()->user()->haslifetime() /*TODO: need to create a pretty screen redirecting anyone unsubscribed to the subscribe page nicely*/ )  
<div class="guide-background">
    <section class="welcome-section-guide">
      <section section class="welcome-section">
        <h1 class="welcome-title">Prieks Tevi redzēt {{ Auth::user()->name }}</h1>
        <p>
        Tu esi īstajā vietā, lai sāktu apzināti plānot savas izvēles.<br>
          <br>
          1. Veic plānošanas darbu <br>
          2. Saglabā savas vēlmes<br>
          3. Ērti eksportē savu norāžu kopsavilkumu drošai uzglabāšanai.<br>
          <br>
          <b>Plānošanas statuss:</b> aizpildītas {{$completed_questionnaire_count}}/8 sadaļām <br>                           <b>Pēdējo reizi izmaiņas veiktas:</b>
  @if($latestSubmission && $latestSubmission->updated_at)
    {{ \Carbon\Carbon::parse($latestSubmission->updated_at)->diffForHumans() }}
  @else
    Nav vēl veiktas izmaiņas.
  @endif<br>
        </p>
      </section>

      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-4 gap-4 items-stretch">
        @php
          $guides = [
            ['title' => 'Medicīniskās izvēles un pilnvaras', 'text' => 'Paredzamais aizpildes laiks: 10 minūtes', 'route' => route('dashboard.med'), 'image' => '/images/a1.svg'],
            ['title' => 'Pensijas mantošana', 'text' => 'Paredzamais aizpildes laiks: 5 minūtes', 'route' => route('dashboard.pensija'), 'image' => '/images/a2.svg'],
            ['title' => 'Apbedīšanas izvēles', 'text' => 'Paredzamais aizpildes laiks: 60 minūtes', 'route' => route('dashboard.beres'), 'image' => '/images/a3.svg'],
            ['title' => 'Finanšu pārvaldība', 'text' => 'Paredzamais aizpildes laiks: 30 minūtes', 'route' => route('dashboard.finanses'), 'image' => '/images/a4.svg'],
            ['title' => 'Testamenta sagatavošana', 'text' => 'Paredzamais aizpildes laiks: 60 minūtes', 'route' => route('dashboard.testaments'), 'image' => '/images/a5.svg'],
            ['title' => 'Digitālais mantojums', 'text' => 'Paredzamais aizpildes laiks: 120 minūtes', 'route' => route('dashboard.digmantojums'), 'image' => '/images/a6.svg'],
            ['title' => 'Dzīves pienākumu pārņemšana', 'text' => 'Paredzamais aizpildes laiks: 60 minūtes', 'route' => route('dashboard.pienakumi'), 'image' => '/images/a7.svg'],
            ['title' => 'Ziņas palicējiem', 'text' => 'Paredzamais aizpildes laiks: 60 minūtes', 'route' => route('dashboard.zinas'), 'image' => '/images/a8.svg'],

          ];
        @endphp
@foreach($guides as $guide)
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
                    <a href="{{ $guide['route'] }}" class="card-button">
                        Sākt
                    </a>
                </div>
            </div>
        </div>
    </div>
@endforeach


      </div>

        <div class="mt-10 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-4 gap-4 items-stretch">
            <a href="{{ route('generate.pdf') }}" target="_blank" class="text-sm card-button px-6 py-3 bg-moss text-white rounded-md hover:bg-lime-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150">
                Eksportēt kopsavilkumu
            </a>

            <a href="mailto:info@maara.id.lv" class="text-sm card-button px-6 py-3 bg-moss text-white rounded-md hover:bg-lime-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150">
                Tehniskais atbalsts
            </a>

            <a href="{{ route('profile.edit') }}" class="text-sm card-button px-6 py-3 bg-moss text-white rounded-md hover:bg-lime-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150">
                Profila iestatījumi
            </a>

              <!--  need to somehow delete everything associated with the user here -->
            <a href="mailto:info@maara.id.lv" class="text-sm card-button px-6 py-3 bg-moss text-white rounded-md hover:bg-lime-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150">
                Dzēst manas atbildes
            </a>
        </div>

    </section>
  </div>
@else
<a href={{route('lifetime.index')}}> {{ __("Consider buying lifetime!") }} </a>
@endif
@endsection



