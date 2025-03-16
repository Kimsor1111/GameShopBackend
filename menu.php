<?php
session_start();
include 'Admin/connection/conect.php';
$menuid = isset($_GET['menuid']) ? $_GET['menuid'] : '';
$selectmenu = "select name from tbl_menu where menuid = '$menuid'";
$resultmenu = $con->query($selectmenu);
$datamenu = $resultmenu->fetch_assoc();
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
<style>
    .hover-border {
        cursor: pointer;
        transition: 50ms linear;
    }

    .hover-border:hover {
        transform: scale(102%);
    }
</style>

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

    <!-- sort -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header justify-content-between">
            <h4 class="fw-normal text-uppercase fs-6 mt-3">Filter & Sort</h4>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-end menu-list list-unstyled d-flex gap-md-3 mb-0">
                <li class="nav-item border-dashed">
                    <button
                        class="btn btn-toggle dropdown-toggle position-relative w-100 d-flex justify-content-between align-items-center text-dark p-2"
                        data-bs-toggle="collapse" data-bs-target="#sort-collapse" aria-expanded="false">
                        <div class="d-flex gap-3">
                            <span class="text-uppercase">Sort By</span>
                        </div>
                    </button>
                    <div class="collapse" id="sort-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal ps-5 pb-1">
                            <li class="border-bottom py-2">
                                <a href="#" class="dropdown-item text-uppercase">Price(Low-High)</a>
                                <a href="#" class="dropdown-item text-uppercase">Price(High-Low)</a>
                                <a href="#" class="dropdown-item text-uppercase">Newest</a>
                                <a href="#" class="dropdown-item text-uppercase">Top Seller</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item border-dashed">
                    <button
                        class="btn btn-toggle dropdown-toggle position-relative w-100 d-flex justify-content-between align-items-center text-dark p-2"
                        data-bs-toggle="collapse" data-bs-target="#discount-collapse" aria-expanded="false">
                        <div class="d-flex gap-3">
                            <span class="text-uppercase">Discount</span>
                        </div>
                    </button>
                    <div class="collapse" id="discount-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal ps-5 pb-1">
                            <li class="border-bottom py-2">
                                <a href="#" class="dropdown-item text-uppercase">Up to 20%</a>
                                <a href="#" class="dropdown-item text-uppercase">20%-40%</a>
                                <a href="#" class="dropdown-item text-uppercase">40%-60%</a>
                                <a href="#" class="dropdown-item text-uppercase">60% or More</a>
                            </li>
                        </ul>
                    </div>
                </li>
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

    <div class="pb-5 d-flex justify-content-center align-items-center" style="margin-top: 30px;">
        <div class="container-lg p-0 row">
            <?php
            $select = "select name from tbl_menu where menuid = '$menuid'";
            $result = $con->query($select);
            $data = $result->fetch_assoc();
            ?>
            <div class="col-12">
                <h1 class="text-capitalize"><?php echo $data['name'] ?></h1>
                <p class="lh-sm">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quos deleniti debitis sapiente quibusdam excepturi voluptate eum ea odio recusandae deserunt nam saepe, soluta a dignissimos aliquam architecto maiores, consequuntur quam.</p>
                <a class="btn btn-transparent border border-black rounded-0" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                    Filter & Sort
                </a>
                <div class="row justify-content-center justify-content-md-around justify-content-lg-between">
                    <?php
                    $select = "select * from tbl_prd where menuid = '$menuid' order by date desc";
                    $result = $con->query($select);
                    while ($data = $result->fetch_assoc()) {
                        $cate = $data['cateid'];
                        $selectcate = "select name from tbl_cate where cateid = '$cate'";
                        $resultcate = $con->query($selectcate);
                        $datacate = $resultcate->fetch_assoc();
                    ?>
                        <a href="detail.php?prdid=<?php echo $data['productid'] ?>" class="card col-lg-3 col-md-5 col-12 row mt-4 hover-border text-decoration-none">
                            <img class="img-fluid" src="Admin/upload/Detail/<?php echo $data['img'] ?>" alt="">
                            <div class="col-lg-12 card-body">
                                <p class="m-0 p-0 text-black fs-4 card-title"><?php echo $data['name'] ?></p>
                                <p class="m-0 p-0 card-text">
                                    <?php
                                    if ($data['discount'] > 0) {
                                    ?>
                                        <del>$<?php echo $data['price'] ?></del>
                                        $<?php echo number_format($data['price'] * (100 - $data['discount']) / 100, 2) ?>
                                        <span class="badge border border-dark-subtle rounded-0 fw-normal px-1 fs-7 lh-1 text-body-tertiary">
                                            <?php echo number_format($data['discount'], 2) ?>% OFF
                                        </span>
                                    <?php
                                    } else {
                                    ?>
                                        $<?php echo $data['price'] ?>
                                    <?php
                                    }
                                    ?>
                                </p>
                                <p class="m-0 p-0 card-text">Stock: <?php echo $data['stock'] ?></p>
                                <p class="m-0 p-0 card-text text-capitalize"><?php echo $datamenu['name'] . "/" . $datacate['name'] ?></p>
                            </div>
                        </a>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <?php include 'footer.php'
    ?>
</body>
<script src="js/jquery.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="js/plugins.js"></script>
<script src="js/script.js"></script>

</html>