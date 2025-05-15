@extends('layouts.app_layout_with_navbar')

@section('title', 'Par mums')

@section('main_content')
<section class="welcome-section">
@include('components.mini-tab-navbar')
    <br>
    <p class="welcome-text text-sm">
    Šajā sadaļā aicinām Tevi atstāt ziņas saviem tuvajiem — vārdus, kas viņus sasniegs pēc Tavas aiziešanas.<br>
    Tie var būt pateicības vai mierinājuma vārdi, varbūt kāds stāsts vai doma, ko Tu vēlējies reiz pastāstīt. Varbūt joks ar kuru kādu sasmīdināt. Šeit vari atstāt recepti savai mīļākajai zupai, dzejoli, kas tevi iedvesmo, vai ieteikt albumu, kuru noklausīties, kad gribas justies tuvāk tev.<br>
    Tu vari rakstīt vairākiem vai tikai vienam cilvēkam.<br>
     Droši vari atstāt arī vairākas ziņas — nopietnākas vai ne tik nopietnas, kā vien tev pašam gribas.<br>
     Jebkas, ko atstāsi šeit, ļaus taviem mīļajiem sajust tavu klātbūtni caur taviem vārdiem, kad vairs fiziski nebūsi blakus.
    </p>
    <br>
    <div class="mb-6">
        <h2 class="text-xl font-semibold mb-4">Manas ziņas ({{ $messages->count() }}/20)</h2>
    </div>

    <!-- Existing Messages as Editable Forms -->
    @if($messages->isEmpty())
        <div class="bg-gray-50 rounded-lg p-6 text-center text-gray-500">
            Jums vēl nav nevienas ziņas!
        </div>
    @else
    <div>
        @foreach($messages as $message)
        <div class="mb-8 p-6 bg-white rounded-lg shadow-md">
            <h2 class="text-xl font-semibold mb-4">Ziņa #{{ $loop->iteration }}</h2>
            <p class="text-sm text-gray-500 mb-4">
                Izveidots: {{ $message->created_at->format('d.m.Y H:i') }}
            </p>
        
            <form action="{{ route('dashboard.zinas.update', $message->id) }}" method="POST">
                @csrf
                @method('PUT')
        
                <div class="mb-4">
                    <label for="addressee-{{ $message->id }}" class="block text-gray-700 text-sm font-bold mb-2">Adresāts:</label>
                    <input
                        type="text"
                        name="addressee"
                        id="addressee-{{ $message->id }}"
                        value="{{ $message->addressee }}"
                        class="w-full p-3 border border-gray-300 rounded-md text-sm"
                        required
                    />
                </div>
        
                <div class="mb-4">
                    <label for="content-{{ $message->id }}" class="block text-gray-700 text-sm font-bold mb-2">Ziņas saturs:</label>
                    <textarea
                        name="content"
                        id="content-{{ $message->id }}"
                        class="w-full h-32 p-3 border border-gray-300 rounded-md text-sm"
                        required
                    >{{ $message->content }}</textarea>
                </div>
        
                <div class="flex justify-between items-center">
                    <button type="submit" class="bg-blue-600 text-white rounded-md py-2 px-4 text-sm hover:bg-blue-700">
                        Saglabāt izmaiņas
                    </button>
                    
                    <button type="button" onclick="if(confirm('Vai tiešām vēlaties dzēst šo ziņu?')) document.getElementById('delete-form-{{ $message->id }}').submit();" class="bg-red-600 text-white rounded-md py-2 px-4 text-sm hover:bg-red-700">
                        Dzēst
                    </button>
                </div>
            </form>
            
            <form id="delete-form-{{ $message->id }}" action="{{ route('dashboard.zinas.destroy', $message->id) }}" method="POST" class="hidden">
                @csrf
                @method('DELETE')
            </form>
        </div>
        @endforeach
    </div>
    @endif

    <!-- New Message Form -->
    @if($messages->count() < 20)
    <div class="mb-8 p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-xl font-semibold mb-4">Pievienot jaunu ziņu</h2>
        <form action="{{ route('dashboard.zinas.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="new-addressee" class="block text-gray-700 text-sm font-bold mb-2">Adresāts:</label>
                <input
                    type="text"
                    name="addressee"
                    id="new-addressee"
                    value="{{ old('addressee') }}"
                    placeholder="Kam šī ziņa domāta?"
                    class="w-full p-3 border border-gray-300 rounded-md text-sm"
                    required
                />
            </div>

            <div class="mb-4">
                <label for="new-content" class="block text-gray-700 text-sm font-bold mb-2">Ziņas saturs:</label>
                <textarea
                    name="content"
                    id="new-content"
                    placeholder="Sāc rakstīt..."
                    class="w-full h-32 p-3 border border-gray-300 rounded-md text-sm"
                    required
                >{{ old('content') }}</textarea>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-lime-600 text-white rounded-md py-2 px-4 text-sm hover:bg-lime-700">
                    Pievienot ziņu
                </button>
            </div>
        </form>
    </div>
    @endif

    <!-- Navigation Buttons -->
    <div class="mt-8 flex justify-between items-center">
        <a href="{{ route('dashboard.pienakumi') }}"
           class="text-gray-600 text-sm border border-gray-300 rounded-md px-4 py-2 hover:bg-gray-100">
            Atpakaļ
        </a>
        
        <a href="{{ route('dashboard') }}"
           class="text-gray-600 text-sm border border-gray-300 rounded-md px-4 py-2 hover:bg-gray-100">
            Uz Gida sākumlapu
        </a>
    </div>
</section>
@endsection