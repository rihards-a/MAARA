<div class="section finanses">
    <h2>Manas finanses un īpašumi:</h2>
    @php
        $sections = [
            'Man ir Paypal konts ' => 101,
            'Man ir Paypal konts ' => 101,
            
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