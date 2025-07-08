@if (trim($slot))
    <div style="page-break-after: always;">
        {{ $slot }}
    </div>
@endif