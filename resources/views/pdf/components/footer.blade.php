<div style="width: 100%; border-top: 1px solid #000; padding-top: 10px; margin-top: 40px; position: fixed; bottom: 0;">
    <p style="text-align: center; font-size: 12px;">Confidential Document – Page <script type="text/php">
        if (isset($pdf)) {
            $pdf->page_script(function ($pageNumber, $pageCount, $pdf) {
                $pdf->text(270, 820, "Page $pageNumber of $pageCount", null, 10);
            });
        }
    </script></p>
</div>
