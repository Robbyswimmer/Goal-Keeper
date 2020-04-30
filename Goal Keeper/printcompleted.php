<?php

session_start();

include("dbi.php");

$user_id = $_SESSION['id'];

//if (isset($_POST['delete'])) {
//    $id = $_POST['goal_id'];
//
//    $sql = mysqli_prepare($dbi, "DELETE FROM goals_goals WHERE id = ?");
//    mysqli_stmt_bind_param($sql, "i", $id);
//    mysqli_stmt_execute($sql);
//    mysqli_stmt_close($sql);
//
//    Header("Location: completed.php");
//}

?>

<?php


function printCompletedGoals($goalType, $user_id, $dbi) {

    $completed = 1;
    if (strcmp($goalType, "All") == 0) {
        $sql = mysqli_prepare($dbi, "SELECT id, user_id, title, description, goal_type, rating FROM goals_goals WHERE user_id='$user_id' AND completed='$completed'");
    } else {
        $sql = mysqli_prepare($dbi, "SELECT id, user_id, title, description, goal_type, rating FROM goals_goals WHERE user_id='$user_id' AND goal_type='$goalType' AND completed='$completed'");
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
                <form action="printcompleted.php" method="post">
                    <button type="submit" name="delete" class="btn btn-outline-danger">
                        Delete
                    </button>
                    <input type="hidden" name="goal_id" value=<? $goal_id ?>>
                </form>
            </td>
        </tr>
        <?php
    }
}

?>
