@extends('layouts.app')
@section('title', 'Belépés')

@section('content')
    <h1>Lépjen be!</h1>

    <form action="{{ route('login') }}" method="POST">
        @csrf

        <div>
            <label for="email">Email</label>
            <input type="email" name="email" value="{{ old('email') }}">
        </div>

        <div>
            <label for="email">Jelszó</label>
            <input type="password" name="password">
        </div>

        @error('failedLogin')
            <div class="errorBag">{{ $message }}</div>
        @enderror

        <button type="submit" class="btn btn-success">Belépés</button>
    </form>
@endsection
