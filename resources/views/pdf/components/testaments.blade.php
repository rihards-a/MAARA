<div>
    <h2>Mans testaments:</h2>
    @if(!empty($responses[200]))
        <x-pdf.to-fill-section title="Es esmu izveidojis savu publisko testamentu pie notāra." height=70 type=p/>
    @endif

    @if(!empty($responses[201]))
        <x-pdf.to-fill-section title="Es esmu izveidojis savu privāto testamentu, kas nodots glabāšanā pie notāra." height=70 type=p/>
    @endif

    @if(!empty($responses[202]))
        <x-pdf.to-fill-section title="Es esmu izveidojis savu privāto testamentu, ko esmu noglabājis citur." height=70 type=p/>
    @endif

    @if(!empty($responses[203]))
        <x-pdf.to-fill-section title="Es vēlos, lai mana manta tiek sadalīta civillikumā noteiktajā kārtībā." height=70 type=p/>
    @endif
</div>