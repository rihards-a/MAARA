@extends('pdf.layouts.base')

@section('title', 'Example PDF')

@section('content')

    <x-pdf.page>
        @isset($pamat_info)
            @include('pdf.components.pamat_info', $pamat_info)
        @endisset
    
        @isset($med)
            @include('pdf.components.med', ['responses' => $med])
        @endisset

        @include('pdf.components.pensija', [])
    </x-pdf.page>
        
    @isset($beres)
        <x-pdf.page>
            @include('pdf.components.beres', ['responses' => $beres])
        </x-pdf.page>
    @endisset

    @isset($finanses)
        <x-pdf.page>
            @include('pdf.components.finanses', ['responses' => $finanses])
        </x-pdf.page>
    @endisset

    @isset($testaments)
        <x-pdf.page>
            @include('pdf.components.testaments', ['responses' => $testaments])
        </x-pdf.page>
    @endisset

    @if ($accounts->isNotEmpty() && $platforms->isNotEmpty())
        <x-pdf.page> 
            @include('pdf.components.digmantojums', ['accounts' => $accounts, 'platforms' => $platforms])
        </x-pdf.page>
    @endif

    @isset($pienakumi)
        <x-pdf.page>
            @include('pdf.components.pienakumi', ['responses' => $pienakumi])
        </x-pdf.page>
    @endisset

    @if (!empty($zinas))
        @foreach ($zinas as $zina)
            @if (!empty($zina->content))
                <x-pdf.page>
                    @include('pdf.components.zina', $zina)
                </x-pdf.page>
            @endif
        @endforeach
    @endif

@endsection
