<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <title>Document</title>
    <style>
        body {
    background-color: #393e46 !important;
    color: white;
  }
  .card {
    background-color: #222831;
  }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            @foreach ($posts as $item)
            <div class="col-4">
                <div class="card mt-3 p-2" style="height: 400px;">
                    <img src="{{url('uploads/'.$item->filename)}}" class="card-img-top img-fluid rounded" alt="Praca {{$item->id}}">
                    <div class="card-body">
                        <h3 class="text-center">{{$item->title}}</h3><hr>
                      <p class="card-text text-center">{{$item->description}}</p>
                    </div>
                  </div>
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>