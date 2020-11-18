@extends('layouts.dark')
@section('content')
  <div class="row mt-5">
    <div class="col-12">
      <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true" style="width: 120px; text-align:center;">Dziś <span class="badge badge-light">{{$sum_tod}}</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false" style="width: 120px; text-align:center;">Jutro <span class="badge badge-light">{{$sum_tom}}</span></a>
        </li>
      </ul>
    </div>
  </div>

  <div class="row justify-content-center">
    <div class="col-12">
    <div class="tab-content" id="pills-tabContent">
      <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
        <div class="card text-center shadow-lg">
          <h3 class="card-header">Wizyty dziś</h3>
          <div class="card-body">
            <ul class="list-group ">
              @foreach ($all_tod as $tod)   
                <li class="list-group-item list-group-item-dark shadow" style="background-color: #2E333F; color: white;"><b>{{$tod->time}}</b> {{ $tod->info }}</li>   
              @endforeach
              <?php if ($sum_tod == 0) {
                echo 'Brak rezerwacji dzisiaj!';
              }         
              ?>
            </ul>
          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
        <div class="card text-center hadow-lg">
          <h3 class="card-header">Wizyty jutro</h3>
          <div class="card-body">
            <ul class="list-group ">
              @foreach ($all_tom as $tod)            
                <li class="list-group-item list-group-item-dark shadow" style="background-color: #2E333F; color: white;"><b>{{$tod->time}}</b> {{ $tod->info }}</li>   
              @endforeach
              <?php if ($sum_tom == 0) {
                echo 'Brak rezerwacji jutro!';
              }         
              ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
    </div>
  </div>

  <div class="row mt-4">
    <div class="col-8">
      <div class="card">
        <h3 class="card-header">Natężenie ruchu</h3>
        <div class="card-body">
          <canvas id="myChart" width="600px" height="300px"></canvas>
        </div>
      </div>
    </div>

    <div class="col-4">
      <div class="card">
        <h3 class="card-header">Liczba rezerwacji</h3>
        <div class="card-body">
          <canvas id="myChart2" width="100px" height="110px"></canvas>
        </div>
      </div>
    </div>
  </div>
  
  <script>
  var ctx = document.getElementById('myChart').getContext('2d');
  var chart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['8:00', '9:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00'],
      datasets: [{
        label: 'Liczba wizyt',
        backgroundColor: '#6C0472',
        borderColor: '#4A014E',
        data: <?php echo json_encode($hours); ?>
      }]
    },
    options: {
      legend: {
        display: false
      }
    }
  });

var ctx2 = document.getElementById('myChart2').getContext('2d');
var myPieChart = new Chart(ctx2, {
    type: 'pie',
    data: {
        labels: ['Wykonane', 'Oczekujące'],
        datasets: [{
            label: 'Liczba wizyt',
            data: <?php echo json_encode($data); ?>,
            backgroundColor: [
                '#00adb5','#222831'
            ]
        }]
    },
    options: {}
});
  </script>
@endsection