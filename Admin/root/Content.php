<?php include '../connection/conect.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .container {
        width: 100%;
        overflow-y: hidden;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        flex-wrap: wrap;
    }

    .item {
        width: 30%;
        height: 300px;
        margin-bottom: 50px;
        border-radius: 35px;
    }

    h1 {
        margin: 0;
        text-align: center;
        font-size: 55px;
        color: white;
        font-family: monospace;
        text-transform: uppercase;
    }

    p {
        color: white;
        font-size: 100px;
        margin: 0;
        text-align: center;
        margin-top: 50px;
    }
</style>
<?php
$item = array(
    array('color' => 'lime', 'name' => 'Carts', 'db' => 'cart'),
    array('color' => 'red', 'name' => 'Categories', 'db' => 'cate'),
    array('color' => 'green', 'name' => 'Features', 'db' => 'feature'),
    array('color' => 'gold', 'name' => 'Menus', 'db' => 'menu'),
    array('color' => 'blue', 'name' => 'Products', 'db' => 'prd'),
    array('color' => 'orange', 'name' => 'Users', 'db' => 'user')
);
?>

<body>
    <h1 style="color: black; margin-bottom: 50px;">Product Management</h1>
    <div class="container">
        <?php
        for ($i = 0; $i < count($item); $i++) {
            $select = "select count(*) as total from tbl_" . $item[$i]['db'];
            $result = $con->query($select);
            $data = $result->fetch_assoc();
        ?>
            <div class="item" style="background-color: <?php echo $item[$i]['color'] ?>;">
                <h1><?php echo $item[$i]['name'] ?></h1>
                <p><?php echo $data['total']?></p>
            </div>
        <?php
        }
        ?>
    </div>
</body>

</html>