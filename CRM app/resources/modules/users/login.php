<?php

$conn = new mysqli("localhost", "root", "", "group_a");

if(isset($_POST['email']) && isset($_POST['password']) && !empty($_POST['password']) && !empty($_POST['email'])) {

    $query = "SELECT count(*) as calc FROM `users` WHERE email='$_POST[email]' && password='$_POST[password]'";
    $stmt=$conn->prepare($query);
    $stmt->execute();
    $result=$stmt->get_result();
    $row=$result->fetch_assoc();

        if($row['calc']>0) {
            session_start();

            $_SESSION['email'] = $_POST['email'];
            $_SESSION['password'] = $_POST['password'];
            $_SESSION['timelog'] = time();
            header('location: member.php');

        } else {
            echo 'email and password Wrong';
        }

} else {

    echo 'email and password Wrong';

}