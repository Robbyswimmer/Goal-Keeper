<?php
    session_start();

    include("../dbi.php");
    //$goal_type = $_POST['goal_type'];

    $page = $_POST['page'];

    if (isset($_POST['submit'])) {

        $title = $_POST['title'];
        $description = $_POST['description'];
        $goal_type = $_POST['goal_type'];

        $type = strtolower($goal_type);

        $id = $_SESSION['id'];

        $sql = mysqli_prepare($dbi, "INSERT INTO goals_goals(user_id, title, description, goal_type) VALUES ('$id', '$title', '$description', '$type')") or die(mysqli_error($dbi));
        mysqli_stmt_execute($sql);
        mysqli_stmt_store_result($sql);

        mysqli_stmt_close($sql);

        header("Location:" . $page);
    }

    function printGoals($user_id, $dbi, $type, $page) {

        $sql = mysqli_prepare($dbi, "SELECT id, title, description, rating, completed FROM goals_goals WHERE user_id='$user_id' AND goal_type='$type'");
        mysqli_stmt_execute($sql);
        mysqli_stmt_store_result($sql);
        mysqli_stmt_bind_result($sql, $goal_id, $goal_title, $goal_desc, $rating, $completed);

        ?>
        <div class="container">
            <h1 class="text-center" style="margin-bottom: 1em">Current Goals:</h1>
        </div>
        <?php

        while (mysqli_stmt_fetch($sql)) {
            if ($completed != 1) {

                ?>
                <div class="col-lg-4 col-md-6 col-sm-12 text-center hvr-grow-shadow">
                    <div class="card border border-dark" style="height:26em; margin-bottom: 2em; overflow: hidden">
                        <div class="card-header bg-success text-white" style="height:5em">
                            <h4 class="card-title"><?= $goal_title ?></h4>
                        </div>
                        <div class="card-body" style="height:9em; width=100%">
                            <div style="overflow: hidden">
                                <p class="card-text" style="overflow: hidden; font-size: 20px"><?= $goal_desc ?></p>
                            </div>
                        </div>
                        <div class="card-footer bg-white">
                            <div>
                                <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:1em">
                                    <form action="updategoals.php" method="post" style="margin-bottom: 3px">
                                        <input type="hidden" name="page" value=<?=$page?>>
                                        <button type="submit" name="complete" class="btn btn-outline-success btn-block">
                                            Complete
                                        </button>
                                        <input type="hidden" name="goal_id" value="<? $goal_id ?>"
                                        <input type="hidden" name="goal_type" value="<?=$type ?>"
                                    </form>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:1em">
                                    <button type="button" class="btn btn-outline-primary btn-block" data-toggle="modal"
                                            data-target="#modalData<?= $goal_id; ?>">View
                                    </button>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:1em; margin-bottom: 1em">
                                    <form action="updategoals.php" method="post">
                                        <input type="hidden" name="page" value=<?=$page?>>
                                        <button type="submit" name="delete" class="btn btn-outline-danger btn-block">
                                            Delete
                                        </button>
                                        <input type="hidden" name="goal_id" value="<? $goal_id ?>"
                                        <input type="hidden" name="goal_type" value="<?=$type ?>"
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="modalData<?= $goal_id; ?>" tabindex="-1" role="dialog"
                     aria-labelledby="modalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle"><?= $goal_title ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="updategoals.php" method="post">
                                <div class="modal-body">
                                    <textarea class="form-control border border-0" id="desc" name="desc" style="height:20em" style="resize: none"><?=$goal_desc?>
                                    </textarea>
                                    <input type="hidden" name="goal_id" value="<?= $goal_id ?>">
                                    <input type="hidden" name="page" value=<?=$page?>>
                                </div>
                                <div class="modal-footer">

                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="rating<?=$goal_id?>" value="<?=$rating?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <?php
                                                if (strcmp($rating, "") == 0 || strcmp($rating, null) == 0) {
                                                    $rating = "Rate Goal";
                                                }
                                            ?>
                                            <?=$rating?>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="rating">
                                            <input name="rating" class="dropdown-item" type="submit" value="1">
                                            <input name="rating" class="dropdown-item" type="submit" value="2">
                                            <input name="rating" class="dropdown-item" type="submit" value="3">
                                            <input name="rating" class="dropdown-item" type="submit" value="4">
                                            <input name="rating" class="dropdown-item" type="submit" value="5">
                                            <input name="rating" class="dropdown-item" type="submit" value="6">
                                            <input name="rating" class="dropdown-item" type="submit" value="7">
                                            <input name="rating" class="dropdown-item" type="submit" value="8">
                                            <input name="rating" class="dropdown-item" type="submit" value="9">
                                            <input name="rating" class="dropdown-item" type="submit" value="10">
                                        </div>
                                    </div>

                                    <button type="submit" id="save" name="save" class="btn btn-success">Save changes</button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
    }
?>

<link rel="stylesheet" href="../style.css">

