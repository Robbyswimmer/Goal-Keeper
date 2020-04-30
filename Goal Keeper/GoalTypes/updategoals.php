<?php

    include("../dbi.php");

    $goal_type = $_POST['goal_type'];
    $page = $_POST['page'];

    if (isset($_POST['rating'])) {
        $id = $_POST['goal_id'];
        $rating = $_POST['rating'];

        $sql = mysqli_prepare($dbi, "UPDATE goals_goals SET rating = ? WHERE id = ?");
        mysqli_stmt_bind_param($sql, "ii", $rating, $id);
        mysqli_stmt_execute($sql);
        mysqli_stmt_close($sql);
    }

    if (isset($_POST['save'])) {
        $description = $_POST['desc'];
        $id = $_POST['goal_id'];

        $sql = mysqli_prepare($dbi, "UPDATE goals_goals SET description = ? WHERE id = ?");
        mysqli_stmt_bind_param($sql, "si", $description, $id);
        mysqli_stmt_execute($sql);
        mysqli_stmt_close($sql);

    }

    if (isset($_POST['delete'])) {
        $id = $_POST['goal_id'];

        $sql = mysqli_prepare($dbi, "DELETE FROM goals_goals WHERE id = ?");
        mysqli_stmt_bind_param($sql, "i", $id);
        mysqli_stmt_execute($sql);
        mysqli_stmt_close($sql);
    }

    if (isset($_POST['complete'])) {
        $id = $_POST['goal_id'];
        $complete = 1;

        $sql = mysqli_prepare($dbi, "UPDATE goals_goals SET completed = ? WHERE id = ?");
        mysqli_stmt_bind_param($sql, "ii", $complete, $id);
        mysqli_stmt_execute($sql);
        mysqli_stmt_close($sql);
    }

    header("Location:" . $page);

?>
