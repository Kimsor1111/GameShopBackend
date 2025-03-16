<?php
session_start();
include '../../connection/conect.php';

if (isset($_POST['signup'])) {
    $username = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $insert = "insert into tbl_user values('' , '$username' , '$email' , '$pass' , current_timestamp())";
    $result = $con->query($insert);
    if ($result) {
        $select = "select * from tbl_user where email = '$email' and password = '$pass'";
        $resultselect = $con->query($select);
        $data = $resultselect->fetch_assoc();
        $_SESSION['id'] = $data['id'];
        $_SESSION['name'] = $data['name'];
        header('location: ../../../index.php');
    }
}
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $select = "select * from tbl_user where email = '$email' and password = '$pass'";
    $result = $con->query($select);
    $data = $result->fetch_assoc();
    if ($data['email'] == $email && $data['password'] == $pass) {
        $_SESSION['id'] = $data['id'];
        $_SESSION['name'] = $data['name'];
        header('location: ../../../index.php');
    } else {
        $_SESSION['msg'] = "User not exist/Wrong email or password";
        header('location: ../../../login/index.php');
    }
}
