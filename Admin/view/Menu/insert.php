<?php
    include '../../root/Header.php';
    session_start();
?>
    <title>Document</title>
</head>
<body>
    <div class="container-fluid">
        <form action="../../model/Menu/action.php" method="post">
            <div class="row bg-secondary">
                <div class="col-12">
                    <?php
                        if(isset($_SESSION['msg'])!= ''){
                            ?>
                            <div class="alert alert-success mt-2" role="alert"><?php echo $_SESSION['msg']?></div>
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
                    <label>Menu ID: </label>
                    <input type="number" class="form-control border border-black" required name="id">
                </div>
                <div class="col-4 mb-2">
                    <label>Menu Name: </label>
                    <input type="text" class="form-control border border-black" required name="name">
                </div>
                <div class="col-4 mb-2">
                    <label>Menu Order: </label>
                    <input type="number" class="form-control border border-black" required name="order">
                </div>
                <div class="col-4 mb-2">
                    <label>Menu Status: </label>
                    <select name="status" class="form-select border border-black" required>
                        <option value="" selected disabled>Select Status</option>
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                </div>
            </div>
        </form>
    </div>
</body>
</html>