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
                    <th>Menu ID</th>
                    <th>Menu Name</th>
                    <th>Menu Order</th>
                    <th>Menu Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $select = "select * from tbl_menu";
                $res = $con->query($select);
                $i = 0;
                while ($data = $res->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?php echo $data['menuid'] ?></td>
                        <td><?php echo $data['name'] ?></td>
                        <td><?php echo $data['order'] ?></td>
                        <td><?php echo $data['status'] ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $data['menuid']?>" class="btn btn-warning"><i class="fa-solid fa-pen"></i></a>
                            <a href="../../model/Menu/action.php?id=<?php echo $data['menuid']?>&action=delete" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
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