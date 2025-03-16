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
                                <i class="fa-solid fa-basket-shopping d-none"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <div class="pb-5 d-flex justify-content-center align-items-center" style="margin-top: 60px;">
        <div class="container-lg row p-0 justify-content-center">
            <h2 class="m-0 p-0 text-dark col-lg-12">
                Your Cart
                <?php
                if (isset($_SESSION['id'])) {
                    $id = $_SESSION['id'];
                    $select = "select count(cartid) as count from tbl_cart where userid = '$id'";
                    $result = $con->query($select);
                    $data = $result->fetch_assoc();
                    $count = $data['count'];
                ?>
                    <span class="badge bg-primary rounded-pill mb-4"><?php echo $count ?></span>
                <?php
                } else {
                ?>
                    <span class="badge bg-primary rounded-pill mb-4">0</span>
                <?php
                }
                ?>
            </h2>
            <div class="row col-lg-12 justify-content-lg-between justify-content-center mt-5">
                <div class="col-lg-8 col-12 row p-0 text-dark pb-4">
                    <?php
                    if (isset($_SESSION['id'])) {
                        $id = $_SESSION['id'];
                        $select = "select * from tbl_cart where userid = '$id'";
                        $result = $con->query($select);
                        while ($data = $result->fetch_assoc()) {
                            $prd = $data['productid'];
                            $selectprd = "select * from tbl_prd where productid = '$prd'";
                            $resultprd = $con->query($selectprd);
                            $dataprd = $resultprd->fetch_assoc();
                    ?>
                            <div class="col-lg-12 row justify-content-between mt-4">
                                <div class="col-lg-4 col-6">
                                    <img class="img-fluid" src="Admin/upload/Detail/<?php echo $dataprd['img'] ?>" alt="">
                                </div>
                                <div class="col-lg-8 col-6">
                                    <p class="mt-3 fs-4"><?php echo $dataprd['name'] ?></p>
                                    <p class="mt-3 fs-4">$<?php echo $data['price'] ?></p>
                                    <p class="mt-3 fs-4">QTY: <?php echo $data['qty'] ?></p>
                                    <p class="mt-3 fs-4">Total: $<?php echo $data['qty'] * $data['price'] ?></p>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    <?php
                    }
                    ?>
                </div>
                <?php
                if (isset($_SESSION['id'])) {
                    $id = $_SESSION['id'];
                    $select = "select sum(qty) as sumqty , sum(qty * price) as total from tbl_cart where userid = '$id'";
                    $result = $con->query($select);
                    $data = $result->fetch_assoc();
                ?>
                    <div class="col-lg-4 p-0 text-dark pb-4 d-flex flex-column">
                        <p class="text-dark fs-4">Item: <?php echo $data['sumqty']?></p>
                        <p class="text-dark fs-4">Tax: 0%</p>
                        <p class="text-dark fs-4">Delivery: Free</p>
                        <p class="text-dark fs-4">Total: $<?php echo $data['total']?></p>
                        <button class="btn btn-dark fs-4 fw-bold align-self-center rounded-0" style="width: 100%;">Checkout</button>
                    </div>
                <?php
                }
                ?>
            </div>
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