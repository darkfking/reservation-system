@extends('layouts.dark')
@section('content')

{!! Form::model($item, ['route' => ['rezerwacje/update', $item], 'method' => 'PUT']) !!}
<div class="row mt-5">
    <div class="col-lg-12 text-center mt-5">
        <h3 class="mt-5">Edytuj rezerwacje numer <b style="color: #00adb5;">{{$item->id}}</b></h3>
    </div>
</div>

<div class="row mt-5 justify-content-lg-center">
  <div class="col-2 text-center">
    <h6>{!! Form::label('datepicker', "Wybierz date ") !!}</h6>
    {!! Form::text('datepicker', $item->datepicker, ['class'=>'form-control', 'data-date-format'=> 'dd/mm/yyyy']) !!}
  </div>
  <div class="col-2 text-center">
    <h6>{!! Form::label('time', "Wybierz godzine ") !!}</h6>
    {!! Form::select('time', ['8:00'=>'8:00', '9:00'=>'9:00', '10:00'=>'10:00', '11:00'=>'11:00' ], $item->time, ['class'=>'custom-select']) !!}
  </div>
  <div class="col-5 text-center">
    <h6>{!! Form::label('info', "Dodatkowe infromacje ") !!}</h6>
    {!! Form::text('info', $item->info, ['class'=>'form-control', 'placeholder'=>'Imię, numer telefonu, e-mail ']) !!}
    {!! Form::hidden('status', '0') !!}
  </div>
</div>  
<div class="row mt-5 justify-content-lg-center">
    <div class="col-4">
        <a href="{{ url()->previous() }}" class="btn btn-danger btn-block btn-lg">Wróć</a>
    </div>
    <div class="col-6">
        {!! Form::submit('Zaktualizuj', ['class'=>'btn btn-primary btn-block btn-lg']) !!}   
    </div>  
</div>   
{!! Form::close() !!}

@endsection