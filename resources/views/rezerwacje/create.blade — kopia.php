<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Simple Sidebar - Start Bootstrap Template</title>

  <!-- Bootstrap core CSS -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  

  <!-- Custom styles for this template -->
  <link rel="stylesheet" href="{{ asset('css/simple.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('css/lashes.css') }}" type="text/css">
</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="border-right dark-colors shadow" id="sidebar-wrapper">
      <div class="sidebar-heading">Kamajli Lashes </div>
      <div class="list-group list-group-flush">
        <a href="#" class="list-group-item list-group-item-action dark-colors">Dashboard</a>
        <a href="#" class="list-group-item list-group-item-action dark-colors">Shortcuts</a>
        <a href="#" class="list-group-item list-group-item-action dark-colors">Overview</a>
        <a href="#" class="list-group-item list-group-item-action dark-colors">Events</a>
        <a href="#" class="list-group-item list-group-item-action dark-colors">Profile</a>
        <a href="#" class="list-group-item list-group-item-action dark-colors">Status</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg dark-colors shadow">
        <button class="btn btn-primary" id="menu-toggle">Ukryj/Pokaż</button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Kamajli
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>

      <div class="container-fluid">
        {!! Form::open(['route' => 'rezerwacje/store']) !!}
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
            <table class="table table-dark table-striped table-reponsive table-borderless dark-colors shadow">
              <thead>
                <tr>
                  <th scope="col">Data</th>
                  <th scope="col">Godzina</th>
                  <th scope="col">Informacja</th>
                  <th scope="col">Akcja</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($all as $item)
                  <tr>
                    <th scope="row">
                      <?php 
                          $m2 = explode("/",  $item->datepicker);
                          $mname = date('F', mktime(0, 0, 0, $m2[1], 10));
                          $months_en = array(
                              'January',
                              'February',
                              'March',
                              'April',
                              'May',
                              'June',
                              'July',
                              'August',
                              'September',
                              'October',
                              'November',
                              'December'
                          );
                          $months_pl = array(
                              'Styczeń',
                              'Luty',
                              'Marzec',
                              'Kwiecień',
                              'Maj',
                              'Czerwiec',
                              'Lipiec',
                              'Sierpień',
                              'Wrzesień',
                              'Październik',
                              'Listopad',
                              'Grudzień'
                          );
                          $pl_month = str_replace($months_en, $months_pl, $mname);
                          echo $m2[0].' '.$pl_month;
                      ?>
                    </th>
                    <td>{{$item->time}}</td>
                    <td>{{$item->info}}</td>
                    <td><button class="btn btn-danger mr-3">Usuń</button><button class="btn btn-primary">Edytuj</button></td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>
  <script type="text/javascript">
    $('#datepicker').datepicker({
        weekStart: 1,
        daysOfWeekHighlighted: "6,0",
        autoclose: true,
        todayHighlight: true,
    });
    $('#datepicker').datepicker("setDate", new Date());
</script>

</body>

</html>
