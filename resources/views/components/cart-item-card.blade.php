<div>
    <div class="card" style="width: 18rem;">
        <img src="{{ $product['image'] }}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{ $product['name'] }}</h5>
            <p class="card-title">{{ $product['price'] }} -Ft</p>
            <form action="/kosarba" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $product['id'] }}">
                <label for="quantity">Mennyiség</label>
                <input type="number" name="quantity" value="{{ $product['quantity'] }}">
                <br>
                <br>
            </form>
        </div>
    </div>
</div>
