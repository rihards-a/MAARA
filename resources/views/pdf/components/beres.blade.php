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
            <x-pdf.filled-section :title="$title" :response="$responses[$index]" />
        @endif
    @endforeach
</div>