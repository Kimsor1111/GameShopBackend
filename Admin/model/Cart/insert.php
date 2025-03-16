<?php
include '../../connection/conect.php';
$userid = $_GET['userid'];
$prdid = $_GET['prdid'];
$qty = $_GET['qty'];
$selectprice = "select price , discount from tbl_prd where productid = '$prdid'";
$resultprice = $con->query($selectprice);
$dataprice = $resultprice->fetch_assoc();
if($dataprice['discount'] > 0.0) $price = number_format($dataprice['price'] * (100 - $dataprice['discount']) / 100 , 2);
else $price = $dataprice['price'];
$insert = "insert into tbl_cart values('' , '$userid' , '$prdid' , '$qty' , '$price' , current_timestamp())";
$result = $con->query($insert);
if($result){
    header("location: ../../../detail.php?prdid=$prdid");
    exit();
}
?>