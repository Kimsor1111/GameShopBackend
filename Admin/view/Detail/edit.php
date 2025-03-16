<?php
include '../../root/Header.php';
include '../../connection/conect.php';
if (isset($_GET['id']) != '') {
    $id = $_GET['id'];
    $select = "select * from tbl_prd where productid = $id";
    $res = $con->query($select);
    $datadisplay = $res->fetch_assoc();
}
?>
<title>Document</title>
</head>
<style>
    .noresize {
        resize: none;
    }
</style>

<body>
    <div class="container-fluid">
        <form action="../../model/Detail/action.php" method="post" enctype="multipart/form-data">
            <div class="row bg-secondary">
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
                <div class="col-12">
                    <a href="index.php" target="content" class="btn btn-danger"><i class="mx-2 fa-solid fa-arrow-left"></i>Exit</a>
                    <button class="btn btn-success m-2" type="submit" name="edit"><i class="mx-2 fa-solid fa-floppy-disk"></i>Edit</button>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-4 mb-2">
                    <label>Product ID(ID Can't Edit): </label>
                    <input type="hidden" class="form-control border border-black" name="id" value="<?php echo $datadisplay['productid'] ?>">
                    <input type="number" class="form-control border border-black" disabled value="<?php echo $datadisplay['productid'] ?>">
                </div>
                <div class="col-4 mb-2">
                    <label>Product Name: </label>
                    <input type="text" class="form-control border border-black" required name="name" value="<?php echo $datadisplay['name'] ?>">
                </div>
                <div class="col-4 mb-2">
                    <label>Product Price: </label>
                    <input type="number" class="form-control border border-black" required name="price" value="<?php echo $datadisplay['price'] ?>" step="0.01">
                </div>
                <div class="col-12 mb-2">
                    <label>Product Details: </label>
                    <textarea name="detail" class="border border-black form-control noresize" required rows="10"><?php echo $datadisplay['des'] ?></textarea>
                </div>
                <div class="col-6 mb-2">
                    <label>Product Stock: </label>
                    <input type="number" name="stock" class="border border-black form-control" value="<?php echo $datadisplay['stock'] ?>" required>
                </div>
                <div class="col-6 mb-2">
                    <label>Product Category: </label>
                    <select name="cateid" class="border border-black form-select text-capitalize" required>
                        <option value="" disabled selected>Select Category</option>
                        <?php
                        $select = "select cateid , name from tbl_cate where status = 'Active' order by cateid asc";
                        $result = $con->query($select);
                        while ($data = $result->fetch_assoc()) {
                        ?>
                            <option class="text-capitalize" value="<?php echo $data['cateid'] ?>" <?php if ($datadisplay['cateid'] == $data['cateid']) echo "selected" ?>><?php echo $data['name'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="col-6 mb-2">
                    <label>Product Menu: </label>
                    <select name="menuid" class="border border-black form-select text-capitalize" required>
                        <option value="" disabled selected>Select Menu</option>
                        <?php
                        $select = "select menuid , name from tbl_menu where status = 'Active' order by `order` asc limit 3";
                        $result = $con->query($select);
                        while ($data = $result->fetch_assoc()) {
                            ?>
                            <option class="text-capitalize" value="<?php echo $data['menuid']?>" <?php if ($datadisplay['menuid'] == $data['menuid']) echo "selected" ?>><?php echo $data['name']?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="col-6 mb-2">
                    <label>Product Discount: </label>
                    <input type="number" name="discount" class="border border-black form-control" value="<?php echo $datadisplay['discount']?>" step="0.01" required>
                </div>
                <div class="col-6 mb-5">
                    <input type="file" class="img form-control border border-black" name="img" style="width: 100%;height: 400px; position: absolute; z-index: 1; opacity: 0;">
                    <img class="preview" src="../../upload/Detail/<?php echo $datadisplay['img'] ?>" style="width: 100%; height: 400px; object-fit: contain;">
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