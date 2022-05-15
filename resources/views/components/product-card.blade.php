<div>
    <div class="card" style="width: 18rem;">
        <img src="{{ $product->image }}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{ $product->name }}</h5>
            <p class="card-text">{{ $product->description }}</p>
            <form action="/kosarba" method="POST">
                @csrf
                <input type="hidden" name="productId" value="{{ $product->id }}">
                <label for="quantity">Mennyiség</label>
                <input type="number" name="quantity" value="1">
                <br>
                <br>
                <button type="submit" class="btn btn-primary">Kosárba</button>
            </form>
        </div>
    </div>
</div>
