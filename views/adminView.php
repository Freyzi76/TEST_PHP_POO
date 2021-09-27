<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>layout</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../css/all.css">


</head>
<body>

<header class="p-3 bg-dark text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="/" class="nav-link px-2 text-secondary">Home</a></li>
          <?= isset($_SESSION['id']) ? '<li><a href="/posts" class="nav-link px-2 text-white">Posts</a></li>' : ''; ?>
          
        </ul>



        <div class="text-end">
          <?= isset($_SESSION['id']) ? '<a href="/logout" class="btn btn-danger me-2"><i width="24" height="24" class="fas fa-sign-out-alt"></i> Se Déconnecter</a>' : '<a href="/login" class="btn btn-success me-2">Se Connecter</a> <a href="/Sign" class="btn btn-warning me-2">Crée un compte</a>'; ?>
        </div>
      </div>
    </div>
  </header>


    <div class="row">

        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">

            <div class="position-sticky pt-3">
                <ul class="nav flex-column">

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/admin/">
                        <i width="24" height="24" class="fal fa-home-lg"></i>
                        Dashboard
                        </a>
                    </li>
            
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/admin/article">
                        <i width="24" height="24" class="fas fa-shopping-basket"></i>
                        Modifier un article
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/admin/tag">
                        <i width="24" height="24" class="fas fa-tags"></i>
                        Modifier un tag
                        </a>
                    </li>
            
            
            </div>

        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

        <?= $content ?>

        </main>

    </div>

    
</body>
</html>