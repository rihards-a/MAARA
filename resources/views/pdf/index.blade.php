@extends('pdf.layouts.base')

@section('title', 'Example PDF')

@section('content')

    {{-- Pamatinformācija --}} {{-- med + pensija --}}
    <x-pdf.page>
        @include('pdf.components.pamat_info', $pamat_info)
        @include('pdf.components.med', ['responses' => $med])
        @include('pdf.components.pensija', [])
    </x-pdf.page>
        
    {{-- beres --}}
    <x-pdf.page>
        @include('pdf.components.beres', ['responses' => $beres])
    </x-pdf.page>

    {{-- finanses --}}
    <x-pdf.page>
        @include('pdf.components.finanses', ['responses' => $finanses])
    </x-pdf.page>

    {{-- testaments --}}
    <x-pdf.page>
        @include('pdf.components.testaments', ['responses' => $testaments])
    </x-pdf.page>

    {{-- digitalais mantojums --}}
    <x-pdf.page> 
        @include('pdf.components.digmantojums', ['accounts' => $accounts, 'platforms' => $platforms])
    </x-pdf.page>

    {{-- dzives pienakumi --}}
    <x-pdf.page>
        @include('pdf.components.pienakumi', ['responses' => $pienakumi])
    </x-pdf.page>

    {{-- zinas no manis - katram cilvēkam sava lapa? --}}
    @foreach ($zinas as $zina)
        @if (!empty($zina->content))
            <x-pdf.page>
                @include('pdf.components.zina', $zina)
            </x-pdf.page>
        @endif
    @endforeach

@endsection
