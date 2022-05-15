@extends('layouts.app')
@section('title', 'Rendelés leadás')

@section('content')
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('placeOrder') }}" method="POST">
        <div>
            <label for="name">Név</label>
            <input type="name" name="name">
        </div>

        <div>
            <label for="address">Cím</label>
            <input type="address" name="address">
        </div>

        <div>
            <label for="note">Megjegyzés</label>
            <input type="note" name="note">
        </div>

        <br>

        @if ($cartItems != null)
            @foreach ($cartItems as $product)
                <div> {{ $product['name'] }} - {{ $product['quantity'] }} db - {{ number_format($product['quantity'] * $product['price'], 0, ',', ' ') }} Ft</div>
            @endforeach
        @endif

        <br>

        <div>
            <h3>Total: {{ number_format($total, 0, ',', ' ') }} Ft</h3>
        </div>

        <div>
            <input type="checkbox" name="pp">
            <label for="pp">Elolvastam és tudomásul vettem az adatvédelmi tályékoztatóban és az ASZF-ben foglaltakat!</label>
        </div>

        <br>

        <button class="btn btn-success">Rendelés leadása</button>
    </form>
@endsection
