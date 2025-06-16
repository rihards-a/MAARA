<div class="section beres">
    <h2>Apbedīšanas vēlmes:</h2>
    @php
        $sections = [
            'Svarīgākās bēru detaļas' => 1,
            'Ko es nevēlētos savās bērēs' => 2,
            'Apglabāšanas preference' => 3,
            'Norādes par atdusas vietu' => 4,
            'Bēru runa' => 5,
            'Mūzikas izvēle' => 6,
            'Atvadīšanās lokācija' => 7,
            'Kopējā noskaņa' => 8,
            'Uzaicinātie viesi' => 9,
            'Rituālie priekšmeti (zārks, urna, statuja, u.c.)' => 10,
            'Ziedu izvēle' => 11,
            'Organizatori vai padomdevēji' => 12,
        ];
    @endphp

    @foreach ($sections as $title => $index)
        {{-- Check if the response for the current index exists and is not null --}}
        @if (isset($responses[$index]) && $responses[$index] !== null)
            <h3>{{ $title }}:</h3>
            <div style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; margin-top: 10px; background-color: #f9f9f9;">
                <p style="font-style: italic; color: #000000; margin-top: 5px;">{{ $responses[$index] }}</p>
            </div>
        @endif
    @endforeach
</div>