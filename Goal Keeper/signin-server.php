<?php

    include("dbi.php");

    session_start();
    $error = "username or password is incorrect.";

    if (isset($_POST['signin'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $encryptedPassword = md5($password);

        $sql = mysqli_prepare($dbi, "SELECT id FROM goals_users WHERE password='$encryptedPassword' AND username='$username'");
        mysqli_stmt_execute($sql);
        mysqli_stmt_store_result($sql);

        if (mysqli_stmt_num_rows($sql) == 0) {
            header("Location:signin.php");
            $_SESSION["error"] = $error;
            print("<p>Incorrect username or password.</p>");
        } else {
            $_SESSION["username"] = $username;
            $result = mysqli_query($dbi, "SELECT id FROM goals_users WHERE password='$encryptedPassword' AND username='$username'");
            $_SESSION["id"] = mysqli_fetch_row($result)[0];
            mysqli_stmt_close($sql);
            header("Location:index.php");
        }
    }
?>