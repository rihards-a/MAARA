<div class="section finanses">
    <h2>Manas finanses un īpašumi:</h2>

    <h2>Informācija par maniem finanšu rīkiem:</h2>
    @foreach ($responses[100] as $key => $value)
        <p><x-pdf.to-fill-section title="Informācija par {{ $value }} kontu" /></p>  
    @endforeach

    <h2>Informācija par manām bankām:</h2>
    @foreach ($responses[101] as $key => $value)
        <p><x-pdf.to-fill-section title="Informācija par {{ $value }} kontu" /></p>  
    @endforeach

    {{-- Section for Stocks (Question 102) --}}
    @if (isset($responses[102]) && is_array($responses[102]) && in_array('yes', $responses[102]))
        <x-pdf.to-fill-section title="Informācija par manām akcijām:" />
    @elseif (isset($responses[102]) && is_array($responses[102]) && in_array('options', $responses[102]))
        <x-pdf.to-fill-section title="Informācija par manām akciju opcijām:" />
    @endif

    {{-- Section for Cryptocurrencies (Question 103) --}}
    @if (isset($responses[103]) && is_array($responses[103]) && in_array('yes', $responses[103]))
        <x-pdf.to-fill-section title="Informācija par manām kriptovalūtām:" />
    @endif

    {{-- Section for (Question 104) --}}
    @if (isset($responses[104]))
            @if (isset($responses[104][0]) && ($responses[104][0] !== null && $responses[104][0] != 0))
                <x-pdf.to-fill-section title="Informācija par manu nekustamo/nekustamajiem īpašumiem Latvijā:" />
            @endif

            @if (isset($responses[104][1]) && ($responses[104][1] !== null && $responses[104][1] != 0))
                <x-pdf.to-fill-section title="Informācija par manu nekustamo/nekustamajiem īpašumiem ārzemēs:" />
            @endif
    @endif

    {{-- Section for (Question 105) --}}
        @if (isset($responses[105]))
            @if (isset($responses[105][0]) && ($responses[105][0] !== null && $responses[105][0] != 0))
                <x-pdf.to-fill-section title="Informācija par manu transportlīdzekli/transportlīdzekļiem Latvijā:" />
            @endif

            @if (isset($responses[105][1]) && ($responses[105][1] !== null && $responses[105][1] != 0))
                <x-pdf.to-fill-section title="Informācija par manu transportlīdzekli/transportlīdzekļiem ārzemēs:" />
            @endif
    @endif
    {{-- Section for (Question 106) --}}
    @if (!empty(array_filter($responses[106] ?? [])))
        <x-pdf.to-fill-section title="Informācija par maniem līdzekļiem fondos:" />
    @endif

    {{-- Section for  (Question 107) --}}
    @if (isset($responses[107]) && is_array($responses[107]) && in_array('yes', $responses[107]))
        <x-pdf.to-fill-section title="Informācija par manām īpaši vērtīgajām fiziskajām lietām:" />
    @endif

    {{-- Section for (Question 108) --}}
    @if (isset($responses[108]) && is_array($responses[108]) && in_array('yes', $responses[108]))
        <x-pdf.to-fill-section title="Informācija par manām finansiāli vērtīgām lietām, kas neietilpst nevienā no šīm kategorijām:" />
    @endif
</div>
