<?php
    if(isset($_POST['submit'])){
        require 'database.php';

        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $accountType = trim($_POST['accountType']);

        if(empty($username) || empty($password) || empty($accountType)){
            header("Location: ../login.php?error=Empty Fields");
            exit();
        }
        else{
            if($accountType == "customer"){
                $sql = "SELECT * FROM customer WHERE username = ?";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location: ../login.php?error=sqlerror");
                    exit();
                }
                else{
                    mysqli_stmt_bind_param($stmt, "s", $username);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);

                    if($row = mysqli_fetch_assoc($result))
                    {
                        $passCheck = password_verify($password, $row['password']);
                        if($passCheck == FALSE){
                            header("Location: ../login.php?error=Wrong Password");
                            exit();
                        }
                        elseif($passCheck == TRUE){
                            session_start();
                            $_SESSION['sessionUser'] = $row['username'];
                            $_SESSION['sessionPic'] = $row['picture'];
                            $_SESSION['messageLogin'] = "Logged in successfully";
                            header("Location: ../loggedCustomer.php?success=loggedinWelcome" . $_SESSION['sessionUser']);
                            exit();
                        }else{
                            header("Location: ../login.php?error=Wrong password");
                            exit();
                        }
                    }else{
                        header("Location: ../login.php?error=No such user exists");
                        exit();
                    }
                }
            }else{
                $sql = "SELECT * FROM salesman WHERE username = ?";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location: ../login.php?error=sqlerror");
                    exit();
                }
                else{
                    mysqli_stmt_bind_param($stmt, "s", $username);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);

                    if($row = mysqli_fetch_assoc($result))
                    {
                        $passCheck = password_verify($password, $row['password']);
                        if($passCheck == FALSE){
                            header("Location: ../login.php?error=Wrong password");
                            exit();
                        }
                        elseif($passCheck == TRUE){
                            session_start();
                            $_SESSION['sessionUser'] = $row['username'];
                            $_SESSION['sessionPic'] = $row['picture'];
                            $_SESSION['sessionSname'] = $row['sname'];
                            $_SESSION['sessionSlocation'] = $row['slocation'];
                            $_SESSION['sessionContact'] = $row['contactNo'];
                            $_SESSION['messageLogin'] = "Logged in successfully";
                            header("Location: ../loggedSalesman.php?success=loggedinWelcome " . $_SESSION['sessionUser']);
                            exit();
                        }else{
                            header("Location: ../login.php?error=Wrong password");
                            exit();
                        }
                    }else{
                        header("Location: ../login.php?error=No such user exists");
                        exit();
                    }
                }
            }
        }
        
    }else{
        header("Location: ../login.php?error=Access forbidden");
        exit();
    }
?>