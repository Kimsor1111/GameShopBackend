<?php
include '../../connection/conect.php';
session_start();
$url = "../../view/Detail/";

if (isset($_POST['insert'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $detail = addslashes($_POST['detail']);
    $stock = $_POST['stock'];
    $cateid = $_POST['cateid'];
    $menuid = $_POST['menuid'];
    $dis = $_POST['discount'];
    $filename = $_FILES['img']['name'];
    $filetmp = $_FILES['img']['tmp_name'];
    $filepath = '../../upload/Detail/';
    $insert = "insert into tbl_prd values('$id' , '$name' , '$price' , '$detail' , '$stock' , '$cateid' , '$menuid' , '$dis' , current_timestamp() , '$filename')";
    $res = $con->query($insert);

    if ($res) {
        $_SESSION['msg'] = "Insert Succeed";
        $resimg = move_uploaded_file($filetmp, $filepath . $filename);
    }
    header('location: ' . $url . 'insert.php');
}

if (isset($_GET['action']) == "delete") {
    $id = $_GET['id'];
    $select = "select img from tbl_prd where productid = '$id'";
    $result = $con->query($select);
    $data = $result->fetch_assoc();
    $filepath = "../../upload/Detail/" . $data['img'];
    $delete = "delete from tbl_prd where productid = '$id'";
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
    $price = $_POST['price'];
    $detail = addslashes($_POST['detail']);
    $stock = $_POST['stock'];
    $cateid = $_POST['cateid'];
    $menuid = $_POST['menuid'];
    $dis = $_POST['discount'];
    $filename = $_FILES['img']['name'];
    $filetmp = $_FILES['img']['tmp_name'];
    $filepath = '../../upload/Detail/';

    $filedel = '';
    if ($filename != '') {
        $select = "select img from tbl_prd where productid = $id";
        $result = $con->query($select);
        $data = $result->fetch_assoc();
        $filedel = $filepath . $data['img'];
        $update = "update tbl_prd set name = '$name' , price = '$price' , des = '$detail' , stock = '$stock' , cateid = '$cateid' , menuid = '$menuid' , discount = '$dis' , img = '$filename' where productid = '$id'";
    }else{
        $update = "update tbl_prd set name = '$name' , price = '$price' , des = '$detail' , stock = '$stock' , cateid = '$cateid' , menuid = '$menuid' , discount = '$dis' where productid = '$id'";
    }
    $res = $con->query($update);
    if ($res) {
        $_SESSION['msg'] = "Update Succeed";
        if (file_exists($filedel)) {
            unlink($filedel);
        }
        $resimg = move_uploaded_file($filetmp, $filepath . $filename);
    }
    header('location: ' . $url . 'index.php');
}
