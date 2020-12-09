<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>KamiLashes</title>

  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.js"></script>

  <link rel="stylesheet" href="{{ asset('css/simple.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('css/lashes.css') }}" type="text/css" id="theme-link">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

</head>

<body>
  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="border-right dark-colors shadow" id="sidebar-wrapper">
      <div class="sidebar-heading">Kamajli Lashes </div>
      <div class="list-group list-group-flush">
        <a href="{{route('rezerwacje')}}" class="list-group-item list-group-item-action dark-colors">Panel</a>
        <a href="{{route('rezerwacje/create')}}" class="list-group-item list-group-item-action dark-colors">Rezerwacje</a>
        <a href="{{route('rezerwacje/archiwum')}}" class="list-group-item list-group-item-action dark-colors">Archiwum</a>
        <a href="" class="list-group-item list-group-item-action dark-colors">Notatki</a>
        <a href="{{route('mail/index')}}" class="list-group-item list-group-item-action dark-colors">Marketing</a>
        <a href="{{route('posty')}}" class="list-group-item list-group-item-action dark-colors">Moje prace</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg dark-colors shadow">
        <button class="btn btn-primary" id="menu-toggle">Ukryj/Pokaż</button><button class="btn btn-white btn-toggle ml-2">Tryb jasny</button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            
            
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{Auth::user()->name}}
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  {{ __('Wyloguj') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>
              </div>
            </li>
          </ul>
        </div>
      </nav>

      <div class="container-fluid">
        @yield('content')
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
  <!-- Menu Toggle Script -->
  <script>
    const btn = document.querySelector(".btn-toggle");
    const theme = document.querySelector("#theme-link");
    btn.addEventListener("click", function() {
      if (theme.getAttribute("href") == "{{ asset('css/lashes-white.css') }}") {
        theme.href = "{{ asset('css/lashes.css') }}";
        btn.innerHTML = "Tryb jasny";
      } else {
        theme.href = "{{ asset('css/lashes-white.css') }}";
        btn.innerHTML = "Tryb ciemny";
      }
    });
  </script>
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
