<?php
include '../../connection/conect.php';
session_start();
$url = "../../view/Feature/";

if (isset($_POST['insert'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $detail = $_POST['detail'];
    $date = $_POST['date'];
    $status = $_POST['status'];
    $filename = $_FILES['img']['name'];
    $filetmp = $_FILES['img']['tmp_name'];
    $filepath = '../../upload/Feature/';
    $insert = "insert into tbl_feature values('$id' , '$name' , '$detail' , '$date' , '$filename' , '$status')";
    $res = $con->query($insert);

    if ($res) {
        $_SESSION['msg'] = "Insert Succeed";
        $resimg = move_uploaded_file($filetmp , $filepath . $filename);
    }
    header('location: ' . $url . 'insert.php');
}

if (isset($_GET['action']) == "delete") {
    $id = $_GET['id'];
    $select = "select img from tbl_feature where featureid = '$id'";
    $result = $con->query($select);
    $data = $result->fetch_assoc();
    $filepath = "../../upload/Feature/" . $data['img'];
    $delete = "delete from tbl_feature where featureid = '$id'";
    $res = $con->query($delete);
    if ($res) {
        $_SESSION['msg'] = "Delete Succeed";
        if(file_exists($filepath)) unlink($filepath);
    }
    header('location: ' . $url . 'index.php');
}

if(isset($_POST['edit'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $detail = $_POST['detail'];
    $date = $_POST['date'];
    $status = $_POST['status'];
    $filename = $_FILES['img']['name'];
    $filetmp = $_FILES['img']['tmp_name'];
    $filepath = '../../upload/Feature/';

    $filedel = '';
    if($filename != ''){
        $select = "select img from tbl_feature where featureid = $id";
        $result = $con->query($select);
        $data = $result->fetch_assoc();
        $filedel = $filepath . $data['img'];
        $update = "update tbl_feature set name = '$name' , detail = '$detail' , date = '$date' , img = '$filename' , status = '$status' where featureid = '$id'";
    }else{
        $update = "update tbl_feature set name = '$name' , detail = '$detail' , date = '$date' , status = '$status' where featureid = '$id'";
    }
    $res = $con->query($update);
    if ($res) {
        $_SESSION['msg'] = "Update Succeed";
        if (file_exists($filedel)) {
            unlink($filedel);
        }
        $resimg = move_uploaded_file($filetmp , $filepath . $filename);
    }
    header('location: ' . $url . 'index.php');
}
?>