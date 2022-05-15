<div>
    <div class="card" style="width: 18rem;">
        <img src="{{ $product['image'] }}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{ $product['name'] }}</h5>
            <div class="card-title">{{ $product['price'] }} -Ft / db</div>
            <div>Mennyiség: {{ $product['quantity'] }} db</div>
            <p>Összesen: <strong>{{ $product['price'] * $product['quantity']}} Ft</strong></p>
        </div>
    </div>
</div>
