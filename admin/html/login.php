<?php
$title = "Login";
$titleName = "Admin Login";
require_once 'login-header.php';

?>

    <div class="login-page">
        <div class="form">
            <form action="" method="post" name="Login_Form" class="login-form">
                <h3 class="heading-login">Admin Login</h3>
               <?php if (isset($msg)) { ?>
                    <p class="error-login"> <?php echo $msg; ?> </p>
                <?php } ?>
                <input type="text" name="userName" placeholder="User Name" />
                <input name="password" type="password" placeholder="password"/>
                <button name="Submit" type="submit">Login</button>
            </form>
        </div>
    </div>
<?php
require_once 'footer.php';
?>