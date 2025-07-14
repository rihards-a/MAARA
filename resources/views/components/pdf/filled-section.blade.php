@props(['title', 'response'])

<h3>{{ $title }}:</h3>
<div style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; margin-top: 10px; background-color: #f9f9f9;">
    <p style="font-style: italic; color: #000000; margin-top: 5px;">{{ $response }}</p>
</div>
