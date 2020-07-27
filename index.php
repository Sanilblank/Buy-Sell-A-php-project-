<?php
    require_once 'includes/header.php';
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
?>

<h1>Welcome to Buy & Sell</h1>
<p>A place for searching and mentioning different goods.</p>

<div class="frontpage_image">
    <ul>
        <li>
            <img src="includes/images/image1.jpg">
            <p>A place where you can search <br>for all the goods required at desirable prices.</p>
        </li>
        <li>
            <img src="includes/images/image2.png">
            <p>A place for different sellers to <br>show their products at reasonable prices.</p>
        </li>
    </ul>
</div>

<div class="loginorregister">
    <h3>Already have an account? <a href="login.php">Login here</a></h3>
    <h3>Dont have an account? <a href="register.php">Register here</a></h3>

</div>

<?php
    require_once 'includes/footer.php';
?>

    
