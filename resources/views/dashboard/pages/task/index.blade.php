<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">


    <title>Helaaaaaalo, world!</title>
    <script src="https://js.pusher.com/7.1/pusher.min.js"></script>
    <script>

      // Enable pusher logging - don't include this in production
      Pusher.logToConsole = true;

      var pusher = new Pusher('af936f1079bc39d5615b', {
        cluster: 'eu'
      });

      var channel = pusher.subscribe('ToDoListChanal');
      channel.bind('ToDoListEvent', function(data) {
        var url = "{{route('task.collection')}}";
              $("#tasks_collection").load(url);      
      });
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      
    <script type="text/javascript" src="{{asset('validator/jquery.validate.js')}}"></script>
    <script type="text/javascript" src="{{asset('validator/additional-methods.js')}}"></script>

  </head>
  <body>
    <div class="container">
        @include('dashboard.pages.task.create', ['all_statuses' => $all_statuses ])
        @include('dashboard.pages.task.all', ['all_statuses' => $all_statuses , 'tasks_collection' => $tasks_collection ])
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


  </body>
</html>