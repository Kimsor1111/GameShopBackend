<?php
include '../../root/Header.php';
include '../../connection/conect.php';
if (isset($_GET['id']) != '') {
    $id = $_GET['id'];
    $select = "select * from tbl_cate where cateid = '$id'";
    $res = $con->query($select);
    $data = $res->fetch_assoc();
}
?>
<title>Document</title>
</head>

<body>
    <div class="container-fluid">
        <form action="../../model/Category/action.php" method="post" enctype="multipart/form-data">
            <div class="row bg-secondary">
                <div class="col-12">
                    <a href="index.php" target="content" class="btn btn-danger"><i class="mx-2 fa-solid fa-arrow-left"></i>Exit</a>
                    <button class="btn btn-success m-2" type="submit" name="edit"><i class="mx-2 fa-solid fa-floppy-disk"></i>EDIT</button>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-6 mb-2">
                    <label>Category ID(ID Can't Edit): </label>
                    <input type="hidden" class="form-control border border-black" name="id" value="<?php echo $data['cateid']?>">
                    <input type="number" class="form-control border border-black" disabled value="<?php echo $data['cateid']?>">
                </div>
                <div class="col-6 mb-2">
                    <label>Category Name: </label>
                    <input type="text" class="form-control border border-black" required name="name" value="<?php echo $data['name']?>">
                </div>
                <div class="col-6 mb-2">
                    <label>Menu: </label>
                    <select name="menuid" class="form-select border border-black" required>
                        <option value="" selected disabled>Select Status</option>
                        <?php
                        $selectmenu = "select * from tbl_menu where status = 'Active' order by `order` asc limit 3";
                        $resultmenu = $con->query($selectmenu);
                        while ($datamenu = $resultmenu->fetch_assoc()) {
                        ?>
                        <option value="<?php echo $datamenu['menuid']?>" <?php if($data['menuid'] == $datamenu['menuid']) echo 'selected'?>><?php echo $datamenu['name']?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="col-6 mb-2">
                    <label>Category Status: </label>
                    <select name="status" class="form-select border border-black" required>
                        <option selected disabled>Select Status</option>
                        <option value="Active" <?php if($data['status'] == "Active") echo 'selected'?>>Active</option>
                        <option value="Inactive" <?php if($data['status'] == "Inactive") echo 'selected'?>>Inactive</option>
                    </select>
                </div>
                <div class="col-12 mb-2">
                    <label>Category Description: </label>
                    <textarea class="noresize border border-black form-control" name="des" rows="10" required><?php echo $data['des']?></textarea>
                </div>
                <div class="col-6 mb-5">
                    <input type="file" class="img form-control border border-black" name="img" style="width: 100%;height: 400px; position: absolute; z-index: 1; opacity: 0;">
                    <img class="preview" src="../../upload/Category/<?php echo $data['img']?>" style="width: 100%; height: 400px; object-fit: contain;">
                </div>
            </div>
        </form>
    </div>
</body>
<script>
    let fileinput = document.querySelector('.img')
    let img = document.querySelector('.preview')
    fileinput.addEventListener('change', function() {
        let file = this.files[0]
        let reader = new FileReader()
        reader.addEventListener('load', function() {
            img.src = reader.result
        })
        reader.readAsDataURL(file)
    })
</script>
</html>