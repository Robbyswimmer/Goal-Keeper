<?php
session_start();

unset($_SESSION['username']);
unset($_SESSION['id'])

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <link rel="stylesheet" href="createAccount.css"/>
    <title>Sign in</title>
  </head>
  <body class="text-center">
      <nav class="navbar navbar-expand-lg navbar-light bg-info" style="margin:0">
          <a class="navbar-brand" href="signin.php">Goal Keeper</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                  aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto active">
                  <li class="nav-item mr-auto">
                      <a class="nav-link" href="signin.php">Sign In<span class="sr-only">(current)</span></a>
                  </li>
                  <li class="navbar-nav mr-auto ">
                      <a class="nav-link" href="account.php">Create Account</a>
                  </li>
                  <li class="navbar-nav mr-auto">
                      <a class="nav-link" href="about.php">About</a>
                  </li>
              </ul>
          </div>
      </nav>

      </br>
      <div class="container">
          <div class="col-4"></div>
          <div class="container col-4">
              <h1>Goal Keeper</h1>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-2" style="margin:1em"></div>
      </div>
      <div class="container text-center">
          <div class="col-lg-4 col-md-4 col-sm-0"></div>
          <div class="container col-lg-4 col-md-4 col-sm-10">
              <h2 style="margin:20px">Sign in</h2>
              <div>
                  <?php
                  if (isset($_SESSION['error'])) { ?>
                      <p>Incorrect username or password.</p> <?php
                  }
                  ?>
              </div>
              <form action="signin-server.php" method="post">
                <input class="form-group form-control mx-sm-3 mb-1" type="text" name="username" placeholder="Username" style="margin:10px"/>
                </br>
                <input class="form-group form-control mx-sm-3 mb-1" type="password" name="password" placeholder="Password" style="margin:10px"/>
                </br>
                <div class="checkbox mb-3">
                  <label>
                    <input type="checkbox" value="remember-me"> Remember me
                  </label>
                </div>
                <input id="rounded" name="signin" class="btn-outline-primary btn-md" style=" width: 80%; border-radius:20px" type="submit" value="Sign in"/>
            </form>
            </br>
            <a href="account.php"><input id="rounded" class="btn-outline-primary btn-md" style=" width: 80%; border-radius:20px" type="submit" value="Create an Account"/></a>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-6"></div>
      </div>
      
      <div id="jumbo" class="jumbotron text-center bg-white" style="bg-color:light ">
          <h3 style="font-style:italic">Helping you achieve your goals one day at a time!</h3>
          <a href="about.php"><p>How to use Goal Keeper</p></a>
      </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

<?php
unset($_SESSION["error"]);
?>