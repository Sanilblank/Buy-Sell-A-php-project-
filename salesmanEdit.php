<?php
    require 'includes/header2.php';
?>

<?php  
if(isset($_SESSION['messageEdit'])){
        echo "<div class='messagePlus'>";
            echo "<br>";
            echo $_SESSION['messageEdit'];
            unset($_SESSION['messageEdit']);
        echo "</div>";
    }
?>

<?php
    if(isset($_GET['edit'])){
        $id = $_GET['edit'];
        
        $sql = "SELECT * FROM items WHERE id = ?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header('Location: salesmanEdit.php?error=sqlerror');
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "i", $id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $row = mysqli_fetch_assoc($result);
            $itemname = $row['itemname'];
        }
    }
?>

<div class="additem">
<h1>Edit the details as you want.</h1>

<form action="salesmanEdit.php" method="POST">
    <input type="text" name="itemName" value="<?php echo $itemname; ?>" placeholder="Name of the item" required>
    <input type="number" name="price" placeholder="Price of the item"required>

    <button type="submit" name="submit">Confirm</button>

</form>
</div>

<?php
    if(isset($_POST['submit'])){
        $username = $_SESSION['sessionUser'];
        $itemname = trim($_POST['itemName']);
        $price = $_POST['price'];

        $sql = "SELECT * FROM items WHERE username = ? && itemname = ?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header('Location: salesmanEdit.php?error=sqlerror');
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "ss", $username, $itemname);
            mysqli_stmt_execute($stmt);
            $result1 = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result1)){
                $sql = "UPDATE items SET price = ? WHERE username = ? && itemname = ?";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)){
                    header('Location: salesmanEdit.php?error=sqlerror');
                    exit();
                }
                else{
                    mysqli_stmt_bind_param($stmt, "sss", $price, $username, $itemname);
                    mysqli_stmt_execute($stmt);

                    $_SESSION['messageEdit'] = "Item has been updated successfully!";
                    header('Location: listallSales.php?success=editsuccessful');
                    exit();
                }
            
        }
        else{
            header('Location: salesmanEdit.php?error=nosuchitemexists');
            exit();
        }

        

        
    
        }
    }
?>


<div class="absoluteFooter">
<?php
    require 'includes/footer.php';
?>
</div>