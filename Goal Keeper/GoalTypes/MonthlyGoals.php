<?php
session_start();

if ($_SESSION['id'] == '') {
    header("Location:../signin.php");
}

include("../dbi.php");
include("addGoals.php");

$id = $_SESSION['id'];

?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <script type="text/javascript" src="readGoals.js"></script>
    <title>Monthly Goals</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-info">
    <a class="navbar-brand" href="#">Goal Keeper</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../about.php">About <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../completed.php">Completed</a>
            </li>
            <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Goals
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="DailyGoals.php">Daily</a>
                    <a class="dropdown-item" href="WeeklyGoals.php">Weekly</a>
                    <a class="dropdown-item" href="MonthlyGoals.php">Monthly</a>
                    <a class="dropdown-item" href="YearlyGoals.php">Yearly</a>
                    <a class="dropdown-item" href="AllTimeGoals.php">All-time</a>
                </div>
            </li>
        </ul>
        <div class="float-right">
            <ul class="navbar-nav mr-auto">
                <div class="border-right border-right-dark" style="border-right: 1px">
                    <li class="nav-item active">
                        <a class="nav-link active">Hi, <?=$_SESSION['username']?>!</a>
                    </li>
                </div>
                <li class="nav-item">
                    <a class="nav-link" href="../signin.php">Sign Out</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container text-center" style="margin-top:2em">
    <h1>Monthly Goals</h1>
</div>

<div class="container col-lg-4 col-md-6 col-sm-10 text-left">
    <form class="form-grouping" action="addGoals.php" method="post">
        <label>Goal Title</label>
        <input type="text" class="form-control inputWidth" id="title" name="title" placeholder="Title" >
        <br/>
        <label>Goal Description</label>
        <input type="text" class="form-control inputWidth" id="description" name="description" placeholder="Description" >
        <input type="hidden" name="goal_type" value="Monthly" id="goal_type">
        <div class="text-center">
            <input class="btn btn-primary text-center" type="submit" value="Add Goal" name="submit" style="margin:1em">
            <input type="hidden" name="page" value="MonthlyGoals.php">
        </div>
    </form>
</div>
<div class="container col-8">
    <div class="row">
        <?php printGoals($id, $dbi, "Monthly", "MonthlyGoals.php"); ?>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
