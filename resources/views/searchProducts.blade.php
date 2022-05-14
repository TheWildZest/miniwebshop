@extends('layouts.app')
@section('title', 'Keresés')

@section('content')
    <h1>Találatok a következőre: {{ $keyword }}</h1>

    <div class="container">
        @foreach ($products as $product)
            <x-product-card :product="$product" />
        @endforeach
    </div>

    {{ $products->links() }}
@endsection
