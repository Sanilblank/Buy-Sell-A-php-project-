<?php
    require 'includes/header2.php';
?>

<?php
    if(isset($_SESSION['message'])){

    echo "<div class='messagePlus'>";
        echo "<br>";
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    echo "</div>";
    }
    if(isset($_SESSION['messageDuplicate'])){

        echo "<div class='messageMinus'>";
            echo "<br>";
            echo $_SESSION['messageDuplicate'];
            unset($_SESSION['messageDuplicate']);
        echo "</div>";
        }
?>
<div class="additem">
<h1>Enter details of the item you want to add.</h1>

<form action="includes/additem-inc.php" method="POST">
    <input type="text" name="itemName" placeholder="Name of the item" required>
    <input type="number" name="price" placeholder="Price of the item"required>

    <button type="submit" name="submit">Submit</button>

</form>
</div>


<div class="absoluteFooter">
<?php
    require 'includes/footer.php';
?>
</div>