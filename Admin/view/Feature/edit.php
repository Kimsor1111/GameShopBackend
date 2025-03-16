<?php
include '../../root/Header.php';
include '../../connection/conect.php';
if (isset($_GET['id']) != '') {
    $id = $_GET['id'];
    $select = "select * from tbl_feature where featureid = $id";
    $res = $con->query($select);
    $data = $res->fetch_assoc();
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
        <form action="../../model/Feature/action.php" method="post" enctype="multipart/form-data">
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
                    <label>Feature ID(ID Can't Edit): </label>
                    <input type="hidden" class="form-control border border-black" name="id" value="<?php echo $data['featureid']?>">
                    <input type="number" disabled class="form-control border border-black" value="<?php echo $data['featureid']?>">
                </div>
                <div class="col-4 mb-2">
                    <label>Feature Name: </label>
                    <input type="text" class="form-control border border-black" required name="name" value="<?php echo $data['name']?>">
                </div>
                <div class="col-4 mb-2">
                    <label>Feature Status: </label>
                    <select name="status" class="form-select border border-black" required>
                        <option disabled selected>Select Status</option>
                        <option value="Active" <?php if($data['status'] == "Active") echo 'selected'?>>Active</option>
                        <option value="Inactive" <?php if($data['status'] == "Inactive") echo 'selected'?>>Inactive</option>
                    </select>
                </div>
                <div class="col-6 mb-2">
                    <label>Feature Details: </label>
                    <textarea name="detail" class="border border-black form-control noresize" required rows="10"><?php echo $data['detail']?></textarea>
                </div>
                <div class="col-6 mb-2">
                    <label>Feature Date: </label>
                    <input type="datetime-local" name="date" value="<?php echo $data['date']?>" class="border border-black form-control">
                </div>
                <div class="col-6 mb-5">
                    <input type="file" class="img form-control border border-black" name="img" style="width: 100%;height: 400px; position: absolute; z-index: 1; opacity: 0;">
                    <img class="preview" src="../../upload/Feature/<?php echo $data['img']?>" style="width: 100%; height: 400px; object-fit: contain;">
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