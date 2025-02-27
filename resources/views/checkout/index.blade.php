<div style="display: flex; gap: 3rem;">

</div>
<p>
<form action="{{route('checkout')}}" method="POST">
    @csrf
    <button>Checkout</button>
</form>
</p>