<?php
    session_start();
    require 'database.php';

    if(isset($_GET['delete'])){
        $id = $_GET['delete'];

        $sql = "DELETE FROM items WHERE id = ?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header('Location: ../listallSales.php?error=sqlerror');
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "i" , $id);
            mysqli_stmt_execute($stmt);

            $_SESSION['message'] = "Item has been deleted !";
            header('Location: ../listallSales.php?success=recorddeleted');
            exit();
        }
    }
?>
