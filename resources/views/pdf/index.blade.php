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

    {{-- finanses --}} {{-- testaments --}}
    <x-pdf.page>
        @include('pdf.components.finanses', ['responses' => $finanses])
        @include('pdf.components.testaments', [])
    </x-pdf.page>

    {{-- digitalais mantojums --}}
    <x-pdf.page>
        @include('pdf.components.digmantojums', ['title' => 'digmantojums', 'body' => ' body text'])
    </x-pdf.page>

    {{-- dzives pienakumi --}}
    <x-pdf.page>
        @include('pdf.components.pienakumi', [])
    </x-pdf.page>

    {{-- zinas no manis - katram cilvēkam sava lapa? --}}
    @foreach ($zinas as $zina)
        <x-pdf.page>
            @include('pdf.components.zina', $zina)
        </x-pdf.page>
    @endforeach

@endsection
