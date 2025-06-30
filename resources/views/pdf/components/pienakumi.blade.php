<div>
    <h2>Dzīves pienākumi:</h2>
    @php
        $sections = [
            'Paziņojums par aiziešanu' => 17,
            'Mājdzīvnieki' => 18,
            'Īpaši cilvēki' => 19,
            'Augi' => 20,
            'Citi sadzīves pienākumi' => 21,
        ];
    @endphp

    @foreach ($sections as $title => $index)
        {{-- Check if the response for the current index exists and is not null --}}
        @if (isset($responses[$index]) && $responses[$index] !== null)
            <x-pdf.filled-section :title="$title" :response="$responses[$index]" />
        @endif
    @endforeach
</div>