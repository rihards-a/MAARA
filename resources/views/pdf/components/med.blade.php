@if(isset($responses[13]) || isset($responses[14]) || isset($responses[15]))
<div>
    <div style="background-color: black; color: white; padding: 10px; margin-bottom: 20px; border-radius: 8px;text-align: center;">
        <h1 style="margin: 0; font-size: 20px;">Medicīniskās preferences un pilnvaras:</h1>
    </div>    
    @if(isset($responses[13]) || isset($responses[14]))
        <x-pdf.to-fill-section title="Es esmu aizpildījusi savas izvēles par kļūšanu par orgānu donoru e-veseliba.lv." height=30 type=p/>
    @endif

    @if(isset($responses[15]))
    <x-pdf.to-fill-section title="Es esmu eveseliba.lv norādījusi cilvēku, kuru pilnvaroju pieņemt medicīniskus lēmumus par sevi, ja pati to nespēju." height=30 type=p/>
    <x-pdf.to-fill-section title="Vadlīnijas, ko lūdzu šim cilvēkam ievērot:" height=120 type=p/>
    @endif
</div>
@endif
