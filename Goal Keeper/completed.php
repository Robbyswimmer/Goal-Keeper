<?php
session_start();

if ($_SESSION['id'] == '') {
    header("Location:signin.php");
}

include("dbi.php");

$user_id = $_SESSION['id'];
$type = $_POST['type'];

if (strcmp($type, "All-Time") == 0) {
    $type = "alltime";
}

if (strcmp($type, "") == 0 || strcmp($type, null) == 0) {
    $type = "All";
}

if (isset($_POST['delete'])) {
    $goal_id = $_POST['goal_id'];
    $sql = mysqli_prepare($dbi, "DELETE FROM goals_goals WHERE id='$goal_id'");
    mysqli_stmt_execute($sql);
    mysqli_stmt_close($sql);
}

//include("printcompleted.php");
//$id = $_SESSION['id'];

?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Completed Goals</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-info" style="width:100%">
    <a class="navbar-brand" href="#">Goal Keeper</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="about.php">About <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="completed.php">Completed</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Goals
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="GoalTypes/DailyGoals.php">Daily</a>
                    <a class="dropdown-item" href="GoalTypes/WeeklyGoals.php">Weekly</a>
                    <a class="dropdown-item" href="GoalTypes/MonthlyGoals.php">Monthly</a>
                    <a class="dropdown-item" href="GoalTypes/YearlyGoals.php">Yearly</a>
                    <a class="dropdown-item" href="GoalTypes/AllTimeGoals.php">All-time</a>
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
                    <a class="nav-link" href="signin.php">Sign Out</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

    <div class="container col-lg-4 col-md-6 col-sm-10 text-center" style="margin-top: 2em">
        <h1>Completed Goals</h1>
    </div>

    <div class="container col-lg-10 col-md-10 col-sm-10 text-center">
        <form action="completed.php" method="post">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?php
                  if (strcmp($type, "") == 0){
                      $type = "All";
                  } ?>
                   Goal Type: <?=$type?>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <input class="dropdown-item" type="submit" name="type" value="Daily">
                    <input class="dropdown-item" type="submit" name="type" value="Weekly">
                    <input class="dropdown-item" type="submit" name="type" value="Monthly">
                    <input class="dropdown-item" type="submit" name="type" value="Yearly">
                    <input class="dropdown-item" type="submit" name="type" value="All-Time">
                    <input class="dropdown-item" type="submit" name="type" value="All">
                </div>
            </div>
        </form>
    </div>

    <div class="container col-lg-10 col-md-10 col-sm-10 table-responsive{-md}" style="margin-top: 2em">
        <table class="table table-responsive table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Goal ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Rating</th>
                    <th scope="col">Goal Description</th>
                    <th scope="col">Goal Type</th>
                    <th scope="col">Remove</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $completed = 1;
                if (strcmp($type, "All") == 0) {
                    $sql = mysqli_prepare($dbi, "SELECT id, user_id, title, description, goal_type, rating FROM goals_goals WHERE user_id='$user_id' AND completed='$completed'");
                } else {
                    $sql = mysqli_prepare($dbi, "SELECT id, user_id, title, description, goal_type, rating FROM goals_goals WHERE user_id='$user_id' AND goal_type='$type' AND completed='$completed'");
                }
                mysqli_stmt_execute($sql);
                mysqli_stmt_store_result($sql);
                mysqli_stmt_bind_result($sql, $goal_id, $user_id, $goal_title, $goal_desc, $goal_type, $rating);

                while (mysqli_stmt_fetch($sql)) {
                ?>
                <tr>
                    <td><?=$goal_id?></td>
                    <td><?=$goal_title?></td>
                    <td><?=$rating?></td>
                    <td><?=$goal_desc?></td>
                    <td><?=$goal_type?></td>
                    <td>
                        <form action="completed.php" method="post">
                            <button type="submit" name="delete" class="btn btn-outline-danger">
                                Remove
                            </button>
                            <input type="hidden" name="goal_id" value=<?=$goal_id?>>
                        </form>
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
