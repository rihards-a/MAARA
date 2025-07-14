@props(['title', 'height' => '100px', 'type' => 'h3'])

@php echo "<{$type}>{$title}</{$type}>"; @endphp
<div style="width: 100%; height: {{ $height }}; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; margin-top: 10px; background-color: #f9f9f9;">
    <p style="font-style: italic; color: #dddddd; margin-top: 5px;">Ja vēlies, norādi šeit rakstiski:</p>
</div>
