@extends('layouts.app')
@section('title', 'Rendeléseim')

@section('content')
    <h1>Rendeléseim</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if ($orders == null)
        <h2>Nincsenek rendelések</h2>
    @else
        @foreach ($orders as $order)
            <br>
            <h3>Rendelés azonosító: #{{ $order->id }}</h3>
            <h4>Tételek</h4>
            <ul>
                @foreach ($order->orderItems as $item)
                    <li>{{ $item->product_name }} - {{ $item->quantity }} db -  {{ number_format($item->product_total_price, 0, ',', ' ') }} Ft</li>
                @endforeach
            </ul>
            <h5>Végösszeg: {{ number_format($order->total, 0, ',', ' ') }} Ft</h5>

            <form action="{{ route('deleteOrder') }}">
                <input type="hidden" name="id" value="{{ $order->id }}">
                <button class="btn btn-danger">Töröl</button>
            </form>
            <br>
        @endforeach
    @endif
@endsection
