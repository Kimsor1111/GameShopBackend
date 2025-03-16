<?php
include("root/header.php");
?>
<style>
    body{
        width: 100vw;
        background-color: green;
    }
    .box {
        width: 80%;
        height: 100%;
        font-size: 35px;
        color: white;
        font-weight: bold;
        text-transform: uppercase;
        animation-name: test;
        animation-duration: 6s;
        animation-iteration-count: infinite;
        text-shadow: 3px 3px 4px black;
        float: left;
    }

    @keyframes test {
        0% {
            color: white;

        }

        25% {
            color: black;
        }

        50% {
            color: lime;
        }

        75% {
            color: gold;
        }

        100% {
            color: white;
        }
    }

    .input{
        width: 20%;
        min-height:100vh;
        /* background-color: tan; */
    }
    .login {
        width: 30%;
        height: 50%;
        /* background-color: green; */
        float: left;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .login,
    .login:hover {
        text-decoration: none;
    }

    .login input,
    .login:hover input {
        color: white;
    }
</style>
</head>

<body style="overflow: hidden;" class="bg-primary">
    <div class="container-fluid row" style='min-height:100vh'>
        <div class='box'>
            <marquee behavior="" direction="">Admin Product Management</marquee>
        </div>
        <div class="input row d-flex justify-content-between align-items-center mb-4">
            <a href="login.php" class="login btn btn-info col-4 d-flex justify-content-center align-items-center text-light" target="_parent">
                Log Out
            </a>
            <a href="../index.php" class="login btn btn-success col-4 d-flex justify-content-center align-items-center" target="_blank">
                Website
            </a>
            <a href="http://localhost/phpmyadmin/index.php?route=/database/structure&db=ec1" class="login btn btn-secondary col-4 d-flex justify-content-center align-items-center" target="_blank">
                Database
            </a>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>