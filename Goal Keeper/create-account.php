<?php

    include("dbi.php");

    session_start();

    if (isset($_POST['create'])) {

        $email =$_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        $encryptedPassword = md5($password);

        $sql = mysqli_prepare($dbi, "SELECT id FROM goals_users WHERE username='$username' OR email='$email'");
        mysqli_stmt_execute($sql);
        mysqli_stmt_store_result($sql);

        if (mysqli_stmt_num_rows($sql) > 0) {
            header("Location:account.php");
            $_SESSION["duplicate"] = true;
        } else {
            $sql = mysqli_prepare($dbi, "INSERT INTO goals_users(username, password, email) VALUES ('$username', '$encryptedPassword', '$email')");
            mysqli_stmt_execute($sql);
            mysqli_stmt_close($sql);
            header("Location:signin.php");
        }
    }
?>
