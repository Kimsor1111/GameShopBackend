<?php
include '../../connection/conect.php';
$cartid = $_GET['cartid'];
$prdid = $_GET['prdid'];
$delete = "delete from tbl_cart where cartid = '$cartid'";
$result = $con->query($delete);
if ($result) {
    header("location: ../../../detail.php?prdid=$prdid");
    exit();
}
?>