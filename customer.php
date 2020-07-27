<?php
    require 'includes/header.php';
?>

<?php
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

<div class="customer">
    <h1>Register</h1>
    <p>Already have an account? <a href="login.php">Login here</a></p>

    <form action="includes/customer-inc.php" method="POST" enctype="multipart/form-data">
    <div class="non-radio">
        <input type="text" name="username" placeholder="Username" maxlength="20" minlength="5">
        <input type="password" name="password" placeholder="Password" maxlength="25" minlength="4">
        <input type="password" name="confpass" placeholder="Retype Password" maxlength="25" minlength="4">
    
        <p>Enter your photo below</p>
        <input type="file" name="file">
    </div>
        <button type="submit" name="submit">Submit</button>

    </form>
</div>





<?php
    require 'includes/footer.php';
?>