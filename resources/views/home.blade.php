@extends('layouts.app')
@section('title', 'Főoldal')

@section('content')
    <div class="container">
        @foreach ($products as $product)
            <x-product-card :product="$product" />
        @endforeach
    </div>

    {{ $products->links() }}
@endsection
