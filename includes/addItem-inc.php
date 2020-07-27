<?php
    if(isset($_POST['submit'])){
        session_start();
        require 'database.php';
        $itemName = trim($_POST['itemName']);
        $price = trim($_POST['price']);
        $username = $_SESSION['sessionUser'];
        $contactNo = $_SESSION['sessionContact'];
        $sName = $_SESSION['sessionSname'];
        $sLocation = $_SESSION['sessionSlocation'];


            $sql = "SELECT * FROM items WHERE itemname = ? && username = ?";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../addItem.php?error=sqlerror");
                exit();
            }
            else{
                mysqli_stmt_bind_param($stmt, "ss", $itemName, $username);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $rowCount = mysqli_stmt_num_rows($stmt);

                if($rowCount > 0)
                {
                    $_SESSION['messageDuplicate'] = "Item is already present";

                    header("Location: ../addItem.php?error=itemalreadypresent");
                    exit();
                }
                else{
                        $sql = "INSERT INTO items (username, itemname, price, sname, slocation, contactNo) VALUES (?,?,?,?,?,?)";
                        $stmt = mysqli_stmt_init($conn);
                        if(!mysqli_stmt_prepare($stmt, $sql)){
                            header('Location: ../additem.php?error=sqlerror');
                            exit();
                        }
                        else{
                            mysqli_stmt_bind_param($stmt, "ssssss", $username, $itemName, $price, $sName, $sLocation, $contactNo);
                            mysqli_stmt_execute($stmt);
                            
                            $_SESSION['message'] = "Record has been added !";

                            header('Location: ../additem.php?success=newitemadded');
                            exit();
                        }
                     }


    }
}




?>