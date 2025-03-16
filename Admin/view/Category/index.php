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
                    <th>Category ID</th>
                    <th>Category Name</th>
                    <th>Menu ID</th>
                    <th>Category Description</th>
                    <th>Category Status</th>
                    <th>Category Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $select = "select * from tbl_cate";
                $res = $con->query($select);
                $i = 0;
                while ($data = $res->fetch_assoc()) {
                    $menuid = $data['menuid'];
                    $selectmenu = "select name from tbl_menu where menuid = '$menuid'";
                    $resultmenu = $con->query($selectmenu);
                    $datamenu = $resultmenu->fetch_assoc();
                ?>
                    <tr>
                        <td><?php echo $data['cateid'] ?></td>
                        <td><?php echo $data['name'] ?></td>
                        <td><?php echo $datamenu['name'] ?></td>
                        <td><?php echo $data['des'] ?></td>
                        <td><?php echo $data['status'] ?></td>
                        <th>
                            <img src="../../upload/Category/<?php echo $data['img'] ?>" alt="" style="width: 50px; height: 50px; object-fit: contain;">
                        </th>
                        <td>
                            <a href="edit.php?id=<?php echo $data['cateid'] ?>" class="btn btn-warning"><i class="fa-solid fa-pen"></i></a>
                            <a href="../../model/Category/action.php?id=<?php echo $data['cateid'] ?>&action=delete" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
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