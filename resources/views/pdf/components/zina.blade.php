<div class="zina">
    <div style="color: black; padding: 10px; margin-bottom: 20px; border-radius: 8px;text-align: center;">
        <h1 style="margin: 0; font-size: 20px;">Ziņas no manis:</h1>
    </div>
     
    <x-pdf.filled-section :title="$zina->addressee" :response="$zina->content" />
    
</div>