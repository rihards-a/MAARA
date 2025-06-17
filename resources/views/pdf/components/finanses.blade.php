<div class="section finanses">
    <h2>Manas finanses un īpašumi:</h2>
@php
    // It's best to process this data in your controller, but if necessary,
    // you can decode the JSON strings directly in your Blade file.
    // Create a new array to store the decoded responses.
    $decodedResponses = [];
    foreach ($responses as $key => $value) {
        $decoded = json_decode($value, true); // Attempt to decode
        // If decoding is successful and the result is an array, use it.
        // Otherwise, keep the original value (e.g., if it's not JSON or is a simple string).
        $decodedResponses[$key] = (is_array($decoded)) ? $decoded : $value;
    }
@endphp

{{-- Section for Stocks (Question 102) --}}
@if (isset($decodedResponses[102]) && is_array($decodedResponses[102]) && in_array('yes', $decodedResponses[102]))
    <h3>Informācija par manām akcijām:</h3>
    <div style="width: 100%;height: 100px; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; margin-top: 10px; background-color: #f9f9f9;">
        <p style="font-style: italic; color: #dddddd; margin-top: 5px;">Ja vēlies, norādi šeit rakstiski: </p>
    </div>
@endif

{{-- Section for Cryptocurrencies (Question 103) --}}
@if (isset($decodedResponses[103]) && is_array($decodedResponses[103]) && in_array('yes', $decodedResponses[103]))
    <h3>Informācija par manām kriptovalūtām:</h3>
    <div style="width: 100%; height: 100px; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; margin-top: 10px; background-color: #f9f9f9;">
        <p style="font-style: italic; color: #dddddd; margin-top: 5px;">Ja vēlies, norādi šeit rakstiski:</p>
    </div>
@endif
{{-- Section for  (Question 107) --}}
@if (isset($decodedResponses[107]) && is_array($decodedResponses[107]) && in_array('yes', $decodedResponses[107]))
    <h3>Informācija par manām īpaši vērtīgajām fiziskajām lietām:</h3>
    <div style="width: 100%; height: 100px; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; margin-top: 10px; background-color: #f9f9f9;">
        <p style="font-style: italic; color: #dddddd; margin-top: 5px;">Ja vēlies, norādi šeit rakstiski: </p>
    </div>
@endif

{{-- Section for (Question 108) --}}
@if (isset($decodedResponses[108]) && is_array($decodedResponses[108]) && in_array('yes', $decodedResponses[108]))
    <h3>Informācija par manām finansiāli vērtīgām lietām, kas neietilpst nevienā no šīm kategorijām:</h3>
    <div style="width: 100%; height: 100px; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; margin-top: 10px; background-color: #f9f9f9;">
        <p style="font-style: italic; color: #dddddd; margin-top: 5px;">Ja vēlies, norādi šeit rakstiski:</p>
    </div>
@endif







</div>