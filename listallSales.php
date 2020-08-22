<?php
require 'includes/header2.php';
?>

<?php
if (isset($_SESSION['message'])) {

    echo "<div class='messageMinus'>";
    echo "<br>";
    echo $_SESSION['message'];
    unset($_SESSION['message']);
    echo "</div>";
}

if (isset($_SESSION['messageEdit'])) {

    echo "<div class='messagePlus'>";
    echo "<br>";
    echo $_SESSION['messageEdit'];
    unset($_SESSION['messageEdit']);
    echo "</div>";
}
?>

<div class="searchbox">
    <form action="listallSales.php" method="POST">
        <input type="text" name="searchbox" placeholder="Search for an item" required>
        <input type="submit" name="submit" value="Search">
    </form>
</div>

<?php
if (isset($_POST['submit'])) {
    $search = trim($_POST['searchbox']);
    $username = $_SESSION['sessionUser'];

    $sql = "SELECT * FROM items WHERE username = ? && itemname = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header('Location: listallSales.php?error=sqlerror');
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "ss", $username, $search);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
?>
        <div class="forTable">
            <table class="table">
                <thead>
                    <tr>
                        <th>Item Name</th>
                        <th>Price</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>

                <?php
                while ($row = mysqli_fetch_assoc($result)) {  ?>
                    <tr>
                        <td><?php echo $row['itemname']; ?></td>
                        <td><?php echo $row['price']; ?></td>
                        <td>
                            <div class="editDelete">
                                <a href="salesmanEdit.php?edit=<?php echo $row['id']; ?>">Edit</a>
                                <a href="includes/salesmanDelete.php?delete=<?php echo $row['id']; ?>">Delete</a>
                            </div>
                        </td>
                    </tr>
                <?php } ?>

            </table>
        </div>
        <?php


    }
} else {

    $username = $_SESSION['sessionUser'];

    $sql = "SELECT * FROM items WHERE username = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header('Location: listallSales.php?error=sqlerror');
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $rowCount = mysqli_stmt_num_rows($stmt);
        if ($rowCount == 0) {

            echo "<div class='noResult'>";
            echo "<h2>No items entered. <a href = 'addItem.php'>Click here</a></h2>";
            echo "</div>";
        } else {

            $sql = "SELECT * FROM items WHERE username = ? ORDER BY itemname";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header('Location: listallSales.php?error=sqlerror');
                exit();
            } else {
                mysqli_stmt_bind_param($stmt, "s", $username);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
        ?>
                <div class="forTable">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Item Name</th>
                                <th>Price</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>

                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {  ?>
                            <tr>
                                <td><?php echo $row['itemname']; ?></td>
                                <td><?php echo $row['price']; ?></td>
                                <td>
                                    <div class="editDelete">
                                        <a href="salesmanEdit.php?edit=<?php echo $row['id']; ?>">Edit</a>
                                        <a href="includes/salesmanDelete.php?delete=<?php echo $row['id']; ?>">Delete</a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>

                    </table>
                </div>
<?php
            }
        }
    }
}
?>


</body>

</html>