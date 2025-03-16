<?php
session_start();
include 'Admin/connection/conect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Shop</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style/vendor.css">
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&family=Open+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
</head>

<body style="overflow-x: hidden;">
    <div class="preloader-wrapper">
        <div class="preloader">
        </div>
    </div>
    <!-- menu -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar">
        <div class="offcanvas-header justify-content-between">
            <h4 class="fw-normal text-uppercase fs-6 mt-3">More About Us</h4>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-end menu-list list-unstyled d-flex gap-md-3 mb-0">
                <li class="nav-item border-dashed">
                    <button
                        class="btn btn-toggle dropdown-toggle position-relative w-100 d-flex justify-content-between align-items-center text-dark p-2"
                        data-bs-toggle="collapse" data-bs-target="#menu-collapse" aria-expanded="false">
                        <div class="d-flex gap-3">
                            <span class="text-uppercase">Menus</span>
                        </div>
                    </button>
                    <div class="collapse" id="menu-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal ps-5 pb-1">
                            <?php
                            $select = "select * from tbl_menu where status = 'Active' order by `order` asc limit 3";
                            $result = $con->query($select);
                            while ($data = $result->fetch_assoc()) {
                            ?>
                                <li class="border-bottom py-2"><a href="menu.php?menuid=<?php echo $data['menuid'] ?>" class="dropdown-item text-uppercase"><?php echo $data['name'] ?></a></li>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                </li>
                <li class="nav-item border-dashed">
                    <button
                        class="btn btn-toggle dropdown-toggle position-relative w-100 d-flex justify-content-between align-items-center text-dark p-2"
                        data-bs-toggle="collapse" data-bs-target="#cate-collapse" aria-expanded="false">
                        <div class="d-flex gap-3">
                            <span class="text-uppercase">Categories</span>
                        </div>
                    </button>
                    <div class="collapse" id="cate-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal ps-5 pb-1">
                            <?php
                            $select = "select * from tbl_cate where status = 'Active' order by `cateid` asc";
                            $result = $con->query($select);
                            while ($data = $result->fetch_assoc()) {
                            ?>
                                <li class="border-bottom py-2"><a class="dropdown-item text-uppercase"><?php echo $data['name'] ?></a></li>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                </li>
                <?php
                $select = "select * from tbl_menu where status = 'Active' and menuid > 3 order by `order` asc";
                $result = $con->query($select);
                while ($data = $result->fetch_assoc()) {
                ?>
                    <li class="nav-item border-dashed active">
                        <a class="nav-link d-flex align-items-center gap-3 text-dark p-2">
                            <span class="text-uppercase"><?php echo $data['name'] ?></span>
                        </a>
                    </li>
                <?php
                }
                ?>
            </ul>
        </div>
    </div>

    <!-- cart -->
    <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasCart">
        <div class="offcanvas-header justify-content-end me-1">
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="order-md-last">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-primary">Your cart</span>
                    <?php
                    if (isset($_SESSION['id'])) {
                        $id = $_SESSION['id'];
                        $select = "select count(cartid) as count from tbl_cart where userid = '$id'";
                        $result = $con->query($select);
                        $data = $result->fetch_assoc();
                        $count = $data['count'];
                    ?>
                        <span class="badge bg-primary rounded-pill"><?php echo $count ?></span>
                    <?php
                    } else {
                    ?>
                        <span class="badge bg-primary rounded-pill">0</span>
                    <?php
                    }
                    ?>
                </h4>
                <ul class="list-group mb-3">
                    <?php
                    if (isset($_SESSION['id'])) {
                        $id = $_SESSION['id'];
                        $select = "select * from tbl_cart where userid = '$id' order by date desc";
                        $result = $con->query($select);
                        while ($data = $result->fetch_assoc()) {
                            $prd = $data['productid'];
                            $selectprd = "select img , name from tbl_prd where productid = '$prd'";
                            $resultprd = $con->query($selectprd);
                            $dataprd = $resultprd->fetch_assoc();
                    ?>
                            <li class="list-group-item d-flex justify-content-between lh-sm">
                                <div><img class="me-2" src="Admin/upload/Detail/<?php echo $dataprd['img'] ?>" style="width: 50px;height:50px;"></div>
                                <div class="align-self-start">
                                    <h6 class="my-0 fs-7"><?php echo $dataprd['name'] ?></h6>
                                    <small class="text-body-secondary">QTY: <?php echo $data['qty'] ?></small>
                                </div>
                                <span class="text-body-secondary">$<?php echo $data['price'] ?></span>
                                <span class="text-body-secondary ms-2"><a href="Admin/model/Cart/delete.php?cartid=<?php echo $data['cartid'] ?>&prdid=<?php echo $data['productid'] ?>"><i class="fa-solid fa-trash fs-6" style="cursor: pointer;"></i></a></span>
                            </li>
                        <?php
                        }
                        $selectsum = "select sum(price * qty) as total from tbl_cart where userid = '$id'";
                        $resultsum = $con->query($selectsum);
                        $datasum = $resultsum->fetch_assoc();
                        ?>
                        <?php
                        if ($count > 0) {
                        ?>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Total:</span>
                                <strong>$<?php echo $datasum['total'] ?></strong>
                            </li>
                            <a href="checkout.php" class="w-100 btn btn-primary btn-lg">Continue to checkout</a>
                        <?php
                        }
                        ?>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>

    <header class="position-sticky top-0 z-3 bg-light">
        <div class="container-fluid">
            <div class="row py-3 border-bottom">
                <div class="col-4 col-lg-2 text-center text-sm-start d-flex gap-3 justify-content-center justify-content-md-start">
                    <div class="d-flex align-items-center my-3 my-sm-0">
                        <a href="index.php" class="logo">
                            <img src="img/ec.png" alt="logo" class="w-100 h-100">
                        </a>
                    </div>
                    <button class="navbar-toggler mt-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                        aria-controls="offcanvasNavbar">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                </div>
                <div class="col-6 offset-sm-2 offset-md-0 col-lg-4">
                    <div class="search-bar row bg-light p-2 mt-3 mt-md-1 rounded-4">
                        <div class="col-10 col-md-7">
                            <form id="search-form" class="text-center" action="index.html" method="post">
                                <input type="text" class="form-control border border-black" placeholder="Search Product Here">
                            </form>
                        </div>
                        <div class="col-2 col-md-1 d-flex justify-content-center align-items-center">
                            <i class="fa-solid fa-magnifying-glass fs-5 text-secondary" style="cursor: pointer;"></i>
                        </div>
                        <div class="col-md-4  d-none d-md-block">
                            <select class="form-select bg-transparent border border-black text-capitalize">
                                <option selected value="">All Categories</option>
                                <?php
                                $select = "select * from tbl_cate where status = 'Active' order by cateid asc";
                                $result = $con->query($select);
                                while ($data = $result->fetch_assoc()) {
                                ?>
                                    <option value="<?php echo $data['cateid'] ?>" ​ class="text-capitalize"><?php echo $data['name'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-12 pt-lg-2 pt-sm-0">
                    <ul class="navbar-nav list-unstyled d-flex flex-row gap-3 gap-lg-4 justify-content-lg-start justify-content-center flex-wrap align-items-center mb-0 fw-bold text-uppercase text-dark">
                        <li class="nav-item active">
                            <a href="index.php" class="nav-link"><i class="fa-solid fa-home text-dark m-0"></i></a>
                        </li>
                        <?php
                        $select = "select * from tbl_menu where status = 'Active' order by `order` asc limit 3";
                        $result = $con->query($select);
                        while ($data = $result->fetch_assoc()) {
                        ?>
                            <li class="nav-item active">
                                <a href="menu.php?menuid=<?php echo $data['menuid'] ?>" class="nav-link fs-6"><?php echo $data['name'] ?></a>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
                <div class="col-12 col-lg-1 d-flex gap-5 align-items-center justify-content-center mt-3 mt-lg-0">
                    <ul class="d-flex justify-content-end list-unstyled m-0 mt-3">
                        <?php
                        if (isset($_SESSION['name'])) {
                        ?>
                            <li style="margin-top: -3px;"><?php echo $_SESSION['name'] ?></li>
                        <?php
                        } else {
                        ?>
                            <li>
                                <a href="login/index.php" class="p-2 mx-1">
                                    <i class="fa-solid fa-user"></i>
                                </a>
                            </li>
                        <?php
                        }
                        ?>
                        <li>
                            <a href="#" class="p-2 mx-1" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCart"
                                aria-controls="offcanvasCart">
                                <i class="fa-solid fa-basket-shopping"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <div class="pb-5 d-flex justify-content-center align-items-center" style="margin-top: 60px;">
        <div class="container-lg p-0 row">
            <?php
            if (isset($_GET['prdid'])) {
                $prdid = $_GET['prdid'];
                $select = "select * from tbl_prd where productid = '$prdid'";
                $result = $con->query($select);
                $data = $result->fetch_assoc();

                $menu = $data['menuid'];
                $selectmenu = "select name from tbl_menu where menuid = '$menu'";
                $resultmenu = $con->query($selectmenu);
                $datamenu = $resultmenu->fetch_assoc();

                $cate = $data['cateid'];
                $selectcate = "select name from tbl_cate where cateid = '$cate'";
                $resultcate = $con->query($selectcate);
                $datacate = $resultcate->fetch_assoc();
            }
            ?>
            <p class="p-0 my-0 text-capitalize" style="margin-left: 25px;"><?php echo $datamenu['name'] . "/" . $datacate['name'] . "/" . $data['name'] ?></p>
            <div class="col-lg-6">
                <img src="Admin/upload/Detail/<?php echo $data['img'] ?>" class="img-fluid" alt="">
            </div>
            <div class="col-lg-6">
                <h3 class="text-capitalize mt-3"><?php echo $data['name'] ?></h3>
                <p class="text-dark">
                    Date:
                    <?php
                    $date = strtotime($data['date']);
                    echo date('D d M Y H:i', $date);
                    ?>
                </p>
                <p class="text-dark">Price: $
                    <?php
                    if ($data['discount'] > 0) {
                    ?>
                        <del><?php echo $data['price'] ?></del> $<?php echo number_format($data['price'] * (100 - $data['discount']) / 100, 2) . " (" . $data['discount'] . "% OFF)" ?>
                    <?php
                    } else {
                        echo $data['price'];
                    }
                    ?>
                </p>
                <div><input id="qty-<?php echo $data['productid'] ?>" type="number" min='1' max='<?php echo $data['stock'] ?>' value="1"></div>
                <p class="text-dark border-bottom border-secondary-subtle pb-2">Stock: <?php echo $data['stock'] ?></p>
                <p class="text-dark"><?php echo $data['des'] ?></p>
                <div class="row justify-content-center mb-5" style="height: 50px;">
                    <?php
                    if (isset($_SESSION['id']) != '') {
                        $id = $_SESSION['id'];
                    ?>
                        <a onclick="pass(<?php echo $id ?> , <?php echo $data['productid'] ?> , )" class="text-dark btn btn-transparent border border-black col-5 d-flex justify-content-center align-items-center fs-5 rounded-0" style="margin-right: 20px;">Add to Cart</a>
                    <?php
                    } else {
                    ?>
                        <a onclick="alert('Please log in first!')" class="text-dark btn btn-transparent border border-black col-5 d-flex justify-content-center align-items-center fs-5 rounded-0" style="margin-right: 20px;">Add to Cart</a>
                    <?php
                    }
                    ?>
                    <a href="" class="btn btn-dark col-5 d-flex justify-content-center align-items-center fs-5 rounded-0">Find Out More</a>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center align-items-center row" style="margin-top: 30px;">
        <div class="row container-lg col-lg-12">
            <h3 class="col-lg-12 m-0 p-0 text-center text-lg-start">You may also like:</h3>
        </div>
        <div class="row p-0 container-lg col-lg-12 justify-content-lg-around justify-content-center gap-1">
            <?php
            $select = "select * from tbl_prd where menuid = '$menu' and cateid = '$cate' and productid != '$prdid' order by date desc limit 4";
            $result = $con->query($select);
            while ($data = $result->fetch_assoc()) {
            ?>
                <a href="detail.php?prdid=<?php echo $data['productid'] ?>" class="col-lg-2 col-5 m-0 p-0 row mt-5 text-decoration-none">
                    <div class="col-lg-12 col-12 p-0 d-flex justify-content-center">
                        <img src="Admin/upload/Detail/<?php echo $data['img'] ?>" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-12 col-12 p-0">
                        <h6 class="m-2 p-0 text-center"><?php echo $data['name'] ?></h6>
                        <p class="text-dark text-center">$<?php
                                                            if ($data['discount'] != 0) echo number_format($data['price'] * (100 - $data['discount']) / 100, 2);
                                                            else echo $data['price']; //str_replace(",", "", $number)
                                                            ?>
                        </p>
                    </div>
                </a>
            <?php
            }
            ?>
        </div>
    </div>
    <?php include 'footer.php' ?>
</body>
<script src="js/jquery.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="js/plugins.js"></script>
<script src="js/script.js"></script>
<script>
    function pass(userId, productId, maxStock) {
        const quantityInput = document.getElementById(`qty-${productId}`);
        const quantity = quantityInput.value;
        const href = `Admin/model/Cart/insert.php?userid=${encodeURIComponent(userId)}&prdid=${encodeURIComponent(productId)}&qty=${encodeURIComponent(quantity)}`;
        window.location.href = href;
    }
</script>

</html>