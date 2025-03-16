<?php
include '../../connection/conect.php';
session_start();
$url = "../../view/Category/";

if (isset($_POST['insert'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $menuid = $_POST['menuid'];
    $des = $_POST['des'];
    $status = $_POST['status'];
    $filename = $_FILES['img']['name'];
    $filetmp = $_FILES['img']['tmp_name'];
    $filepath = '../../upload/Category/';
    $insert = "insert into tbl_cate values('$id' , '$name' , '$menuid' , '$des' , '$filename' , '$status')";
    $res = $con->query($insert);
    if ($res) {
        $_SESSION['msg'] = "Insert Succeed";
        $resimg = move_uploaded_file($filetmp, $filepath . $filename);
    }
    header('location: ' . $url . 'insert.php');
}

if (isset($_GET['action']) == "delete") {
    $id = $_GET['id'];
    $select = "select img from tbl_cate where cateid = '$id'";
    $result = $con->query($select);
    $data = $result->fetch_assoc();
    $filepath = "../../upload/Category/" . $data['img'];
    $delete = "delete from tbl_cate where cateid = '$id'";
    $res = $con->query($delete);
    if ($res) {
        $_SESSION['msg'] = "Delete Succeed";
        if (file_exists($filepath)) unlink($filepath);
    }
    header('location: ' . $url . 'index.php');
}

if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $menuid = $_POST['menuid'];
    $des = $_POST['des'];
    $status = $_POST['status'];
    $filename = $_FILES['img']['name'];
    $filetmp = $_FILES['img']['tmp_name'];
    $filepath = '../../upload/Category/';

    $filedel = '';
    if($filename != ''){
        $select = "select img from tbl_cate where cateid = $id";
        $result = $con->query($select);
        $data = $result->fetch_assoc();
        $filedel = $filepath . $data['img'];
        $update = "update tbl_cate set name = '$name' , menuid = '$menuid' , des = '$des' , img = '$filename' , status = '$status' where cateid = '$id'";
    }else{
        $update = "update tbl_cate set name = '$name' , menuid = '$menuid' , des = '$des' , status = '$status' where cateid = '$id'";
    }
    $res = $con->query($update);
    if ($res) {
        $_SESSION['msg'] = "Update Succeed";
        if (file_exists($filedel)) {
            unlink($filedel);
            $resimg = move_uploaded_file($filetmp, $filepath . $filename);
        }
    }
    header('location: ' . $url . 'index.php');
}
