<?php
session_start();
include 'db.php';

SESSION_destroy();
header("Location: Login.php");
?>