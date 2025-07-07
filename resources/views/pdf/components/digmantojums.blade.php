@php
    $sections = [
        ['title' => 'Personīgie konti', 'items' => $accounts, 'empty' => 'Nav norādīti individuālie konti, ko eksportēt.'],
        ['title' => 'Ierīces', 'items' => $devices, 'empty' => 'Nav norādīti ierīču dati, ko eksportēt.'],
        ['title' => 'Darbs un dokumenti', 'items' => $platforms, 'empty' => 'Nav norādītas individuālās digitālās platformas, ko eksportēt.'],
        ['title' => 'Abonementi', 'items' => $diglegacysubscriptions, 'empty' => 'Nav abonementi, ko eksportēt.'],
    ];
    $headers = ['Nosaukums', 'Nozīmīgums', 'Piekļuves metode', 'Kā rīkoties', 'Papildus komentārs'];
@endphp

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
