@extends('layouts.app_layout_with_navbar')

@section('title', 'Ziedot')

@section('main_content')
    <section class="welcome-section">
        <h1 class="welcome-title">Vai vēlaties ziedot?</h1>

        <form id="donation-form" action="{{route('donate.checkout')}}" method="POST">
            @csrf
            <button type="submit" class="card-button">Ziedot</button>
        </form>
    </section>
@endsection
