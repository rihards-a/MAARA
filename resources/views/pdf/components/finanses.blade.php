<div class="section finanses">
    <div style="background-color: black; color: white; padding: 10px; margin-bottom: 20px; border-radius: 8px;text-align: center;">
        <h1 style="margin: 0; font-size: 20px;">Manas finanses un īpašumi:</h1>
    </div>


    <div style="page-break-inside: avoid;">
        {{-- check if user has selected none/not having a financial tool --}}
        @if (isset($responses[100]) && is_array($responses[100]) && !in_array('none', $responses[100]))
            <h2>Informācija par maniem finanšu rīkiem:</h2>
            @foreach ($responses[100] as $value)
                @if ($value === 'other')
                    <p><x-pdf.to-fill-section title="Informācija par ____________ kontu" height=120/></p>  
                @else
                    <p><x-pdf.to-fill-section title="Informācija par {{ $value }} kontu" height=120/></p>  
                @endif
            @endforeach
        @endif
    </div>

    <div style="page-break-inside: avoid;">
        <h2>Informācija par manām bankām:</h2>
        @foreach ($responses[101] as $value)
            @if ($value === 'otherLV' || $value === 'otherForeign')
                <p><x-pdf.to-fill-section title="Informācija par ____________ kontu" height=120/></p>  
            @else
                <p><x-pdf.to-fill-section title="Informācija par {{ $value }} kontu" height=120/></p>  
            @endif
        @endforeach
    </div>

    <div style="page-break-inside: avoid;">
        {{-- Section for Stocks (Question 102) --}}
        @if (isset($responses[102]) && is_array($responses[102]) && in_array('yes', $responses[102]))
            <x-pdf.to-fill-section title="Informācija par manām akcijām:" />
        @elseif (isset($responses[102]) && is_array($responses[102]) && in_array('options', $responses[102]))
            <x-pdf.to-fill-section title="Informācija par manām akciju opcijām:" height=120/>
        @endif
    </div>


    <div style="page-break-inside: avoid;">
        {{-- Section for Cryptocurrencies (Question 103) --}}
        @if (isset($responses[103]) && is_array($responses[103]) && in_array('yes', $responses[103]))
            <x-pdf.to-fill-section title="Informācija par manām kriptovalūtām:" height=120 />
        @endif
    </div>

    <div style="page-break-inside: avoid;">
    {{-- Section for (Question 104) --}}
    @if (isset($responses[104]))
        @if (isset($responses[104][0]) && ($responses[104][0] !== null && $responses[104][0] != 0))
            @if ($responses[104][0] == 1)
                <x-pdf.to-fill-section title="Informācija par manu nekustamo īpašumu Latvijā:"height=120 />
            @else
                <x-pdf.to-fill-section title="Informācija par maniem nekustamajiem īpašumiem Latvijā:" height=120/>
            @endif
        @endif

        @if (isset($responses[104][1]) && ($responses[104][1] !== null && $responses[104][1] != 0))
            @if ($responses[104][1] == 1)
                <x-pdf.to-fill-section title="Informācija par manu nekustamo īpašumu ārzemēs:" height=120/>
            @else
                <x-pdf.to-fill-section title="Informācija par maniem nekustamajiem īpašumiem ārzemēs:"height=120 />
            @endif
        @endif
    @endif
    </div>

    <div style="page-break-inside: avoid;">
    {{-- Section for (Question 105) --}}
    @if (isset($responses[105]))
        @if (isset($responses[105][0]) && ($responses[105][0] !== null && $responses[105][0] != 0))
            @if ($responses[105][0] == 1)
                <x-pdf.to-fill-section title="Informācija par manu transportlīdzekli Latvijā:" height=120 />
            @else
                <x-pdf.to-fill-section title="Informācija par maniem transportlīdzekļiem Latvijā:" height=120/>
            @endif
        @endif

        @if (isset($responses[105][1]) && ($responses[105][1] !== null && $responses[105][1] != 0))
            @if ($responses[105][1] == 1)
                <x-pdf.to-fill-section title="Informācija par manu transportlīdzekli ārzemēs:" height=120 />
            @else
                <x-pdf.to-fill-section title="Informācija par maniem transportlīdzekļiem ārzemēs:" height=120/>
            @endif
        @endif
    @endif
    </div>

    <div style="page-break-inside: avoid;">
        {{-- Section for (Question 106) --}}
        @if (!empty(array_filter($responses[106] ?? [])))
            <x-pdf.to-fill-section title="Informācija par maniem līdzekļiem fondos:" height=120/>
        @endif
    </div>

    <div style="page-break-inside: avoid;">
        {{-- Section for  (Question 107) --}}
        @if (isset($responses[107]) && is_array($responses[107]) && in_array('yes', $responses[107]))
            <x-pdf.to-fill-section title="Informācija par manām īpaši vērtīgajām fiziskajām lietām:" height=120/>
        @endif
    </div>

    <div style="page-break-inside: avoid;">
        {{-- Section for (Question 108) --}}
        @if (isset($responses[108]) && is_array($responses[108]) && in_array('yes', $responses[108]))
            <x-pdf.to-fill-section title="Informācija par manām finansiāli vērtīgām lietām, kas neietilpst nevienā no šīm kategorijām:" height=120 />
        @endif
    </div>
</div>
