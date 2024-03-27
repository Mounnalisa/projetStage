<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Task-app</title>
 <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    
</head>

<body id="page-top">
    
@include('partials.header')
<div class="container">
    <div class="text-right mb-3">
        <a href="{{route('create.project')}}" class="btn btn-success" style="background-color: #7743DB;">Créer un projet</a>
    </div>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Nom</th>
                <th scope="col">Date début</th>
                <th scope="col">Date fin</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
           
            @foreach ($projects as $project)
            <tr>
               
                <td> <a href="{{route('project',$project->id)}}">{{$project->name}}</a></td>
                <td>{{$project->start_date}}</td>
                <td>{{$project->end_date}}</td>
                <td>

                    <a class="nav-link dropdown-toggle" href="#" id="projectDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    
                    </a>
                    <div class="dropdown-menu" aria-labelledby="projectDropdown">
            
                        <button><a class="dropdown-item" href="{{route('update.project',$project->id)}}">Modifier</a></button>
                        <hr class="sidebar-divider">


                        <form action="{{ route('delete.project', $project->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button><a class="dropdown-item" type="submit">Supprimer</a></button>

                        </form>
                        {{-- <a class="dropdown-item" href="{{route('delete.project')}}">Supprimer</a> --}}
                    </div>
                </td>
            
            </tr>
            @endforeach
        </tbody>
    </table>
    
</div>



 <!-- Bootstrap core JavaScript-->
 <script src="vendor/jquery/jquery.min.js"></script>
 <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

 <!-- Core plugin JavaScript-->
 <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

 <!-- Custom scripts for all pages-->
 <script src="js/sb-admin-2.min.js"></script>

 <!-- Page level plugins -->
 <script src="vendor/chart.js/Chart.min.js"></script>

 <!-- Page level custom scripts -->
 <script src="js/demo/chart-area-demo.js"></script>
 <script src="js/demo/chart-pie-demo.js"></script>
 

</body>

</html>
