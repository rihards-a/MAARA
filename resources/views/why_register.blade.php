<!-- gpt garbage -->
@extends ('layouts.app_layout_with_navbar')

@section('title', 'Why Register')

@section('main_content')
<body>
    <div>
        <h1 class="mb-4">Plan Your Legacy: Manage Your Death, Your Way</h1>
        <p>
            Life is unpredictable, but planning your legacy doesn’t have to be. Our innovative service empowers you to manage your final arrangements, ensuring that every detail—down to the music at your farewell—reflects your unique life.
        </p>
        <h3>Why Manage Your Death?</h3>
        <p>
            While it may sound morbid, managing your death is about taking control of your future and relieving your loved ones of difficult decisions during a time of grief. By clarifying your wishes in advance, you can:
        </p>
        <ul>
            <li>Express your final wishes clearly</li>
            <li>Ease the emotional burden on your family</li>
            <li>Customize every aspect of your farewell, including selecting the perfect soundtrack for your send-off</li>
            <li>Create a memorable celebration of your life</li>
        </ul>
        <h3>What Kind of Music Do You Want?</h3>
        <p>
            Whether you prefer soothing classical, vibrant rock, or your personal favorite hits, our service lets you pick the soundtrack that best reflects your personality and life story.
        </p>

        <div class="nav-container">
        <ul class="navbar-links-2">
            <li><a href="{{ route('register') }}">Register</a></li>
            <li><a href="{{ url('auth/google') }}">Register with Google</a></li>
        </ul>
        </div>
    </div>
</body>
<style>
.navbar-links-2 a {
    background-color: pink !important;
    color: white !important; /* Text color for contrast */
    padding: 10px 20px;      /* Makes it button-like */
    border-radius: 5px;      /* Slight rounded corners */
    display: inline-block;   /* Ensures proper spacing */
}
</style>
@endsection
