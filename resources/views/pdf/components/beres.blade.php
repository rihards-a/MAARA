<div class="section beres">
    <div style="color: black; padding: 10px; margin-bottom: 20px; border-radius: 8px;text-align: center;">
        <h1 style="margin: 0; font-size: 20px;">Apbedīšanas vēlmes:</h1>
    </div>
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