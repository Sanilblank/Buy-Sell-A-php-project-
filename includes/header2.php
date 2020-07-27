<?php
    session_start();
    require_once 'includes/database.php';
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy & Sell</title>
    <link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>
    <header>
        <div class="salesmanList">
            <ul>
                <li>
                    <?php

                        $picture = "includes/" . $_SESSION['sessionPic'];
                        echo "<img src='{$picture}'>";
                    ?>
                </li>
                <li>
                <a href="index.php?success=Logged out successfully"><img src="includes/images/logout.png"></a></li>
            </ul>
        </div>
    </header>