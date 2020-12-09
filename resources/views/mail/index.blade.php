@extends('layouts.dark')

@section('content')
    
    <table class="table table-dark table-striped table-borderless dark-colors">
        <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">E-mail</th>
              <th scope="col">Status</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($mails as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->email}}</td>
                <th>{{$item->status}}</th>
            </tr>
            @endforeach
          </tbody>
        
    </table>
@endsection