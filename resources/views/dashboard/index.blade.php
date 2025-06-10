@extends('layouts.app_layout_with_navbar')

@section('title', 'Ceļvedis palicējiem')

@section('main_content')
@if (auth()->user()->haslifetime() /*TODO: need to create a pretty screen redirecting anyone unsubscribed to the subscribe page nicely*/ )  
<div class="guide-background">
    <section class="welcome-section-guide">
      <section section class="welcome-section">
        <h1 class="welcome-title">Prieks Tevi redzēt Maara, {{ Auth::user()->name }}</h1>
        <p>
        Tu esi labā vietā, lai sāktu plānot. Lūdzu iepazīsties ar tematiskajām sadaļām un izvēlies ar ko sākt!<br>
          <br>
          1.Veic plānošanas darbu <br>
          2.Saglabā savas vēlmes<br>
          3.Ērti eksportē savas gribas kopsavilkumu drošai uzglabāšanai<br>
          <br>
          Plānošanas statuss: aizpildītas 0/8 sadaļām <br>                           Pēdējo reizi izmaiņas veiktas:
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
            ['title' => 'Medicīniskās izvēles un pilnvaras', 'text' => 'Paredzamais sakārtošanas ilgums: 10 minūtes', 'route' => route('dashboard.med'), 'image' => '/images/a1.svg'],
            ['title' => 'Pensijas mantošana', 'text' => 'Paredzamais sakārtošanas ilgums: 5 minūtes', 'route' => route('dashboard.pensija'), 'image' => '/images/a2.svg'],
            ['title' => 'Apbedīšanas izvēles', 'text' => 'Paredzamais sakārtošanas ilgums: 60 minūtes', 'route' => route('dashboard.beres'), 'image' => '/images/a3.svg'],
            ['title' => 'Finanšu pārvaldība', 'text' => 'Paredzamais sakārtošanas ilgums: 30 minūtes', 'route' => route('dashboard.finanses'), 'image' => '/images/a4.svg'],
            ['title' => 'Testamenta sagatavošana', 'text' => 'Paredzamais sakārtošanas ilgums: 60 minūtes', 'route' => route('dashboard.testaments'), 'image' => '/images/a5.svg'],
            ['title' => 'Digitālais mantojums', 'text' => 'Paredzamais sakārtošanas ilgums: 120 minūtes', 'route' => route('dashboard.digmantojums'), 'image' => '/images/a6.svg'],
            ['title' => 'Dzīves pienākumu pārņemšana', 'text' => 'Paredzamais sakārtošanas ilgums: 30 minūtes', 'route' => route('dashboard.pienakumi'), 'image' => '/images/a7.svg'],
            ['title' => 'Ziņas palicējiem', 'text' => 'Paredzamais sakārtošanas ilgums: 30 minūtes', 'route' => route('dashboard.zinas'), 'image' => '/images/a8.svg'],

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
            <p class="text-sm text-gray-600 mb-2">
              {{ $guide['text'] }}
            </p>
            
            <div class="mt-auto w-full px-8 flex justify-center"> 
              <a href="{{ $guide['route'] }}"
                class="card-button">
                Sākt
              </a>
            </div>
          </div>
        </div>
        @endforeach


      </div>
    </section>
  </div>
@else
<a href={{route('lifetime.index')}}> {{ __("Consider buying lifetime!") }} </a>
@endif
@endsection



