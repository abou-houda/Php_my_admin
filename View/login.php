<?php
session_start();
if (isset($_SESSION["login"])){
    ?>
    <script>
        window.location = 'index.php';
    </script>
        <?php
}
?>
<link rel="stylesheet" href="../assets/css/login.css">
<link rel="stylesheet" href="../assets/css/black-dashboard.css">
<link rel="stylesheet" href="../assets/css/nucleo-icons.css">

<div class="login-box">
    <h2>Login</h2>
    <form method="post" action="">
        <div class="user-box">
            <input type="text" name="login" required="">
            <label>Username</label>
        </div>
        <div class="user-box">
            <input type="password" name="password" >
            <label>Password</label>
        </div>
        <a>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <input value="Login" name="submit" type="submit" style="background-color: transparent;border: 0px;color: white;font-weight: bold;"/>
        </a>
    </form>
</div>
<?php
include_once ('../DB/DataAccess.php');
include_once ('../Model/User.php');
if (isset($_POST['submit'])){
    $user = User::getUser($_POST['login'],$_POST['password']);
    if ($user != null){
        $_SESSION["login"] = $_POST['login'] ;
        $_SESSION["password"] = $_POST['password'];
        ?>
        <script>
            window.location = "index.php";
        </script>

<?php
    }
}
?>