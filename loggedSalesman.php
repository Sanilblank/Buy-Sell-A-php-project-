<?php
    require 'includes/header2.php';
?>
<?php
    if(isset($_SESSION['messageLogin'])){

        echo "<div class='messagePlus'>";
            echo "<br>";
            echo $_SESSION['messageLogin'];
            unset($_SESSION['messageLogin']);
        echo "</div>";
    }
?>

<?php
    echo "<h1> Welcome {$_SESSION['sessionUser']} what would you like to do?</h1>";
?>

<div class="roundedButton">
    <ul>
        <li><a href="addItem.php" class="btn">Add new item</a></li>
        <li><a href="listallSales.php" class="btn">List all items</a></li>
    </ul>
</div>

<div class="absolutefooter">
<?php
    require 'includes/footer.php';
?>
</div>
