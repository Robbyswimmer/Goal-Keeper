<?php
include("./dbi.php");

$sql = mysqli_prepare($dbi, "SELECT id, username FROM goals_users");
mysqli_stmt_execute($sql);
mysqli_stmt_store_result($sql);
mysqli_stmt_bind_result($sql, $id, $username);

while (mysqli_stmt_fetch($sql)){
    echo("Id: $id Username: $username<br>\n");
}