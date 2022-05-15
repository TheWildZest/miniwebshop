@extends('layouts.app')
@section('title', 'Kosár')

@section('content')
    <h1>A kosarad tartalma:</h1>

    {{ print_r($session) }}
@endsection
