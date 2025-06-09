<div class="zina">
    <h3>Ziņa</h3>
    
    <p><strong>Datums:</strong> {{ $zina->created_at->format('d.m.Y H:i') }}</p>
    
    <p><strong>Adresāts:</strong> {{ $zina->addressee }}</p>
    
    <p><strong>Saturs:</strong></p>
    <p>{!! nl2br(e($zina->content)) !!}</p>
    
    <hr>
</div>