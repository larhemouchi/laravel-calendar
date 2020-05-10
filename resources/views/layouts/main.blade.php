<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/core/main.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/daygrid/main.min.css"/>

    <link rel="stylesheet" href="{{asset("css/style.css")}}">
    <link rel="stylesheet" href="/css/bootstrap.min.css">

    <title>Laravel Event App</title>
</head>
<body>
    <div class="container border border-dark my-2">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Events App</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{url('/')}}">Accueil <span class="sr-only">(current)</span></a>
                </li>
            </div>
        </nav>
        @yield('content')



<div id="model-add-garde" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Ajouter une garde</h4>
      </div>
      <div class="modal-body">

         <form action="{{route('events.store')}}" method="post" id="form-model-add-garde" >
                        @csrf
            <div class="container">
                            <form>
                                <fieldset class="form-group row">
                                    <legend class="col-form-legend col-sm-1-12">Titre</legend>
                                    <div class="col-sm-1-12">
                                        <input type="text" class="form-control" name="title" id="modal_add_garde_title" placeholder="Titre*">
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" onclick="saveEvent()" class="btn btn-primary">Valider</button>
      </div>
    </div>
  </div>
</div>


<div id="model-view-garde" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><span class="garde_title"></span></h4>
      </div>
      <div class="modal-body">
        <h3 class="text-primary font-weight-bold text-center"><span class="garde_title"></span></h3>
        <ul class="list-group">
            <li class="list-group-item">
                <p class="text-default font-weight-bold">Nom de service : <span class="garde_service"></span></p>
            </li>
            <li class="list-group-item">
                <p class="text-success font-weight-bold">Date début : <span class="garde_dt_debut"></span></p>
            </li>
            <li class="list-group-item">
                <p class="text-danger font-weight-bold">Date fin : <span class="garde_dt_fin"></span></p>
            </li>
        </ul>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" id="btn_remove_garde" garde_id="" onclick="removeGarde(this)" class="btn btn-primary">Supprimer</button>

      </div>
    </div>
  </div>
</div>
    </div>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js" integrity="sha256-4iQZ6BVL4qNKlQ27TExEhBN1HFPvAvAMbFavKKosSWQ=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/core/main.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/daygrid/main.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/interaction/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    @yield('scripts')
</body>
</html>
