<?php
include "../../root/Header.php";
include "../../connection/conect.php";
session_start();
?>
<title>Document</title>
</head>


<body>
    <div class="container-fluid bg-secondary p-2">
        <div class="row">
            <div class="col-12">
                <?php
                if (isset($_SESSION['msg']) != '') {
                ?>
                    <div class="alert alert-success mt-2" role="alert"><?php echo $_SESSION['msg'] ?></div>
                <?php
                }
                session_unset();
                ?>
            </div>
        </div>
        <a href="insert.php" class="btn btn-success text-white" target="content">INSERT</a>
    </div>
    <div class="container-fluid">
        <table id="example" class="table table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Stock</th>
                    <th>Category</th>
                    <th>Menu</th>
                    <th>Discount</th>
                    <th>Date</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $select = "select * from tbl_prd";
                $res = $con->query($select);
                $i = 0;
                while ($data = $res->fetch_assoc()) {
                    $cate = $data['cateid'];
                    $menu = $data['menuid'];
                    $selectcate = "select name from tbl_cate where cateid = '$cate'";
                    $resultcate = $con->query($selectcate);
                    $datacate = $resultcate->fetch_assoc();

                    $selectmenu = "select name from tbl_menu where menuid = '$menu'";
                    $resultmenu = $con->query($selectmenu);
                    $datamenu = $resultmenu->fetch_assoc();
                ?>
                    <tr>
                        <td><?php echo $data['productid'] ?></td>
                        <td><?php echo $data['name'] ?></td>
                        <td><?php echo $data['price'] ?></td>
                        <td><?php echo $data['des'] ?></td>
                        <td><?php echo $data['stock'] ?></td>
                        <td class="text-capitalize"><?php echo $datacate['name'] ?></td>
                        <td class="text-capitalize"><?php echo $datamenu['name'] ?></td>
                        <td><?php echo $data['discount'] ?></td>
                        <td><?php echo date('D d M Y H:i:s', strtotime($data['date']))?></td>
                        <th>
                            <img src="../../upload/Detail/<?php echo $data['img'] ?>" alt="" style="width: 50px; height: 50px; object-fit: contain;">
                        </th>
                        <td style="width: 150px;">
                            <a href="edit.php?id=<?php echo $data['productid'] ?>" class="btn btn-warning"><i class="fa-solid fa-pen"></i></a>
                            <a href="../../model/Detail/action.php?id=<?php echo $data['productid'] ?>&action=delete" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                <?php
                }
                ?>

            </tbody>
        </table>
    </div>
</body>
<?php
include '../../root/DataTable.php';
?>

</html>