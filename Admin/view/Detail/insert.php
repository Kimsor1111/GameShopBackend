<?php
include '../../root/Header.php';
include '../../connection/conect.php';
session_start();
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
                    <button class="btn btn-success m-2" type="submit" name="insert"><i class="mx-2 fa-solid fa-floppy-disk"></i>INSERT</button>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-4 mb-2">
                    <label>Product ID: </label>
                    <input type="number" class="form-control border border-black" name="id">
                </div>
                <div class="col-4 mb-2">
                    <label>Product Name: </label>
                    <input type="text" class="form-control border border-black" required name="name">
                </div>
                <div class="col-4 mb-2">
                    <label>Product Price: </label>
                    <input type="number" class="form-control border border-black" required name="price" step="0.01">
                </div>
                <div class="col-12 mb-2">
                    <label>Product Details: </label>
                    <textarea name="detail" class="border border-black form-control noresize" required rows="10"></textarea>
                </div>
                <div class="col-6 mb-2">
                    <label>Product Stock: </label>
                    <input type="number" name="stock" class="border border-black form-control" required>
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
                            <option value="<?php echo $data['cateid']?>" class="text-capitalize"><?php echo $data['name']?></option>
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
                            <option value="<?php echo $data['menuid']?>" class="text-capitalize"><?php echo $data['name']?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="col-6 mb-2">
                    <label>Product Discount: </label>
                    <input type="number" name="discount" class="border border-black form-control" required step="0.01">
                </div>
                <div class="col-4 mb-5">
                    <input type="file" class="img form-control border border-black" required name="img" style="width: 100%;height: 400px; position: absolute; z-index: 1; opacity: 0;">
                    <img class="preview" src="https://w7.pngwing.com/pngs/469/94/png-transparent-camera-logo-graphy-camera-text-camera-lens-rectangle-thumbnail.png" style="width: 100%; height: 400px; object-fit: contain;">
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