<?php
include 'Admin/connection/conect.php';
session_start();
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

<body>
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
                                <a href="menu.php?menuid=<?php echo $data['menuid'] ?>" class="nav-link fs-7"><?php echo $data['name'] ?></a>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
                <div class="col-12 col-lg-1 d-flex gap-5 align-items-center justify-content-center mt-0">
                    <ul class="d-flex justify-content-end list-unstyled m-0 mt-2">
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

    <?php
    $select = "select * from tbl_feature where status = 'Active' order by date desc limit 1";
    $result = $con->query($select);
    $data = $result->fetch_assoc();
    $datefeature = $data['date'];
    ?>
    <!-- feature -->
    <div style="background-image: url('Admin/upload/Feature/<?php echo $data['img'] ?>'); background-repeat: no-repeat; background-size: cover;">
        <div class="container-fluid px-5" style="background-color: rgba(0, 0, 0, 0.5);">
            <div class="row">
                <div class="col-lg-6 pt-5 mt-5">
                    <h2 class="display-2 ls-1 text-light text-capitalize">
                        <?php echo $data['name'] ?>
                    </h2>
                    <p class="fs-5 text-light">
                        <?php echo $data['detail'] ?>
                    </p>
                    <div class="d-flex gap-3">
                        <a href="#" class="btn btn-light text-uppercase fs-5 rounded-pill px-4 py-3 mt-3 fw-bold text-dark">Find Out
                            now</a>
                        <a href="#" class="btn btn-primary text-uppercase fs-5 rounded-pill px-4 py-3 mt-3 fw-bold text-light">Shop Now</a>
                    </div>
                    <div class="row my-5">
                        <div class="col-4">
                            <div class="row text-dark">
                                <div class="col-auto">
                                    <p class="fs-1 fw-bold lh-sm mb-0 text-light">14k+</p>
                                </div>
                                <div class="col d-flex justify-content-center align-items-center">
                                    <p class="text-uppercase lh-sm mb-0 text-light">Product Varieties</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="row text-dark">
                                <div class="col-auto">
                                    <p class="fs-1 fw-bold lh-sm mb-0 text-light">50k+</p>
                                </div>
                                <div class="col d-flex justify-content-center align-items-center">
                                    <p class="text-uppercase lh-sm mb-0 text-light">Customers</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="row text-dark">
                                <div class="col-auto">
                                    <p class="fs-1 fw-bold lh-sm mb-0 text-light">10+</p>
                                </div>
                                <div class="col d-flex justify-content-center align-items-center">
                                    <p class="text-uppercase lh-sm mb-0 text-light">Store Locations</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-sm-3 row-cols-lg-3 g-0 justify-content-center">
                <div class="col">
                    <div class="card border-0 bg-info rounded-0 p-4 text-light">
                        <div class="row">
                            <div class="col-md-3 d-flex justify-content-center align-items-center">
                                <i class="fa-solid fa-rotate-left fs-1 d-flex justify-content-center align-items-center text-light"
                                    style="width: 60px; height: 60px;"></i>
                            </div>
                            <div class="col-md-9">
                                <div class="card-body p-0">
                                    <h5 class="text-light">14 Days Return</h5>
                                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipi elit.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card border-0 bg-danger rounded-0 p-4 text-light">
                        <div class="row">
                            <div class="col-md-3 d-flex justify-content-center align-items-center">
                                <i class="fa-solid fa-truck-fast fs-1 d-flex justify-content-center align-items-center text-light"
                                    style="width: 60px; height: 60px;"></i>
                            </div>
                            <div class="col-md-9">
                                <div class="card-body p-0">
                                    <h5 class="text-light">Free Shipping</h5>
                                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipi elit.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card border-0 bg-success rounded-0 p-4 text-light">
                        <div class="row">
                            <div class="col-md-3 d-flex justify-content-center align-items-center">
                                <i class="fa-solid fa-tag fs-1 d-flex justify-content-center align-items-center text-light"
                                    style="width: 60px; height: 60px;"></i>
                            </div>
                            <div class="col-md-9">
                                <div class="card-body p-0">
                                    <h5 class="text-light">Discount 50%</h5>
                                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipi elit.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- category -->
    <div class="py-5 overflow-hidden">
        <div class="container-lg">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header d-flex flex-wrap justify-content-between mb-5">
                        <h2 class="section-title">Category</h2>
                        <div class="d-flex align-items-center">
                            <div class="swiper-buttons">
                                <button class="swiper-prev category-carousel-prev btn btn-yellow">❮</button>
                                <button class="swiper-next category-carousel-next btn btn-yellow">❯</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="category-carousel swiper">
                        <div class="swiper-wrapper">
                            <?php
                            $select = "select * from tbl_cate where status = 'Active' order by cateid asc";
                            $result = $con->query($select);;
                            while ($data = $result->fetch_assoc()) {
                            ?>
                                <a class="nav-link swiper-slide text-center">
                                    <img src="Admin/upload/Category/<?php echo $data['img'] ?>" class="rounded-circle" alt="Category Thumbnail">
                                    <h4 class="fs-6 mt-3 fw-normal category-title text-capitalize"><?php echo $data['name'] ?></h4>
                                </a>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- product -->
    <div class="pb-5">
        <div class="container-lg">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header d-flex flex-wrap justify-content-between my-4">
                        <h2 class="section-title">Just Arrived</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="product-grid row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5">
                        <?php
                        $select = "select * from tbl_prd where stock > 0 order by date desc limit 10";
                        $result = $con->query($select);
                        while ($data = $result->fetch_assoc()) {
                            $menuid = $data['menuid'];
                            $cateid = $data['cateid'];
                            $selectmenu = "select name from tbl_menu where menuid = '$menuid'";
                            $resultmenu = $con->query($selectmenu);
                            $datamenu = $resultmenu->fetch_assoc();
                            $selectcate = "select name from tbl_cate where cateid = '$cateid'";
                            $resultcate = $con->query($selectcate);
                            $datacate = $resultcate->fetch_assoc();
                        ?>
                            <div class="col">
                                <div class="product-item">
                                    <figure>
                                        <a href="detail.php?prdid=<?php echo $data['productid'] ?>">
                                            <img src="Admin/upload/Detail/<?php echo $data['img'] ?>" alt="Product Thumbnail" class="image-fluid" style="width: fit-content;">
                                        </a>
                                    </figure>
                                    <div class="d-flex flex-column text-center">
                                        <h3 class="fs-6 fw-normal"><?php echo $data['name'] ?></h3>
                                        <div>Stock: <?php echo $data['stock'] ?></div>
                                        <div class="text-capitalize"><?php echo $datamenu['name'] . "/" . $datacate['name'] ?></div>
                                        <div class="d-flex justify-content-center align-items-center gap-2">
                                            <?php if ($data['discount'] > 0) {
                                            ?>
                                                <del>$<?php echo $data['price'] ?></del>
                                                <span class="text-dark fw-semibold">$<?php echo number_format($data['price'] * (100 - $data['discount']) / 100, 2) ?></span>
                                                <span class="badge border border-dark-subtle rounded-0 fw-normal px-1 fs-7 lh-1 text-body-tertiary"><?php echo number_format($data['discount'], 2) ?>% OFF</span>
                                            <?php
                                            } else {
                                            ?>
                                                <span class="text-dark fw-semibold">$<?php echo $data['price'] ?></span>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- feature -->
    <div class="py-3">
        <div class="container-lg">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner-blocks">
                        <?php
                        $select = "select * from tbl_feature where status = 'Active' and date < '$datefeature' order by date desc limit 3";
                        $result = $con->query($select);
                        $i = 1;
                        while ($data = $result->fetch_assoc()) {
                            $class = $i == 1 ? "banner-ad d-flex align-items-center large block-$i" : "banner-ad block-$i";
                        ?>
                            <div class="<?php echo $class ?>" style="background: url('Admin/upload/Feature/<?php echo $data['img'] ?>') no-repeat; background-size: cover;">
                                <div class="banner-content p-5 w-100 h-100 d-flex align-items-center" style="background-color: rgba(0, 0, 0, 0.2);">
                                    <div class="content-wrapper text-light">
                                        <h3 class="banner-title text-light"><?php echo $data['name'] ?></h3>
                                        <p><?php echo $data['detail'] ?></p>
                                        <a class="btn-link text-white">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        <?php
                            $i++;
                            $datefeature = $data['date'];
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- product -->
    <div id="latest-products" class="products-carousel">
        <div class="container-lg overflow-hidden pb-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header d-flex justify-content-between my-4">
                        <h2 class="section-title">Order By Name (A-Z)</h2>
                        <div class="d-flex align-items-center">
                            <div class="swiper-buttons">
                                <button class="swiper-prev products-carousel-prev btn btn-primary">❮</button>
                                <button class="swiper-next products-carousel-next btn btn-primary">❯</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            <?php
                            $select = "select * from tbl_prd where stock > 0 order by name asc limit 20";
                            $result = $con->query($select);
                            while ($data = $result->fetch_assoc()) {
                                $menuid = $data['menuid'];
                                $cateid = $data['cateid'];
                                $selectmenu = "select name from tbl_menu where menuid = '$menuid'";
                                $resultmenu = $con->query($selectmenu);
                                $datamenu = $resultmenu->fetch_assoc();
                                $selectcate = "select name from tbl_cate where cateid = '$cateid'";
                                $resultcate = $con->query($selectcate);
                                $datacate = $resultcate->fetch_assoc();
                            ?>
                                <div class="product-item swiper-slide">
                                    <figure>
                                        <a href="detail.php?prdid=<?php echo $data['productid'] ?>" title="Product Title">
                                            <img src="Admin/upload/Detail/<?php echo $data['img'] ?>" alt="Product Thumbnail" class="tab-image">
                                        </a>
                                    </figure>
                                    <div class="d-flex flex-column text-center">
                                        <h3 class="fs-6 fw-normal"><?php echo $data['name'] ?></h3>
                                        <div>Stock: <?php echo $data['stock'] ?></div>
                                        <div class="text-capitalize"><?php echo $datamenu['name'] . "/" . $datacate['name'] ?></div>
                                        <div class="d-flex justify-content-center align-items-center gap-2">
                                            <?php if ($data['discount'] > 0) {
                                            ?>
                                                <del>$<?php echo $data['price'] ?></del>
                                                <span class="text-dark fw-semibold">$<?php echo number_format($data['price'] * (100 - $data['discount']) / 100, 2) ?></span>
                                                <span class="badge border border-dark-subtle rounded-0 fw-normal px-1 fs-7 lh-1 text-body-tertiary"><?php echo number_format($data['discount'], 2) ?>% OFF</span>
                                            <?php
                                            } else {
                                            ?>
                                                <span class="text-dark fw-semibold">$<?php echo $data['price'] ?></span>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- product -->
    <div id="popular-products" class="products-carousel">
        <div class="container-lg overflow-hidden py-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header d-flex justify-content-between my-4">
                        <h2 class="section-title">Most Expensive Product (No Discount)</h2>
                        <div class="d-flex align-items-center">
                            <div class="swiper-buttons">
                                <button class="swiper-prev products-carousel-prev btn btn-primary">❮</button>
                                <button class="swiper-next products-carousel-next btn btn-primary">❯</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            <?php
                            $select = "select * from tbl_prd where stock > 0 and discount = 0 order by price desc limit 20";
                            $result = $con->query($select);
                            while ($data = $result->fetch_assoc()) {
                                $menuid = $data['menuid'];
                                $cateid = $data['cateid'];
                                $selectmenu = "select name from tbl_menu where menuid = '$menuid'";
                                $resultmenu = $con->query($selectmenu);
                                $datamenu = $resultmenu->fetch_assoc();
                                $selectcate = "select name from tbl_cate where cateid = '$cateid'";
                                $resultcate = $con->query($selectcate);
                                $datacate = $resultcate->fetch_assoc();
                            ?>
                                <div class="product-item swiper-slide">
                                    <figure>
                                        <a href="detail.php?prdid=<?php echo $data['productid'] ?>" title="Product Title">
                                            <img src="Admin/upload/Detail/<?php echo $data['img'] ?>" alt="Product Thumbnail" class="tab-image">
                                        </a>
                                    </figure>
                                    <div class="d-flex flex-column text-center">
                                        <h3 class="fs-6 fw-normal"><?php echo $data['name'] ?></h3>
                                        <div>Stock: <?php echo $data['stock'] ?></div>
                                        <div class="text-capitalize"><?php echo $datamenu['name'] . "/" . $datacate['name'] ?></div>
                                        <div class="d-flex justify-content-center align-items-center gap-2">
                                            <span class="text-dark fw-semibold">$<?php echo $data['price'] ?></span>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- product -->
    <div id="featured-products" class="products-carousel">
        <div class="container-lg overflow-hidden py-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header d-flex flex-wrap justify-content-between my-4">
                        <h2 class="section-title">Order By Discount</h2>
                        <div class="d-flex align-items-center">
                            <div class="swiper-buttons">
                                <button class="swiper-prev products-carousel-prev btn btn-primary">❮</button>
                                <button class="swiper-next products-carousel-next btn btn-primary">❯</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            <?php
                            $select = "select * from tbl_prd where stock > 0 and discount > 0 order by discount desc limit 20";
                            $result = $con->query($select);
                            while ($data = $result->fetch_assoc()) {
                                $menuid = $data['menuid'];
                                $cateid = $data['cateid'];
                                $selectmenu = "select name from tbl_menu where menuid = '$menuid'";
                                $resultmenu = $con->query($selectmenu);
                                $datamenu = $resultmenu->fetch_assoc();
                                $selectcate = "select name from tbl_cate where cateid = '$cateid'";
                                $resultcate = $con->query($selectcate);
                                $datacate = $resultcate->fetch_assoc();
                            ?>
                                <div class="product-item swiper-slide">
                                    <figure>
                                        <a href="detail.php?prdid=<?php echo $data['productid'] ?>" title="Product Title">
                                            <img src="Admin/upload/Detail/<?php echo $data['img'] ?>" alt="Product Thumbnail" class="tab-image">
                                        </a>
                                    </figure>
                                    <div class="d-flex flex-column text-center">
                                        <h3 class="fs-6 fw-normal"><?php echo $data['name'] ?></h3>
                                        <div>Stock: <?php echo $data['stock'] ?></div>
                                        <div class="text-capitalize"><?php echo $datamenu['name'] . "/" . $datacate['name'] ?></div>
                                        <div class="d-flex justify-content-center align-items-center gap-2">
                                            <?php if ($data['discount'] > 0) {
                                            ?>
                                                <del>$<?php echo $data['price'] ?></del>
                                                <span class="text-dark fw-semibold">$<?php echo number_format($data['price'] * (100 - $data['discount']) / 100, 2) ?></span>
                                                <span class="badge border border-dark-subtle rounded-0 fw-normal px-1 fs-7 lh-1 text-body-tertiary"><?php echo number_format($data['discount'], 2) ?>% OFF</span>
                                            <?php
                                            } else {
                                            ?>
                                                <span class="text-dark fw-semibold">$<?php echo $data['price'] ?></span>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- feature -->
    <div id="latest-blog" class="pb-4">
        <div class="container-lg">
            <div class="row">
                <div class="section-header d-flex align-items-center justify-content-between my-4">
                    <h2 class="section-title">Our Feature Product</h2>
                </div>
            </div>
            <div class="row">
                <?php
                $select = "select * from tbl_feature where status = 'Active' and date < '$datefeature' order by `date` desc limit 3";
                $result = $con->query($select);
                while ($data = $result->fetch_assoc()) {
                ?>
                    <div class="col-md-4">
                        <article class="post-item card border-0 shadow-sm p-3" style="height: fit-content;">
                            <div class="image-holder zoom-effect">
                                <a><img src="Admin/upload/Feature/<?php echo $data['img'] ?>" alt="post" class="card-img-top w-100 h-100"></a>
                            </div>
                            <div class="card-body">
                                <div class="post-meta d-flex text-uppercase gap-3 my-2 align-items-center">
                                    <div class="meta-date">
                                        <i class="fa-solid fa-calendar fs-6" style="margin-right: 5px;"></i>
                                        <?php
                                        $date = strtotime($data['date']);
                                        echo "<span class='text-capitalize'>" . date('D d M Y H:i', $date) . "</span>";
                                        ?>
                                    </div>
                                </div>
                                <div class="post-header">
                                    <h3 class="post-title">
                                        <a class="text-decoration-none"><?php echo $data['name'] ?></a>
                                    </h3>
                                    <p><?php echo $data['detail'] ?></p>
                                </div>
                            </div>
                        </article>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>

    <!-- looking -->
    <div class="py-4">
        <div class="container-lg">
            <h2 class="my-4">People are also looking for</h2>
            <?php
            $select = "select name from tbl_prd where stock > 0 order by name limit 20";
            $result = $con->query($select);
            while ($data = $result->fetch_assoc()) { ?>
                <a class="btn btn-warning me-2 mb-2"><?php echo $data['name'] ?></a>
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

</html>