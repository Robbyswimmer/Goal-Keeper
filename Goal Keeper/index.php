<?php
    session_start();

    include("dbi.php");

    if (!isset($_SESSION['id'])) {
        Header('Location:signin.php');

    }
    $id = $_SESSION['id'];

    function getGoals($type, $user_id, $dbi) {

/*        print("<p>Type: <?=$type?></p>");*/
/*        print("<p>User ID: <?=$user_id?></p>");*/

        $sql = mysqli_prepare($dbi, "SELECT user_id, title, goal_type, completed FROM goals_goals WHERE user_id='$user_id' AND goal_type='$type'");
        mysqli_stmt_execute($sql);
        mysqli_stmt_store_result($sql);
        mysqli_stmt_bind_result($sql,$user_id, $goal_title, $goal_type, $completed);

        $counter = 1;
/*        print("<p>Completed (y/n): <?=$completed?></p>");*/
        while (mysqli_stmt_fetch($sql)) {
            if ($completed != 1 && $counter <= 3) {
                ?><li class="list-group-item"><?=$goal_title?></li><?php
                $counter++;
            }
        }
    }
    ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel=stylesheet" href="style.css">

    <title>Home</title>

      <script type="text/javascript">
          let isMobile = false; //initiate as false
          // device detection
          if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent)
              || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) {
              isMobile = true;
          }
          let element = document.getElementById('signinDiv');
          if (isMobile) {
              element.style.float = "left";
          }
          console.log("this code executed!");
      </script>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
  </head>
  <body>
  <script>
      console.log("THIS IS A TEST!!!!");
  </script>
  <div>
      <nav class="navbar navbar-expand-lg navbar-light bg-info">
          <a id="logo" class="navbar-brand" href="#">Goal Keeper</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.php">About <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
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
              <div id="signinDiv" class="float-right">
                  <ul class="navbar-nav mr-auto">
                      <div class="border-right border-right-dark" style="border-right: 1px">
                      <li class="nav-item active">
                          <a id="user" class="nav-link active">Hi, <?=$_SESSION['username']?>!</a>
                      </li>
                      </div>
                      <li class="nav-item">
                          <a class="nav-link" href="signin.php">Sign Out</a>
                      </li>
                  </ul>
              </div>
          </div>
     </nav>
  </div>
     </br>

      <div class="container text-center">
          <h1>
              Goal Keeper
          </h1>
      </div>

  <div class="row" style="padding:1em">
      <div class="container col-lg-2 col-md-4 col-sm-10" style="width:100%; padding:1em">
          <div class="card card-border border-dark text-center" style="height:25rem; overflow: hidden">
              <h5 class="card-title bg-primary text-white" style="padding: 1em">Daily Goals</h5>
              <div class="card-body">
                  <div class="text-center">
                      <ul class="list-group text-left" style="padding:2px">
                          <?php getGoals("daily", $id, $dbi); ?>
                      </ul>
                  </div>
              </div>
              <div class="card card-footer bg-white" style="padding-left:2em; padding-right:2em">
                  <a href="GoalTypes/DailyGoals.php" class="btn btn-primary">View Goals</a>
              </div>
          </div>
      </div>
      <div class="container col-lg-2 col-md-4 col-sm-10" style="width:100%; padding:1em">
          <div class="card card-border border-dark text-center" style="height:25rem; overflow: hidden">
              <h5 class="card-title bg-primary text-white" style="padding: 1em">Weekly Goals</h5>
              <div class="card-body">
                  <div class="text-center">
                      <ul class="list-group text-left" style="padding:2px">
                          <?php getGoals("weekly", $id, $dbi); ?>
                      </ul>
                  </div>
              </div>
              <div class="card card-footer bg-white" style="padding-left:2em; padding-right:2em">
                  <a href="GoalTypes/WeeklyGoals.php" class="btn btn-primary">View Goals</a>
              </div>
          </div>
      </div>

      <div class="container col-lg-2 col-md-4 col-sm-10" style="width:100%; padding:1em">
          <div class="card card-border border-dark text-center" style="height:25rem; overflow: hidden">
              <h5 class="card-title bg-primary text-white" style="padding: 1em">Monthly Goals</h5>
              <div class="card-body">
                  <div class="text-center">
                      <ul class="list-group text-left" style="padding:2px">
                          <?php getGoals("monthly", $id, $dbi); ?>
                      </ul>
                  </div>
              </div>
              <div class="card card-footer bg-white" style="padding-left:2em; padding-right:2em">
                  <a href="GoalTypes/MonthlyGoals.php" class="btn btn-primary">View Goals</a>
              </div>
          </div>
      </div>
      <div class="container col-lg-2 col-md-4 col-sm-10" style="width:100%; padding:1em">
          <div class="card card-border border-dark text-center" style="height:25rem; overflow: hidden">
              <h5 class="card-title bg-primary text-white" style="padding: 1em">Yearly Goals</h5>
              <div class="card-body">
                  <div class="text-center">
                      <ul class="list-group text-left" style="padding:2px">
                          <?php getGoals("yearly", $id, $dbi); ?>
                      </ul>
                  </div>
              </div>
              <div class="card card-footer bg-white" style="padding-left:2em; padding-right:2em">
                  <a href="GoalTypes/YearlyGoals.php" class="btn btn-primary">View Goals</a>
              </div>
          </div>
      </div>
      <div class="container col-lg-2 col-md-4 col-sm-10" style="width:100%; padding:1em">
          <div class="card card-border border-dark text-center" style="height:25rem; overflow: hidden">
              <h5 class="card-title bg-primary text-white" style="padding: 1em">All-Time Goals</h5>
              <div class="card-body">
                  <div class="text-center">
                      <ul class="list-group text-left" style="padding:2px">
                          <?php getGoals("alltime", $id, $dbi); ?>
                      </ul>
                  </div>
              </div>
              <div class="card card-footer bg-white" style="padding-left:2em; padding-right:2em">
                  <a href="GoalTypes/AllTimeGoals.php" class="btn btn-primary">View Goals</a>
              </div>
          </div>
      </div>
  </div>

  <div class="jumbotron" style="padding:2em">
      <div class="container col-lg-6 col-md-8 col-sm-8 border border-dark text-center bg-white" style="border-radius: 1em; border:3px; width: 100%">
          <div class="row text-center" style="padding: 1em">
              <div class="col-lg-6 text-center">
                  <h2 class="text text-dark" style="text-ul">View Goal Ratings:</h2>
              </div>
              <div class="col-lg-6 text-center">
                  <h3 class="text text-dark">Goal Type</h3>
                  <div class="dropdown">
                      <?php
                      $dropDownText = "Select Goal Type";
                      if (isset($_POST['goaltype'])) {
                          $dropDownText = $_POST['goaltype'];
                      } ?>
                      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <?=$dropDownText?>
                      </button>
                      <form action="index.php" method="post">
                          <div class="dropdown-menu" id="type" aria-labelledby="dropdownMenuButton">
                              <input type="submit" class="dropdown-item" name="goaltype" value="Daily"/>
                              <input type="submit" class="dropdown-item" name="goaltype"  value="Weekly"/>
                              <input type="submit" class="dropdown-item" name="goaltype"  value="Monthly"/>
                              <input type="submit" class="dropdown-item" name="goaltype"  value="Yearly"/>
                              <input type="submit" class="dropdown-item" name="goaltype"  value="Alltime"/>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
          </br>
          <div class="row text-center" style="padding: 3em; width: 100%; height:100%">
              <div class="col-lg-12 col-md-12 col-sm-10">
              <div id="graph" class="col col-12" style="width:100%">
                  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.js"></script>
                  <div id="tester" style="margin: 3em; width:100%;height:30%;">
                      <?php
                              $type = $_POST['goaltype'];

                              $sql = mysqli_prepare($dbi, "SELECT title, rating FROM goals_goals WHERE user_id='$id' AND goal_type='$type'");
                              mysqli_stmt_execute($sql);
                              mysqli_stmt_store_result($sql);
                              mysqli_stmt_bind_result($sql, $goal_title, $rating);

                              $titles = '';
                              $ratings = '';
                              $counterString = '';
                              $counterInt = 1;
                              while (mysqli_stmt_fetch($sql)) {
                                  if ($rating != null) {
                                      $titles .= ('\'' . $goal_title . '\',');
                                      $counterString .= $counterInt . ',';
                                      $ratings .= ($rating . ',');
                                      $counterInt++;
                                  }
                              }
                      ?>
                  <script type="text/javascript">
                  /*global Plotly*/ /* global TESTER*/

                      let data = [{
                          x: [<?=$titles?>], //x should be a range representing the number of goals being retrieved
                          y: [<?=$ratings?>],  //y should be the ratings of the goals themselves
                          type:'bar'
                      }];

                      let layout = {
                          xaxis: {title: 'Goals', showlegend: true},
                          yaxis: {title: 'Goal Ratings'},
                          barmode: 'relative',
                          title: 'Goal Ratings: <?=$type?>'
                      };

                  Plotly.newPlot('graph', data, layout);

                  </script>
              </div>
              </div>
          </div>
      </div>
  </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>