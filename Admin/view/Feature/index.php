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
                    <th>Feature ID</th>
                    <th>Feature Name</th>
                    <th>Feature Details</th>
                    <th>Feature Date</th>
                    <th>Feature Status</th>
                    <th>Feature Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $select = "select * from tbl_feature";
                $res = $con->query($select);
                $i = 0;
                while ($data = $res->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?php echo $data['featureid'] ?></td>
                        <td><?php echo $data['name'] ?></td>
                        <td><?php echo $data['detail'] ?></td>
                        <td><?php echo date('D d M Y H:i:s', strtotime($data['date'])) ?></td>
                        <td><?php echo $data['status'] ?></td>
                        <th>
                            <img src="../../upload/Feature/<?php echo $data['img'] ?>" alt="" style="width: 50px; height: 50px; object-fit: contain;">
                        </th>
                        <td style="width: 150px;">
                            <a href="edit.php?id=<?php echo $data['featureid'] ?>" class="btn btn-warning"><i class="fa-solid fa-pen"></i></a>
                            <a href="../../model/Feature/action.php?id=<?php echo $data['featureid'] ?>&action=delete" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
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