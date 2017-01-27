<?php
session_start();
$_SESSION["started"] = "false";

    header('Location: index.php');
?>
