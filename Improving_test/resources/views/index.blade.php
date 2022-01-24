
@extends('layouts.app')

@section('content')
    <div>
    <h1>Intast by og land</h1>
    {!! Form::open(['action' => 'App\Http\Controllers\MainController@dataHandler', 'method' => 'POST']) !!}
        <div>
            {{Form::label('city', 'BY')}}
            {{Form::text('city','', [ 'placeholder' => 'By'])}}
        </div>

        <div>
            <p>Dato er valgfri</p>
        </div>
    <div >
         {{Form::label('date', 'Dato')}}
         {{Form::date('date', '', ['placeholder' => 'YYYY-MM-DD'])}}
    </div>
    {{Form::submit('Submit')}}
    {!! Form::close() !!}
    </div>
    <hr>


@endsection
