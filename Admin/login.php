<?php
include 'root/Header.php';
session_start();
$nameadmin = "Kimsor";
$passadmin = "301005";
$passhash = password_hash($passadmin, PASSWORD_DEFAULT);

if (isset($_POST['login'])) {
    $name = $_POST['name'];
    $pass = $_POST['pass'];
    if ($name === $nameadmin && password_verify($pass, $passhash)) {
        $_SESSION['logged_in'] = true;
        header('location: index.php');
        exit();
    } else {
        $_SESSION['msg'] = "Wrong username or password";
    }
}
?>
<title>Login</title>
<link rel="stylesheet" href="Style/stylelogin.css">
</head>

<body>

    <div class="wrapper">
        <div class="title">
            Admin Login
        </div>
        <form  action="" method="post">
            <div class="field">
                <input type="text" required name="name">
                <label>Admin Name</label>
            </div>
            <div class="field">
                <input type="password" class="pass" required name="pass">
                <label>Password</label>
                <i class="fa-solid fa-eye"></i>
                <i class="fa-solid fa-eye-slash"></i>
            </div>
            <div class="field">
                <input type="submit" value="Login" name="login">
            </div>
            <?php
            if (isset($_SESSION['msg']) || isset($_SESSION['msg']) != '') {
            ?>
                <div class="alert alert-danger"><?php echo $_SESSION['msg'] ?></div>
            <?php
            }
            session_destroy();
            ?>
        </form>
    </div>
</body>
<script>
    let password = document.querySelector('.pass')
    let eyeopen = document.querySelector('.fa-eye')
    let eyeclose = document.querySelector('.fa-eye-slash')
    eyeopen.addEventListener('click', function() {
        password.setAttribute('type', 'text')
        this.style.display = 'none'
        eyeclose.style.display = 'block'
    })
    eyeclose.addEventListener('click', function() {
        password.setAttribute('type', 'password')
        this.style.display = 'none'
        eyeopen.style.display = 'block'
    })
</script>

</html>