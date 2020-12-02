@extends('layouts.dark')

@section('content')
<div class="alert alert-success text-center mt-5" role="alert" id="alert">
  Umówiono kolejną wizytę! 
</div>
<div class="alert alert-danger text-center mt-5" role="alert" style="display: none;" id="alert1">
  Wystąpił błąd!
</div>
{!! Form::open(['route' => 'rezerwacje/store', 'id' => 'addform']) !!}
<div class="row mt-5 ml-3 mr-3" style="border-bottom: 1px solid white;">
  <div class="col-2 text-center">
    <h6>{!! Form::label('datepicker', "Wybierz date ") !!}</h6>
    {!! Form::text('datepicker', null, ['class'=>'form-control', 'data-date-format'=> 'dd/mm/yyyy']) !!}
  </div>
  <div class="col-2 text-center">
    <h6>{!! Form::label('time', "Wybierz godzine ") !!}</h6>
    {!! Form::select('time', ['8:00'=>'8:00', '9:00'=>'9:00', '10:00'=>'10:00', '11:00'=>'11:00' ], null, ['class'=>'custom-select']) !!}
  </div>
  <div class="col-5 text-center">
    <h6>{!! Form::label('info', "Dodatkowe infromacje ") !!}</h6>
    {!! Form::text('info', null, ['class'=>'form-control', 'placeholder'=>'Imię, numer telefonu, e-mail ']) !!}
    {!! Form::hidden('status', '0') !!}
  </div>
  <div class="col">
    <div class="form-group mt-3 float-right">
      {!! Form::submit('Dodaj rezerwacje', ['class'=>'btn btn-success btn-lg btn-block']) !!} 
    </div>
  </div>   
</div>              
{!! Form::close() !!}
        
<div class="row justify-content-center mt-1">
  <div class="col-12">
    <table class="table  table-striped table-reponsive table-borderless dark-colors shadow">
      <thead>
        <tr>
          <th scope="col">Numer</th>
          <th scope="col">Data</th>
          <th scope="col">Godzina</th>
          <th scope="col">Informacja</th>
          <th scope="col">Status</th>
          <th scope="col">Akcja</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($all as $item)
        <tr>
          <th>{{$item->id}}</th>
          <th scope="row">
          <?php 
          $m2 = explode("/",  $item->datepicker);
          $mname = date('F', mktime(0, 0, 0, $m2[1], 10));
          $months_en = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
          $months_pl = array('Styczeń', 'Luty', 'Marzec', 'Kwiecień', 'Maj', 'Czerwiec', 'Lipiec', 'Sierpień', 'Wrzesień', 'Październik', 'Listopad', 'Grudzień');
          $pl_month = str_replace($months_en, $months_pl, $mname);
          echo $m2[0].' '.$pl_month;
          ?>
          <hr>
          </th>
          <td>{{$item->time}}</td>
          <td>{{$item->info}}</td>
          <td>
            <?php
            if($item->status == '0') { ?>
              <button class="btn btn-danger disabled">Oczekująca</button>
              <?php
            } 
            ?>

          </td>
          <td>
            <div class="btn-group" role="group" aria-label="Basic example">
              {!! Form::model($item, ['route' => ['rezerwacje/delete', $item], 'method' => 'DELETE', 'id' => 'delb']) !!}
                <button class="btn btn-danger btn-wid delbtn">Usuń</button>
              {!! Form::close() !!}
              <a href="{{ route('rezerwacje/edit', $item) }}" class="btn btn-primary btn-wid">Edytuj</a>
              <a href="{{ route('rezerwacje/accept', $item) }}" class="btn btn-success btn-wid">Wykonano</a>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
  $('#alert').hide();
  $('#addform').on('submit', function(e) {
    e.preventDefault();

    $.ajax({
      type: "POST",
      url: "/rezerwacje/store",
      data: $('#addform').serialize(),
      success: function (response) {
        console.log(response)
        $('#alert').show().addClass("animate__animated animate__backInDown");
      },
      error: function (error) {
        console.log(error)
        $('#alert1').show();
      }
    });
  });

  $(".delbtn").click(function(){
        var id = $('#delb').data("id");
        var token = $(this).data("token");
        $.ajax(
        {
            url: "rezerwacje/delete/"+id,
            type: 'PUT',
            data: {
                "id": id,
                "_method": 'DELETE',
                "_token": token,
            },
            success: function ()
            {
                console.log("it Work");
            }
        });

        console.log("It failed");
    });
});
</script>
@endsection