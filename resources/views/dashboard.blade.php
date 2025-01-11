@extends('layouts.app')
@section('content')

<h1>Dashboard {{ $user->name }}</h1>

<form action="{{ route('logout') }}" method="post">
    @csrf
    <button class="btn btn-danger">Logout</button>
</form>

@endsection