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
          Plānošanas statuss: aizpildītas 0/8 sadaļām <br>                         Pēdējo reizi izmaiņas veiktas: 23/02/2025 plkst. 15:47<br>
        </p>
      </section>

      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-4 gap-4 items-stretch">
        @php
          $guides = [
            ['title' => 'Medicīniskās izvēles un pilnvaras', 'text' => 'Paredzamais sakārtošanas ilgums: 10 minūtes', 'route' => route('dashboard.med'), 'image' => '/images/house.svg'],
            ['title' => 'Pensijas mantošana', 'text' => 'Paredzamais sakārtošanas ilgums: 5 minūtes', 'route' => route('dashboard.pensija'), 'image' => '/images/leaf.svg'],
            ['title' => 'Apbedīšanas izvēles', 'text' => 'Paredzamais sakārtošanas ilgums: 60 minūtes', 'route' => route('dashboard.beres'), 'image' => '/images/house.svg'],
            ['title' => 'Finanšu pārvaldība', 'text' => 'Paredzamais sakārtošanas ilgums: 30 minūtes', 'route' => route('dashboard.finanses'), 'image' => '/images/house.svg'],
            ['title' => 'Testamenta sagatavošana', 'text' => 'Paredzamais sakārtošanas ilgums: 60 minūtes', 'route' => route('dashboard.testaments'), 'image' => '/images/leaf.svg'],
            ['title' => 'Digitālais mantojums', 'text' => 'Paredzamais sakārtošanas ilgums: 120 minūtes', 'route' => route('dashboard.digmantojums'), 'image' => '/images/house.svg'],
            ['title' => 'Dzīves pienākumu pārņemšana', 'text' => 'Paredzamais sakārtošanas ilgums: 30 minūtes', 'route' => route('dashboard.pienakumi'), 'image' => '/images/house.svg'],
            ['title' => 'Ziņas palicējiem', 'text' => 'Paredzamais sakārtošanas ilgums: 30 minūtes', 'route' => route('dashboard.zinas'), 'image' => '/images/house.svg'],

          ];
        @endphp

        @foreach($guides as $guide)
        <div class="card-guide">
            <div class="card-content-guide p-4">
            <!-- Two-column layout: icon left, title right -->
            <div class="card-top flex items-center gap-4 grid grid-cols-1 sm:grid-cols-2">
                <!-- Icon section -->
                <div class="bg-[color:var(--primary-color)] rounded-full p-4 w-16 h-16 flex items-center justify-center">
                <img src="{{ $guide['image'] }}" alt="Icon" class="w-8 h-8 top-0 left-0" />
                </div>
                <h2 class="card-title-guide text-lg font-semibold">{{ $guide['title'] }}</h2>
            </div>

            <!-- Bottom section -->
            <div class="card-bottom mt-4">
                <p class="card-text-guide">{{ $guide['text'] }}</p>
                <a href="{{ $guide['route'] }}" class="card-button">Sākt</a>
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



