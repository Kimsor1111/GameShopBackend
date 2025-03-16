<?php
include '../../root/Header.php';
include '../../connection/conect.php';
if (isset($_GET['id']) != '') {
    $id = $_GET['id'];
    $select = "select * from tbl_menu where menuid = '$id'";
    $res = $con->query($select);
    $data = $res->fetch_assoc();
}
?>
<title>Document</title>
</head>

<body>
    <div class="container-fluid">
        <form action="../../model/Menu/action.php" method="post">
            <div class="row bg-secondary">
                <div class="col-12">
                    <a href="index.php" target="content" class="btn btn-danger"><i class="mx-2 fa-solid fa-arrow-left"></i>Exit</a>
                    <button class="btn btn-success m-2" type="submit" name="edit"><i class="mx-2 fa-solid fa-floppy-disk"></i>EDIT</button>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-4 mb-2">
                    <label>Menu ID(ID Can't Edit): </label>
                    <input type="hidden" class="form-control border border-black" name="id" value="<?php echo $data['menuid']?>">
                    <input type="number" class="form-control border border-black" disabled value="<?php echo $data['menuid']?>">
                </div>
                <div class="col-4 mb-2">
                    <label>Menu Name: </label>
                    <input type="text" class="form-control border border-black" required name="name" value="<?php echo $data['name']?>">
                </div>
                <div class="col-4 mb-2">
                    <label>Menu Order: </label>
                    <input type="number" class="form-control border border-black" required name="order" value="<?php echo $data['order']?>">
                </div>
                <div class="col-4 mb-2">
                    <label>Category Status: </label>
                    <select name="status" class="form-select border border-black" required>
                        <option selected disabled>Select Status</option>
                        <option value="Active" <?php if($data['status'] == "Active") echo 'selected'?>>Active</option>
                        <option value="Inactive" <?php if($data['status'] == "Inactive") echo 'selected'?>>Inactive</option>
                    </select>
                </div>
            </div>
        </form>
    </div>
</body>

</html>