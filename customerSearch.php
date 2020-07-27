<?php
    require 'includes/header2.php';
?>

<?php
    if(isset($_POST['submit'])){
        $itemName = trim($_POST['searchbox']);
        $username = $_SESSION['sessionUser'];

        echo "<h1> {$_SESSION['sessionUser']}, we have arranged the product you requested in ascending order of price.</h1>";

        $sql = "SELECT * FROM items WHERE itemname = ? ORDER BY price";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql))
        {
            header('Location: ../loggedCustomer.php?error=sqlerror');
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "s", $itemName);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $rowCount = mysqli_stmt_num_rows($stmt);
            if($rowCount == 0){
                
                echo "<div class='noResult'>";
                echo "<h2> No results found. Search for something else. </h2>";
                echo "</div>";
                }
            else{
                $sql = "SELECT * FROM items WHERE itemname = ? ORDER BY price";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql))
                {
                    header('Location: ../loggedCustomer.php?error=sqlerror');
                    exit();
                }
                else{
                    mysqli_stmt_bind_param($stmt, "s", $itemName);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                        ?>
                        <div class="forTable">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Item Name</th>
                                        <th>Price</th>
                                        <th>Username</th>
                                        <th>Shop Name</th>
                                        <th>Shop Location</th>
                                        <th>Contact No</th>
                                    </tr>
                                </thead>

                        <?php
                            while($row = mysqli_fetch_assoc($result)){  ?>
                                <tr>
                                    <td><?php echo $row['itemname']; ?></td>
                                    <td><?php echo $row['price']; ?></td>
                                    <td><?php echo $row['username']; ?></td>
                                    <td><?php echo $row['sname']; ?></td>
                                    <td><?php echo $row['slocation']; ?></td>
                                    <td><?php echo $row['contactNo']; ?></td>
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