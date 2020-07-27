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
<div class="customerPage">
<?php
    echo "<h1> Welcome {$_SESSION['sessionUser']} what product are you looking for today?</h1>";
?>
</div>

<div class="searchbox2">
    <form action="customerSearch.php" method="POST">
        <input type="text" name="searchbox" placeholder="Search for an item" required>
        <input type="submit" name="submit" value="Search">
    </form>
</div>

</body>
</html>