<?php
include '../../connection/conect.php';
session_start();
$url = "../../view/Menu/";

if (isset($_POST['insert'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $order = $_POST['order'];
    $status = $_POST['status'];
    $insert = "insert into tbl_menu values('$id' , '$name' , '$order' , '$status')";
    $res = $con->query($insert);
    if ($res) {
        $_SESSION['msg'] = "Insert Succeed";
    }
    header('location: ' . $url . 'insert.php');
}

if (isset($_GET['action']) == "delete") {
    $id = $_GET['id'];
    $delete = "delete from tbl_menu where menuid = '$id'";
    $res = $con->query($delete);
    if ($res) {
        $_SESSION['msg'] = "Delete Succeed";
    }
    header('location: ' . $url . 'index.php');
}

if(isset($_POST['edit'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $order = $_POST['order'];
    $status = $_POST['status'];
    $update = "update tbl_menu set name = '$name' , `order` = '$order' , status = '$status' where menuid = '$id'";
    $res = $con->query($update);
    if ($res) {
        $_SESSION['msg'] = "Update Succeed";
    }
    header('location: ' . $url . 'index.php');
}
?>