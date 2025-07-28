@php
    $sections = [
        ['title' => 'Personīgie konti', 'items' => $accounts, 'empty' => 'Nav norādīti individuālie konti, ko eksportēt.'],
        ['title' => 'Ierīces', 'items' => $devices, 'empty' => 'Nav norādīti ierīču dati, ko eksportēt.'],
        ['title' => 'Darbs un dokumenti', 'items' => $platforms, 'empty' => 'Nav norādītas individuālās digitālās platformas, ko eksportēt.'],
    ];
    $headers = ['Nosaukums', 'Nozīmīgums', 'Piekļuves metode', 'Kā rīkoties', 'Papildus komentārs'];
@endphp

    <div style="color: black; padding: 10px; margin-bottom: 20px; border-radius: 8px;text-align: center;">
        <h1 style="margin: 0; font-size: 20px;">Mans digitālais mantojums:</h1>
    </div> 

@foreach ($sections as $section)
    <div class="section individual-platforms-list">
        <h3>{{ $section['title'] }}</h3>
        @if ($section['items']->isEmpty())
            <p>{{ $section['empty'] }}</p>
        @else
            <table style="width:100%; border-collapse:collapse; margin-top:15px;">
                <thead style="background:#f2f2f2;">
                    <tr> 
                        @foreach ($headers as $header)
                            <th style="border:1px solid #ddd; padding:8px; text-align:left;">{{ $header }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($section['items'] as $item)
                        <tr>
                            <td style="border:1px solid #ddd; padding:8px;">{{ $item->name }}</td>
                            <td style="border:1px solid #ddd; padding:8px;">{{ $item->importance }}</td>
                            <td style="border:1px solid #ddd; padding:8px;">{{ $item->access_method }}</td>
                            <td style="border:1px solid #ddd; padding:8px;">{{ $item->action_after_death }}</td>
                            <td style="border:1px solid #ddd; padding:8px;">{!! $item->comments ? nl2br(e($item->comments)) : '-' !!}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endforeach

@if (!$diglegacysubscriptions->isEmpty())
    <h3 style="margin-top: 20px;">Mani abonētie servisi:</h3>
    <div class="section individual-platforms-list" style="margin-top: 10px; border: 1px solid #ddd; padding: 10px; background-color: #f9f9f9;">
        <ul style="list-style-type: none; padding: 0; margin: 0;">
            @foreach ($diglegacysubscriptions as $index => $subscription)
                <strong>{{ $subscription->service_name }}</strong> @if (!$loop->last), @endif
            @endforeach
        </ul>
    </div>
    <x-pdf.to-fill-section title="Komentārs par tiem:" />
@endif