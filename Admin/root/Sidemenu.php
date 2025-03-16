<?php
include("header.php");
?>
</head>
<style>
</style>
<body style="background-color: black;">
    <div class="box">

    </div>
    <div class="menu">
        <br>
        <ul class="list-unstyled components">
            <li>
                <a href="Content.php" target="content">Dashboard</a>
            </li>
            <li class="active">
                <a href="../view/Menu/index.php" target="content">Menu</a>
            </li>
            <li class="active">
                <a href="../view/Category/index.php" target="content">Categories Product</a>
            </li>
            <li class="active">
                <a href="../view/Feature/index.php" target="content">Features Product</a>
            </li>
            <li class="active">
                <a href="../view/Detail/index.php" target="content">Details Product</a>
            </li>
            <li class="active">
                <a href="../view/Cart/index.php" target="content">Carts Product</a>
            </li>
            <li class="active">
                <a href="../view/User/index.php" target="content">Users</a>
            </li>

            <!-- <li class="active">
                <a href="#User" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Manage User</a>
                <ul class="collapse list-unstyled" id="User" style="margin-left: 20px;">
                    <li>
                        <a href="" target="content">User Admin</a>
                    </li>
                    <li>
                        <a href="" target="content">User</a>
                    </li>
                </ul>
            </li>-->
        </ul>
    </div>

</body>
<!-- jQuery CDN - Slim version (=without AJAX) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<!-- jQuery Custom Scroller CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $("#sidebar").mCustomScrollbar({
            theme: "minimal"
        });

        // $('#sidebarCollapse').on('click', function () {
        //     $('#sidebar, #content').toggleClass('active');
        //     $('.collapse.in').toggleClass('in');
        //     $('a[aria-expanded=true]').attr('aria-expanded', 'false');
        // });
    });
</script>

</html>