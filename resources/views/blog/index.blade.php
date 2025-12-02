@extends('layouts.app_layout_with_navbar')

@section('title', 'Blogs')

@section('main_content')
  <section class="welcome-section">
    <h1 class="welcome-title">MAARA raksta</h1>
    <p class="welcome-text">
    Šis blogs ir izveidots, lai tā lasītāji varētu rast gan emocionālu mierinājumu, gan praktiskus padomus grūtos vai mulsinošos brīžos.  Pievēršamies sēru emocionāliem aspektiem, sniedzot informatīvu atbalstu un dažādas filozofiskas perspektīvas, kā arī runājam par praktiskām sadzīves izvēlēm un labirintiem, kam cauri jālīkumo tuvinieka zaudējuma gadījumā.  Dalīsimies pieredzē un piedāvāsim resursus, lai palīdzētu viens otram rast iekšējo mieru.<br>
    <br>
    Ja esi saskārusies ar kādu situāciju, kurā gūtā pieredze varētu noderēt citiem, droši sazinies ar mums rakstot uz info@maara.id.lv - mēs par to uzrakstīsim, kā arī centīsimies atbildēt uz vēl neatbildētajiem jautājumiem. Tikai kopīgiem spēkiem mēs varam izveidot šo vietni par daudzpusīgu atbalsta mehānismu, kas mazinās apjukumu, saskaroties ar vēl nepieredzēto.
    </p>
  </section>

  <div class="cards-container">
  @foreach($posts as $post)
    <div class="card flex flex-col">
      <img src="{{ asset($post->title_card_image_location) }}" alt="{{ $post->name }}">
      <div class="card-content flex flex-col flex-grow">
        <h2 class="card-title">{{ $post->name }}</h2>
        <p class="card-text">{{ $post->title_card_text }}</p>
        
           <!-- @foreach($post->tags as $tag)
                <span class="tag">{{ $tag->name }}</span>
            @endforeach
        </div> -->
        
        <a href={{ route('blog.show', ['slug' => $post->slug]) }} class="card-button mt-auto">Lasīt</a>
      </div>
    </div>
  @endforeach
  </div>
  </main>
@endsection
