@extends('layouts.app_layout_with_navbar')

@section('title', 'Par mums')

@section('main_content')

@include('components.mini-tab-navbar')
<section class="welcome-section">
    <br>
    <p class="welcome-text text-sm">
    Šajā sadaļā aicinām Tevi atstāt ziņas saviem tuvajiem — vārdus, kas viņus sasniegs pēc Tavas aiziešanas.<br>
    Tie var būt pateicības vai mierinājuma vārdi, varbūt kāds stāsts vai doma, ko Tu vēlējies reiz pastāstīt. Varbūt joks ar kuru kādu sasmīdināt. Šeit vari atstāt recepti savai mīļākajai zupai, dzejoli, kas tevi iedvesmo, vai ieteikt albumu, kuru noklausīties, kad gribas justies tuvāk tev.<br>
    Tu vari rakstīt vairākiem vai tikai vienam cilvēkam.<br>
     Droši vari atstāt arī vairākas ziņas — nopietnākas vai ne tik nopietnas, kā vien tev pašam gribas.<br>
     Jebkas, ko atstāsi šeit, ļaus taviem mīļajiem sajust tavu klātbūtni caur taviem vārdiem, kad vairs fiziski nebūsi blakus.
    </p>
    <br>
        <form action="{{ route('dashboard.zinas.save') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4 items-stretch">
                <!-- Column 1 -->
                <div class="flex flex-col h-full p-2">
                        <input 
                        type="text" 
                        class="w-full h-10 p-4 bg-no-repeat bg-center bg-[length:4rem] border border-gray-300 rounded-md shadow-sm focus:border-lime-600 focus:ring-lime-600 text-gray-700 text-sm placeholder-gray-400" 
                        placeholder="Kam šī ziņa domāta?"
                        />

                        <textarea
                            class="w-full mt-4 h-60 p-4 bg-no-repeat bg-center bg-[length:4rem] border border-gray-300 rounded-md shadow-sm focus:border-lime-600 focus:ring-lime-600 text-gray-700 text-sm placeholder-gray-400"
                            placeholder="Sāc rakstīt..."
                        ></textarea>
                    </div>
                <!-- Column 2 -->
                <div class="flex flex-col h-full p-2">
                        <input 
                        type="text" 
                        class="w-full h-10 p-4 bg-no-repeat bg-center bg-[length:4rem] border border-gray-300 rounded-md shadow-sm focus:border-lime-600 focus:ring-lime-600 text-gray-700 text-sm placeholder-gray-400" 
                        placeholder="Kam šī ziņa domāta?"
                        />

                        <textarea
                            class="w-full mt-4 h-60 p-4 bg-no-repeat bg-center bg-[length:4rem] border border-gray-300 rounded-md shadow-sm focus:border-lime-600 focus:ring-lime-600 text-gray-700 text-sm placeholder-gray-400"
                            placeholder="Sāc rakstīt..."
                        ></textarea>
                    </div>
                <!-- Column 3 -->
                <div class="flex flex-col h-full p-2">
                        <input 
                        type="text" 
                        class="w-full h-10 p-4 bg-no-repeat bg-center bg-[length:4rem] border border-gray-300 rounded-md shadow-sm focus:border-lime-600 focus:ring-lime-600 text-gray-700 text-sm placeholder-gray-400" 
                        placeholder="Kam šī ziņa domāta?"
                        />

                        <textarea
                            class="w-full mt-4 h-60 p-4 bg-no-repeat bg-center bg-[length:4rem] border border-gray-300 rounded-md shadow-sm focus:border-lime-600 focus:ring-lime-600 text-gray-700 text-sm placeholder-gray-400"
                            placeholder="Sāc rakstīt..."
                        ></textarea>
                    </div>
                <!-- Column 4 -->
                    <div class="flex flex-col h-full p-2">
                        <input 
                        type="text" 
                        class="w-full h-10 p-4 bg-no-repeat bg-center bg-[length:4rem] border border-gray-300 rounded-md shadow-sm focus:border-lime-600 focus:ring-lime-600 text-gray-700 text-sm placeholder-gray-400" 
                        placeholder="Kam šī ziņa domāta?"
                        />

                        <textarea
                            class="w-full mt-4 h-60 p-4 bg-no-repeat bg-center bg-[length:4rem] border border-gray-300 rounded-md shadow-sm focus:border-lime-600 focus:ring-lime-600 text-gray-700 text-sm placeholder-gray-400"
                            placeholder="Sāc rakstīt..."
                        ></textarea>
                    </div>
                </div>


                <div class="col-span-full flex justify-between items-center mt-6 w-full">
                    <!-- Left minimal button -->
                    <a href="{{ route('dashboard.pienakumi') }}"
                    class="text-gray-600 text-sm border border-gray-300 rounded-md px-4 py-2 hover:bg-gray-100">
                        Atpakaļ
                    </a>

                    <!-- Center save button -->
                    <button type="submit"
                        class="bg-moss hover:bg-green-700 text-white font-bold py-3 px-6 rounded-md focus:outline-none focus:shadow-outline">
                        Saglabāt
                    </button>

                    <!-- Right minimal button -->
                    <a href="{{ route('dashboard') }}"
                    class="text-gray-600 text-sm border border-gray-300 rounded-md px-4 py-2 hover:bg-gray-100">
                        Uz Gida sākumlapu
                    </a>
                </div>
        </form>
</section>
@endsection