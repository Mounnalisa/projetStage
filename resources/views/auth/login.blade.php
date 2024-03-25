<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <!-- Ajout de Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
   
    <style>
        body {
            height: 100vh; 
        }
        .background-image {
            background-image: url('https://image.freepik.com/vecteurs-libre/concept-gestion-taches_107173-16743.jpg');
            background-size: cover;
            background-position: left; 
    
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Colonne pour l'image de fond -->
            <div class="col-md-6 background-image">
            </div>
            <!-- Colonne pour le formulaire d'inscription -->
            <div class="col-md-6">
                <div class="container mt-5">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <h2 class="card-title"><span style="color: black;">Se</span> <span style="color: #7743DB;">Connecter</span></h2>

                                <div class="card-body">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <!-- Email Address -->
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
                                            @error('email')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Password -->
                                        <div class="mb-3">
                                            <label for="password" class="form-label">Mote De Passe</label>
                                            <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password">
                                            @error('password')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Remember Me -->
                                        <div class="mb-3 form-check">
                                            <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                                            <label for="remember_me" class="form-check-label">Remember me</label>
                                        </div>

                                        <button type="submit" class="btn btn-dark" style="background-color: #7743DB;">Connexion</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Ajout de Bootstrap JS si nécessaire -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
