<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Product_list</title>
        <style type = "text/css">

            li {font-size: 25px;list-style-type:none;display: inline;float: right;}

            .button .cells{background-color: #737373;border: none;color: #ff0000;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 13px;cursor: pointer;float: right;}
            .cells:hover {background-color: #ccc;}
            .txtlink {text-decoration: none;}
        </style>

</head>

<body>
    <?php

    // create account (sign up page)
    if(isset($_GET['signup']) && $_POST['id'] && $_POST['pwd']){
    	include "database_connection.php";
    	$query = mysqli_query($conn, "SELECT * FROM client WHERE User_id='$_POST[id]'");
    	$numrows = mysqli_num_rows($query);
        // if or not the user_id have been created
    	if($numrows == 0){
    		$sql = "INSERT INTO client(User_id, First_name, Last_name, Age, Balance, Address, Password)
    				VALUES ('$_POST[id]', '$_POST[firstn]','$_POST[lastn]','$_POST[age]','$_POST[bala]','$_POST[addr]','$_POST[pwd]')";

    		if (mysqli_query($conn, $sql)) {      // new account created so it should return value 1(cus only 1 account have this id)
    		    echo "<p style='color:orange;'>New account has been created successfully</p>";
    		    $_SESSION['user_id'] = $_POST['id'];       // user now loged in get userid session
                $_SESSION['user_fname'] = $_POST['firstn'];
                $_SESSION['user_lname'] = $_POST['lastn'];
    		} else {      // error report
    		    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    		}
    	}else
    		echo "The account already exists, please use another ID.";
    }

    // user login
    if(isset($_GET['login']) && $_POST['log_id'] && $_POST['log_pwd']){
        include "database_connection.php";
    	$query = mysqli_query($conn, "SELECT * FROM client WHERE User_id='$_POST[log_id]'");
    	$numrows = mysqli_num_rows($query);
    	if($numrows == 1){
    		$row 	= mysqli_fetch_assoc($query);
    		$dbuser = $row['User_id'];
    		$dbpass = $row['Password'];

            $_SESSION['user_id'] = $row['User_id'];
            $_SESSION['user_fname'] = $row['First_name'];
            $_SESSION['user_lname'] = $row['Last_name'];

    		if($_POST['log_pwd'] == $dbpass){
    			$_SESSION['userid'] = $dbuser;
    		}
    		else{
                echo '<div style="color:orange;font-weight:bold;"><span>Wrong password.</span></div>';
    		}
    	} else
            echo '<div style="color:orange;font-weight:bold;"><span>No matching account ID found!</span></div>';
    }

    if(isset($_GET['logout'])){
        $_SESSION['userid'] = NULL;
        $_SESSION['user_fname'] = NULL;
        $_SESSION['user_lname'] = NULL;
    }

    if(empty($_SESSION['userid'])){
        $menu = "<div class='button'>
                    <a href = 'userLogin.php' class = 'txtlink'><button class='cells'>Log in</cells></a>
                    <a href = 'userSignup.php' class = 'txtlink'><button class='cells'>Sign up</cells></a>
                    <a href = 'admin.php' class = 'txtlink'><button class='cells'>Admin</cells></a>
                    <a href = 'search.php' class = 'txtlink'><button class='cells'>Homepage</cells></a>
                </div>";

    }else{
        $username = $_SESSION['user_id'];
        $fname = $_SESSION['user_fname'];
        $lname = $_SESSION['user_lname'];

        include "database_connection.php";
        $sql = "SELECT * FROM client WHERE User_id = '$_SESSION[userid]';";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        $menu = "<div class='button'>
                    <a href = 'search.php?logout=true' class = 'txtlink'><button class='cells'>Log out</cells></a>
                    <a href = 'wish_list.php' class = 'txtlink'><button class='cells'>Wish list</cells></a>
                    <a href = 'search.php' class = 'txtlink'><button class='cells'>Homepage</cells></a>
                    <a href = 'shopping_cart.php' class = 'txtlink'><button class='cells'>Shopping cart</cells></a>
                    <button class='cells'>Balance: $".$row['Balance']."</cells></a>
                    <button class='cells'>$fname $lname ($username)</cells></a>
                </div>";
    }
    echo $menu;
    ?>

</body>
</html>
