<?php
    require 'includes/header.php';
?>
<?php
    if(isset($_GET['success'])){

        $success = $_GET['success'];

        ?>

    <div class="alertSuccess">
    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
    <?php echo $success; ?>
    </div>

<?php
    }

    if(isset($_GET['error'])){

        $error = $_GET['error'];

        ?>

    <div class="alert">
    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
    <?php echo $error; ?>
    </div>

<?php
    }
?>
<div class="login_div">
    <h1>Login</h1>
    <p>No account? <a href="register.php">Register here</a></p>

    <form action="includes/login-inc.php" method="POST">
        <div class="non-radio">
            <input type="text" name="username" placeholder="Username" maxlength="20" minlength="5">
            <input type="password" name="password" placeholder="Password" maxlength="25" minlength="4">
        </div>
        <div class="radio-group">
            <p>Select the type of account</p>
            <label class="radio">
                <input type="radio" value="customer" name="accountType">Customer
            </label>
            <label class="radio">
                <input type="radio" value="salesman" name="accountType">Salesman
            </label>
        </div>
        
        <button type="submit" name="submit">Login</button>
    </form>
</div>
<div class="absoluteFooter">
<?php
    require 'includes/footer.php';
?>
</div>