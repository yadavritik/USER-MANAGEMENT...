<?php
include 'db.php';

if(isset($_GET["id"])){
    $id=$_GET["id"];

    $sql=$conn->prepare("delete from employee where id=?");
    $sql->bind_param("i", $id);

    if($sql->execute()){
        header("Location: Home.php");
    }
}
?>