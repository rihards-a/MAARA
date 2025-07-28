<style>
    .pdf-page:not(:last-child) {
        page-break-after: always;
    }
</style>

@if (trim($slot))
    <div class="pdf-page">
        {{ $slot }}
    </div>
@endif