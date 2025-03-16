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
                    <th>Cart ID</th>
                    <th>User ID</th>
                    <th>Product ID</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $select = "select * from tbl_cart";
                $res = $con->query($select);
                $i = 0;
                while ($data = $res->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?php echo $data['cartid'] ?></td>
                        <td><?php echo $data['userid'] ?></td>
                        <td><?php echo $data['productid'] ?></td>
                        <td><?php echo $data['qty'] ?></td>
                        <td><?php echo $data['price'] ?></td>
                        <td><?php echo $data['date'] ?></td>
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