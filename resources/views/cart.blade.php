@extends('layouts.app')
@section('title', 'Kosár')

@section('content')
    <h1>A kosarad tartalma:</h1>

    <div class="container">
        @foreach ($cart as $product)
            <x-cart-item-card :product="$product" />
        @endforeach
    </div>

    <form action="" method="POST">

        <button href="/" class="btn btn-success">Megveszem</button>
    </form>
@endsection
