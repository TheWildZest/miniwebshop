@extends('layouts.app')
@section('title', 'Regisztráció')

@section('content')
    <h1>Regisztráljon!</h1>

    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div>
            <label for="name">Név</label>
            <input type="name" name="name" value="{{ old('name') }}">
        </div>

        <div>
            <label for="email">Email</label>
            <input type="email" name="email" value="{{ old('email') }}">
        </div>

        <div>
            <label for="password">Jelszó</label>
            <input type="password" name="password">
        </div>

        <div>
            <label for="password">Jelszó újra</label>
            <input type="password" name="password_confirmation">
        </div>

        @error('failedRegister')
            <div class="errorBag">{{ $message }}</div>
        @enderror

        <button type="submit" class="btn btn-success">Regisztráció</button>
    </form>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
@endsection
