@extends('layouts.app')
@section('title', 'Főoldal')

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

    <div class="container">
        @foreach ($products as $product)
            <x-product-card :product="$product" />
        @endforeach
    </div>

    {{ $products->links() }}
@endsection
