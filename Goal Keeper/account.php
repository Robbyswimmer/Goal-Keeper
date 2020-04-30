<?php session_start(); ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <link rel="stylesheet" href="createAccount.css">
    <title>Create Account</title>
  </head>
  <body>
      <nav class="navbar navbar-expand-lg navbar-light bg-info">
          <a class="navbar-brand" href="signin.php">Goal Keeper</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                  aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                  <li class="nav-item">
                      <a class="nav-link" href="signin.php">Sign In<span class="sr-only">(current)</span></a>
                  </li>
                  <li class="navbar-nav mr-auto active">
                      <a class="nav-link" href="account.php">Create Account</a>
                  </li>
                  <li class="navbar-nav mr-auto">
                      <a class="nav-link" href="about.php">About</a>
                  </li>
              </ul>
          </div>
      </nav>

      <div class="container" style="margin-top: 2em">
          <div class="col-lg-4 col-md-4 col-sm-2"></div>
          <div class="container col-lg-4 col-md-6 col-sm-8 text-center">
              <h1>Create Account</h1>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-2" style="margin:3em"></div>
      </div>

      <div class="container col-lg-4 col-md-4 col-sm-1"></div>
      <div class="container col-lg-4 col-md-4 col-sm-10">
              <form action="create-account.php" method="post">
                  <div class="form-group">
                      <label for="email">Email address</label>
                      <input type="email" class="form-control inputWidth" name='email' id="email" aria-describedby="emailHelp" placeholder="Email" >
                  </div>
                  <div class="form-group">
                      <label for="username">Username</label>
                      <input type="text" class="form-control inputWidth" name='username' id="username" placeholder="Username">
                  </div>
                  <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" class="form-control inputWidth" name='password' id="password" placeholder="Password">
                  </div>
                  <div class="text-center">
                      <button type="submit" name="create" class="btn btn-primary" style="margin:20px">Create Account</button>
                  </div>
              </form>
              <div>
                  <?php
                  if (isset($_SESSION["duplicate"])) { ?>
                      <p>An account with that username or email already exists.</p> <?php
                  }
                  ?>
              </div>
      </div>
      <div class="container col-lg-4 col-md-4 col-sm-1"></div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
<?php
unset($_SESSION["duplicate"]);
?>