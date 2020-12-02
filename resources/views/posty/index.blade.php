@extends('layouts.dark')

@section('content')
<h1 class="d-inline">Moje prace</h1> <button class="d-inline float-right btn btn-success mt-2" data-toggle="modal" data-target="#exampleModalCenter">Dodaj nową pracę</button>

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content dark-colors">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Dodaj pracę</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            {!! Form::open(['route' => 'posty/store', 'id' => 'addform', 'files'=>true]) !!}
            <div class="col-12">
                <h6>{!! Form::label('title', "Tytuł") !!}</h6>
                {!! Form::text('title', null, ['class'=>'form-control']) !!}
            </div>
            <div class="col-12">
                <h6>{!! Form::label('description', "Opis ") !!}</h6>
                {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
                {!! Form::hidden('status', '0') !!}
            </div>
            <div class="col-12">
              <h6 class="mb-3 mt-3">Dodaj zdjęcie</h6>
              {{ Form::file('bookcover') }}
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
          {!! Form::submit('Dodaj prace', ['class'=>'btn btn-primary']) !!} 
        </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>

<div class="row text-center mt-5">
@foreach ($all as $item)

    <div class="col-6 mb-4">
        <div class="card">
            <div class="card-body">
                <img src="https://images.unsplash.com/photo-1492618269284-653dce58fd6d?ixlib=rb-1.2.1&auto=format&fit=crop&w=1355&q=80" width="300px" height="200px" class="img-fluid rounded float-left" alt="">
                <div class="btn-group" role="group" aria-label="Basic example">
                  {!! Form::model($item, ['route' => ['posty/delete', $item], 'method' => 'DELETE']) !!}
                  <button class="btn btn-danger btn-wid">Usuń</button>
                  {!! Form::close() !!}
                  <?php 
                  if($item->status == "1") {
                    echo "<button class='btn btn-success disabled'>Opublikowano</button>";
                  } else {
                    ?> <a href="{{ route('posty/public', $item) }}" class="btn btn-success btn-wid">Opublikuj</a> <?php
                  }
                  ?>
                </div>
                
                
                <h3 class="mb-5">{{$item->title}}</h3>
                <hr>
                <p class="mt-5">{{$item->description}}</p>
            </div>
        </div>
        
    </div>
    
@endforeach
</div>
@endsection