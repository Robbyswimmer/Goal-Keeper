<?php

session_start();


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>About Goal Keeper</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-info">
      <a id="logo" class="navbar-brand" href="#">Goal Keeper</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                  <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item active">
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
     
     </br>
     <div class="container col-sm-2"></div>
     <div class="container col-lg-8 col-md-10 col-sm-8" style="width:85%">
         <div class="row align-middle">
             
             <h2 class="text text-dark">About Us</h2>
             <p>
                 Goal Keeper is service that allows people to keep track of all of their goals in a unique, user-oriented, frictionless way.
                 It was created to serve people who love to write goals, but have a hard time keeping track of them.
                 We all know that person who keeps track of all of their goals in a word document. There is nothing wrong with this,
                 but at Goal Keeper we believe there is a better way. This website can take all of your goals, and then you can login to check on
                 your goals, rate your goals, get rid of them, or even edit them to modify to reflect new goals that you might have. Once you accomplish
                 a goal you can mark it as completed and it will show up along with all of the other goals you have completed. This gives you
                 a great way to see how much progress you’ve made towards your goals, and what kind of things you need to work on to get even better!
                 Many people don’t realize how important goals can be, but if you want to do anything big or important it is necessary to identify all of
                 the steps you need to take to get there. Don’t try and achieve your goals on your own! Use Goal Keeper, and become the ‘better-you’ that you
                 have always wanted to be.
                 </br></br>
             </p>
             
             </br>
             
             <h2 class="text text-dark">How to use Goal Keeper</h2>
             <p>
                 The first thing you need to do is create an account. When you go to the main sign-in page click the button that says ‘create account’ and you are only three steps away from having your own Goal Keeper account! Fill in the email, username, and password fields with things that are easy for you to remember, but hard for other people to guess and you are set. Once this is done, go back to the sign-in page and enter your new username and password and then click the button that says ‘sign-in’. Once you are signed in you will be brought to the main home page where all of the goal keeping magic happens.
                 </br></br>
                 This page is where you will find a general summary of your current goals. 3 goals from each type of goal–daily, weekly, monthly, yearly, and all-time–will be displayed here to give you a general sense of the goals you have made for each category. At this point your goals should be empty. Below these cards you will see an area where you can view your personal goal ratings. As you create goals and give them ratings, this area will show what you rated each of the goals that you have completed so far. To add goals simply go to the navbar at the top of the screen and click on ‘Goals’. When you click on ‘Goals’ a dropdown menu will appear with the types of goals that you can view. Select one of them and you will be brought to the page for that goal.
                 </br></br>
                 Once you are at a goal page simply enter a goal title and a goal description then click ‘Add Goal’ and the goal will appear on that page. To make changes to the goal or rate the goal, click on view. To delete the goal just click on ‘delete’. Finally, when you have achieved that goal, click on the button that says completed and that goal will disappear and move to the completed page. If you go back to the top of the page and select the ‘Completed’ button on the navbar you can now view the goal that you completed and some extra information about that goal to help you remember what it was like and how you did.
                 </br></br>
                 <b>Great job! You have now learned how to use Goal Keeper! Get out there and make some goals for yourself!</b>
                 </br></br>
             </p>
         </div>
     </div>
  <div class="container col-sm-2"></div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>