@extends('layouts.app')

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

@section('content')
    <h1>Hentede data</h1>
    @foreach($data as $d)
        <div><p>Dato {{$d["date"]}}</p></div>
        <div><p>Solen går op kl {{$d["respone"]["sunrise"]}}</p></div>
        <div><p>Solen går ned kl {{$d["respone"]["sunset"]}}</p></div>
    @endforeach
@endsection


