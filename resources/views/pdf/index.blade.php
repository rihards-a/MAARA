@extends('pdf.layouts.base')

@section('title', 'Example PDF')

@section('content')

    @include('pdf.components.beres', ['title' => 'beres', 'body' => 'Section text']) 
    @include('pdf.components.digmantojums', ['title' => 'digmantojums', 'body' => ' body text'])
    @include('pdf.components.finanses', ['title' => 'finanses', 'body' => 'fin text'])

@endsection
