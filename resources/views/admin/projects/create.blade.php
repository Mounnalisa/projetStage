
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


    
    <div class="container mt-5"> <!-- Centrer le contenu -->
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-center mb-4"  style="color: #401F71; font-family: Verdana;">Ajouter un Projet</h3> <!-- Centrer le titre -->
                        <form method="POST" action="{{ route('store.project') }}">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nom</label>
                                <input type="text" name="name" id="name" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="email">Date de debut</label>
                                <input type="date" name="start_date" id="start_date" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="email">Date de fin</label>
                                <input type="date" name="end_date" id="end_date" class="form-control">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success"  style="background-color: #7743DB;"> 
                                    Enregistrer
                                </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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

