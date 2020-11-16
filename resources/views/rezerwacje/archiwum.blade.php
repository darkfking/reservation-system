@extends('layouts.dark')
@section('content')
<div class="row justify-content-center mt-1">
    <div class="col-12">
      <table class="table  table-striped table-reponsive table-borderless dark-colors shadow">
        <thead>
          <tr>
            <th scope="col">Data</th>
            <th scope="col">Godzina</th>
            <th scope="col">Informacja</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($arch as $item)
          <tr>
            <th scope="row">
            <?php 
            $m2 = explode("/",  $item->datepicker);
            $mname = date('F', mktime(0, 0, 0, $m2[1], 10));
            $months_en = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
            $months_pl = array('Styczeń', 'Luty', 'Marzec', 'Kwiecień', 'Maj', 'Czerwiec', 'Lipiec', 'Sierpień', 'Wrzesień', 'Październik', 'Listopad', 'Grudzień');
            $pl_month = str_replace($months_en, $months_pl, $mname);
            echo $m2[0].' '.$pl_month;
            ?>
            </th>
            <td>{{$item->time}}</td>
            <td>{{$item->info}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    {{ $arch->links() }}
  </div>
@endsection