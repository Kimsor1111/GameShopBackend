<?php
include "../../root/Header.php";
include "../../connection/conect.php";
session_start();
?>
<title>Document</title>
</head>

<body>
    <div class="container-fluid">
        <table id="example" class="table table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Date Create</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $select = "select * from tbl_user";
                $res = $con->query($select);
                $i = 0;
                while ($data = $res->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?php echo $data['id'] ?></td>
                        <td><?php echo $data['name'] ?></td>
                        <td><?php echo $data['email'] ?></td>
                        <td><?php echo $data['password'] ?></td>
                        <td><?php echo date('D d M Y H:i:s', strtotime($data['date'])) ?></td>
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