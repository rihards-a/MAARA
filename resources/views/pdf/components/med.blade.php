<div>
    <h2>Medicīniskās preferences un pilnvaras:</h2>
    @if(isset($responses[13]) || isset($responses[14]))
        <p>Es esmu aizpildījusi savas izvēles par kļūšanu par orgānu donoru e-veseliba.lv.</p>
        <div style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; margin-top: 10px; background-color: #f9f9f9;">
            <p style="font-style: italic; color: #dddddd; margin-top: 5px;">Ja vēlies, norādi šeit rakstiski:</p>
        </div>
    @endif

    @if(isset($responses[15]))
    Es esmu eveseliba. lv norādījusi cilvēku, kuru pilnvaroju pieņemt medicīniskus lēmumus par sevi, ja pati to nespēju. 
        <div style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; margin-top: 10px; background-color: #f9f9f9;">
            <p style="font-style: italic; color: #dddddd; margin-top: 5px;">Ja vēlies, norādi šeit rakstiski:</p>
        </div>
    Vadlīnijas, ko lūdzu šim cilvēkam ievērot:
    {{-- A static box to represent where text would go, if needed --}}
    <div style="width: 100%; height: 180px; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; margin-top: 10px; background-color: #f9f9f9;">
        <p style="font-style: italic; color: #dddddd; margin-top: 5px;">Ja vēlies, norādi šeit rakstiski:</p>
    </div>
    @endif
</div>