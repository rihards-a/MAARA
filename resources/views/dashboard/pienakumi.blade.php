@extends('layouts.app_layout_with_navbar')

@section('title', 'Dzīves pienākumi')

@section('main_content')
@include('components.mini-tab-navbar')
<section class="welcome-section">
    <br>
    <p class="welcome-text text-sm">
    Dzīves laikā mēs mēdzam uzņemties rūpes un saistības pret citiem cilvēkiem, būtnēm un lietām uz šīs zemes. Ir svarīgi apzināties, ka šo saistību uzņemšanās ir bijis mūsu lēmums, un tās pārņemt nav neviena cita pienākums. Tomēr, bieži vien, tuvinieki mēdz pārņemt nelielus aizgājēja pienākumus, un šādos gadījumos īpaši noderīgas ir kādas būtiskas instrukcijas, kas reizēm ir zināmas vien aizgājējam.
    </p>
    <br>
        <form action="{{ route('dashboard.pienakumi.save') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4 items-stretch">
              <!-- Column 1: Paziņojums par aiziešanu (ID 17) -->
              <div class="flex flex-col h-full p-2">
                <div class="font-semibold mb-2">Paziņojums par aiziešanu</div>
                <div class="flex flex-col flex-grow pb-3">
                  <div class="text-xs">
                    Varbūt Tev ir idejas par to, kā apziņot Tavus laikabiedrus par Tavu nāves faktu veidā, kas būtu gan vienkāršs, gan iejūtīgs? Vai ir kādas personas, kuras būtu jāinformē nekavējoties? Šāda norāde palīdzētu tuviniekiem, kuriem šis pienākums būs jāveic.
                  </div>
                </div>
                <textarea
                  name="responses[17][response_value]"
                  id="q17_notification"
                  class="w-full h-60 p-4 bg-no-repeat bg-center bg-[length:4rem] border border-gray-300 rounded-md shadow-sm focus:border-lime-600 focus:ring-lime-600 text-black-700 text-sm placeholder-gray-400"
                  style="background-image: url('/images/email.svg');"
                  placeholder="Sāc rakstīt…"
                >{{ $responses[17] ?? '' }}</textarea>
                <input type="hidden" name="responses[17][question_id]" value="17">
              </div>

              <!-- Column 2: Mājdzīvnieki (ID 18) -->
              <div class="flex flex-col h-full p-2">
                <div class="font-semibold mb-2">Mājdzīvnieki</div>
                <div class="flex flex-col flex-grow pb-3">
                  <div class="text-xs">
                    Ja Tev ir mājdzīvnieki, ir ļoti vērtīgi norādīt, kuriem cilvēkiem Tu vēlētos mājdzīvnieku uzticēt, ja Tevis vairs nebūs. Šeit var norādīt arī specifiskas kopšanas instrukcijas, aprakstīt hroniskas veselības problēmas vai uztura paradumus. Mājdzīvniekus iespējams arī iekļaut savā testamentā kā mantojamo mantu – vēlams, iepriekš saskaņojot ar mantinieku.
                  </div>
                </div>
                <textarea
                  name="responses[18][response_value]"
                  id="q18_pets"
                  class="w-full h-60 p-4 bg-no-repeat bg-center bg-[length:4rem] border border-gray-300 rounded-md shadow-sm focus:border-lime-600 focus:ring-lime-600 text-black-700 text-sm placeholder-gray-400"
                  style="background-image: url('/images/dog.svg');"
                  placeholder="Sāc rakstīt…"
                >{{ $responses[18] ?? '' }}</textarea>
                <input type="hidden" name="responses[18][question_id]" value="18">
              </div>

              <!-- Column 3: Īpaši cilvēki (ID 19) -->
              <div class="flex flex-col h-full p-2">
                <div class="font-semibold mb-2">Īpaši cilvēki</div>
                <div class="flex flex-col flex-grow pb-3">
                  <div class="text-xs">
                    Vai Tu savas dzīves laikā esi uzņēmies kādu būtisku atbalsta lomu? Piemēram, sniedz praktisku palīdzību ikdienas darbos kādam senioram vai esi uzticības persona kādam jaunietim, kuram nepieciešams atbalsts. Šos pienākumus “mantot” ir vissarežģītāk, tomēr ir labi, ja tuvinieki par tiem zina, un var rīkoties situācijai atbilstoši.
                  </div>
                </div>
                <textarea
                  name="responses[19][response_value]"
                  id="q19_special_people"
                  class="w-full h-60 p-4 bg-no-repeat bg-center bg-[length:4rem] border border-gray-300 rounded-md shadow-sm focus:border-lime-600 focus:ring-lime-600 text-black-700 text-sm placeholder-gray-400"
                  style="background-image: url('/images/persons.svg');"
                  placeholder="Sāc rakstīt…"
                >{{ $responses[19] ?? '' }}</textarea>
                <input type="hidden" name="responses[19][question_id]" value="19">
              </div>

              <!-- Column 4: Augi (ID 20) -->
              <div class="flex flex-col h-full p-2">
                <div class="font-semibold mb-2">Augi</div>
                <div class="flex flex-col flex-grow pb-3">
                  <div class="text-xs">
                    Varbūt Tev ir mājas augu kolekcija, kuru vēlies pēc nāves bez kavēšanās nodot kādam, kuram rūpes par augiem arī sagādā prieku? Vai varbūt Tev ir mazdārziņš, kura dzīvotspējai ir nepieciešamas kādas detalizētas norādes? Pat ja Tavi tuvinieki ar entuziasmu uzņemsies šos pienākumus, Tavi ieteikumi un zināšanas būs zelta vērtē.
                  </div>
                </div>
                <textarea
                  name="responses[20][response_value]"
                  id="q20_plants"
                  class="w-full h-60 p-4 bg-no-repeat bg-center bg-[length:4rem] border border-gray-300 rounded-md shadow-sm focus:border-lime-600 focus:ring-lime-600 text-black-700 text-sm placeholder-gray-400"
                  style="background-image: url('/images/leaf.svg');"
                  placeholder="Sāc rakstīt…"
                >{{ $responses[20] ?? '' }}</textarea>
                <input type="hidden" name="responses[20][question_id]" value="20">
              </div>

              <!-- Column 5: Citi sadzīves pienākumi (ID 21) -->
              <div class="flex flex-col h-full p-2">
                <div class="font-semibold mb-2">Citi sadzīves pienākumi</div>
                <div class="flex flex-col flex-grow pb-3">
                  <div class="text-xs">
                    Vai ir kādas praktiskas lietas, kuras Tu veic ikdienā, piemēram, ģimenes vārdā, un Tu vēlies par tām atstāt norādes? Piemēram, komunālo maksājumu segšanas kārtība; Tava auto galvenais “niķu” iemesls vai jebkāda cita informācija, kas palīdzēs tuviniekiem, kuri centīsies pārvaldīt vai sakārtot Tavas lietas pēc Tavas aiziešanas.
                  </div>
                </div>
                <textarea
                  name="responses[21][response_value]"
                  id="q21_other_tasks"
                  class="w-full h-60 p-4 bg-no-repeat bg-center bg-[length:4rem] border border-gray-300 rounded-md shadow-sm focus:border-lime-600 focus:ring-lime-600 text-black-700 text-sm placeholder-gray-400"
                  style="background-image: url('/images/house.svg');"
                  placeholder="Sāc rakstīt…"
                >{{ $responses[21] ?? '' }}</textarea>
                <input type="hidden" name="responses[21][question_id]" value="21">
              </div>
            </div>

            <!-- bottom navigation -->
            <div class="col-span-full flex justify-between items-center mt-6 w-full">
                    <div class="w-full max-w-screen-lg mx-auto px-4 py-6 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                    
                      <div>
                          <a href="{{ route('dashboard.digmantojums') }}"
                          class="text-gray-600 text-sm border border-gray-300 rounded-md px-4 py-2 hover:bg-gray-100">
                              Atpakaļ
                          </a>
                      </div>

                                  <div class="flex items-center gap-4">
                                      <label class="flex items-center gap-2 text-gray-700 text-sm font-medium cursor-pointer select-none">
                                          <input type="checkbox"
                                              id="section_completed"
                                              name="responses[13][response_value]"
                                              value="1"
                                              class="form-checkbox h-5 w-5 text-lime-600 rounded focus:ring-lime-500"
                                              {{ (isset($responses[13]['response_value']) && $responses[13]['response_value'] == 1) ? 'checked' : '' }}>
                                          Atzīmēt sadaļu kā pabeigtu
                                      </label>

                                      <button type="submit"
                                              class="bg-moss hover:bg-lime-600 text-white font-bold py-3 px-6 rounded-md focus:outline-none">
                                          Saglabāt
                                      </button>

                                      <a href="{{ route('dashboard.zinas') }}"
                                      class="text-gray-600 text-sm border border-gray-300 rounded-md px-4 py-2 hover:bg-gray-100">
                                          Tālāk
                                      </a>
                                  </div>
                    </div>
          </div>  
      </form>
</section>
@endsection