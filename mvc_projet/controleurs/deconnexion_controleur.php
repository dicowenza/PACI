<?php
session_start();
$_SESSION["started"] = "false";
$_SESSION["user_ID"] = -1;

    header('Location: ../vues/test_index.php');
?>
