<?php
    if(isset($_POST['submit'])){
        require 'database.php';
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $confPass = trim($_POST['confpass']);
        $shopName = trim($_POST['shopname']);
        $shopLocation = trim($_POST['shoplocation']);
        $contactNo = trim($_POST['contactNo']);

        //For uploading file
        $file = $_FILES['file'];
        $name = $_FILES['file']['name'];
        $tmp_name = $_FILES['file']['tmp_name'];
        $size = $_FILES['file']['size'];
        $error = $_FILES['file']['error'];

        $tempExtension = explode('.',$name);
        $fileExtension = strtolower(end($tempExtension));

        $isAllowed = array('jpg', 'jpeg', 'png', 'pdf');

        if(in_array($fileExtension, $isAllowed)){
            if($error === 0){
                if($size < 100000000000){
                    $newFileName = uniqid('',true) . "." . $fileExtension;
                    $fileDestination = "uploads/" . $newFileName;
                    $picture = $fileDestination;
                    move_uploaded_file($tmp_name,$fileDestination);
                }else{
                    echo "Sorry, file size is to big.";
                }

            }else{
                echo "Sorry, an error occured. Please try again.";
            }

        }else{
            $picture = "uploads/userPhoto.png";
        }
        //End of uploading file


        if(empty($username) || empty($password) || empty($confPass) || empty($shopName) || empty($shopLocation) || empty($contactNo)){
            header("Location: ../salesman.php?error=Empty fields");
            exit();
        }elseif((!preg_match("/^[a-zA-Z0-9]*/",$username)) || (!preg_match("/^[a-zA-Z0-9]*/",$shopName)) || (!preg_match("/^[a-zA-Z0-9]*/",$shopLocation))){
            header("Location: ../salesman.php?error=Invalid data");
            exit();
        }elseif($password != $confPass){
            header("Location: ../salesman.php?error=Passwords do not match");
            exit();
        }
        else{
            $sql = "SELECT * FROM salesman WHERE username = ?";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../salesman.php?error=sqlerror");
                exit();
            }
            else{
                mysqli_stmt_bind_param($stmt, "s", $username);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $rowCount = mysqli_stmt_num_rows($stmt);

                if($rowCount > 0)
                {
                    header("Location: ../salesman.php?error=Username taken");
                    exit();
                }
                else{
                    $sql = "INSERT INTO salesman (username, password, picture, sname, slocation, contactNo) VALUES (?, ?, ?, ?, ?, ?)";
                    $stmt = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt, $sql)){
                        header("Location: ../salesman.php?error=sqlerror2");
                        exit();
                    }
                    else{
                        $hashedPass = password_hash($password, PASSWORD_DEFAULT);
                        mysqli_stmt_bind_param($stmt, "ssssss", $username, $hashedPass, $picture, $shopName, $shopLocation, $contactNo);
                        mysqli_stmt_execute($stmt);
                        header("Location: ../login.php?success=New useradded");
                        exit();
                    }
                }
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);

    }



?>