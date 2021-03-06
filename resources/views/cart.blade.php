@extends('layouts.app')
@section('title', 'Kosár')

@section('content')
    <h1>A kosarad tartalma:</h1>

    <div class="container">
        @if($cart != null)
            @foreach ($cart as $product)
                <x-cart-item-card :product="$product" />
            @endforeach
        @else
            <h1>A kosarad üres</h1>
        @endif
    </div>

    @if ($cart != null)
        <a href="{{ route('placeOrder') }}" class="btn btn-success">Megveszem</a>
    @endif
@endsection
