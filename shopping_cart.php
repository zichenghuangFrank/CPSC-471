<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Shopping cart</title>
     <style type="text/css">
     body {background:url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/41294/hero.jpg") no-repeat center center fixed; background-size:cover;}

     .t {width: 90%;border: 2px solid grey; margin-left: 70px;}
     .tr th {padding: 15px;color: white;border: 2px solid grey;left: 50px;}
     tr {}
         #attr {font-size: 26px;color: yellow;}

     .button .cellss{width: 250px; height: 50px;background-color: #ff9933;border: none;position: absolute; padding: 15px 32px;text-align: center;color: #003399;text-decoration: none;display: inline-block;font-size: 23px;cursor: pointer;float: right;}
     .cellss:hover {background-color: #00ff99;}
     .txtlink {text-decoration: none;}

    </style>

</head>
<body>

	<script>
		function myFunction() {
		    alert("You have cancelled a product from the shopping cart.");
		}
	</script>

	<?php
        include("header.php");
        include "database_connection.php";

			if(isset($_GET['cancel_id'])){
				$dele_sql = "DELETE FROM shopping_cart
							WHERE Bar_code = '$_GET[cancel_id]'";
				mysqli_query($conn, $dele_sql);
			}

            if(isset($_GET['add'])){
                $query = "SELECT * FROM products WHERE Bar_code ='$_POST[item_bar_code]';";
                $result = mysqli_query($conn, $query);
                $row = mysqli_fetch_assoc($result);
                $temp_userid = $_SESSION['userid'];
                if ($_SESSION['userid'] == NULL) {
                    $temp_userid = -1;
                }

                $sql = "INSERT INTO shopping_cart(Amount, Product_name, Bar_code, User_id, Price)
                VALUES ('$_POST[qty]', '$row[Product_name]','$_POST[item_bar_code]',$temp_userid, '$row[Price]');";

                if (mysqli_query($conn, $sql)) {
                    echo "<p style='color:#99ff33;'>You have successfully added it into your shopping cart.</p>";

                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            }

            if(isset($_GET['checkout'])){
                $query = "SELECT * FROM client WHERE User_id = '$_SESSION[userid]';";
                $result = mysqli_query($conn, $query);
                if (mysqli_num_rows($result) == 1){
                    $row = mysqli_fetch_assoc($result);
                    $balance = $row['Balance'];

                    if ($balance > $_SESSION['total']) {
                        $sql = "DELETE FROM shopping_cart WHERE User_id='$_SESSION[userid]';";
                        mysqli_query($conn, $sql);

                        $sql = "SELECT MAX(Order_id) AS max FROM order_history WHERE User_id = '$_SESSION[userid]';";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0){
                            $row = mysqli_fetch_array($result);
                            $order_id = $row['max'] +1 ;
                        }
                        else {
                            $order_id = 0;
                        }
                        $order_date = date("d/m/Y");
                        $query = "INSERT INTO order_history(Order_id, User_id, Order_date, Total_amount)
                        VALUES ('$order_id', '$_SESSION[userid]', '$order_date', '$_SESSION[total]');";
                        mysqli_query($conn, $query);

                        $balance = $balance - $_SESSION['total'];

                        $sql = "UPDATE client SET Balance = '$balance' WHERE User_id='$_SESSION[userid]';";
                        mysqli_query($conn, $sql);

                        $_SESSION['total'] = 0.00;
                        header('Location: shopping_cart.php');

                    }else{
                        echo "<p style='color:#99ff33;'>You do not have enough money!</p>";
                    }
                }
            }



			echo "<table class='t'>
				  <tr id='attr'>
				    <th>Amount</th>
				    <th>Product name</th>
				    <th>Bar code</th>
				    <th>Price</th>
				    <th></th>
				  </tr>";

			$query = "	SELECT *
						FROM products as p, shopping_cart as sh
						WHERE p.Bar_code = sh.Bar_code AND sh.User_id = '$_SESSION[userid]';";

			$result = $conn->query($query);
            $total = 0.00;
			if($result->num_rows > 0){
			  while($row = mysqli_fetch_assoc($result)){
			  		echo "<tr class='tr'>
						    <th>".$row['Amount']."</th>
						    <th>".$row['Product_name']."</th>
						    <th>".$row['Bar_code']."</th>
                            <th>$ ".($row['Price']*$row['Amount'])."</th>
						    <th><a href='shopping_cart.php?cancel_id=".$row['Bar_code']."'
						    	onclick='myFunction()' class='txtlink'>CANCEL</a></th>
						  </tr>";
                   $total += $row['Price']*$row['Amount'];
			  }
                echo "<tr class='tr'>
                        <th></th>
                        <th></th>
                        <th style='color:orange;'>Total Amount:</th>
                        <th>$ ".$total."</th>";
			    echo "</table>";

			}
            $_SESSION['total'] = $total;
	?>
    <br>
    <form action='shopping_cart.php?checkout' method='post'>
        <div class='button'>
            <button type='submit' value='checkout' class='cellss' style="margin-left: 1000px; margin-top:100px;"><b>Check out</b></button>
        </div>
    </form>
    <div class='button'>
        <a href='orderHistory.php'><button type='button' class='cellss' style="margin-left: 700px; margin-top:100px;"><b>Order history</b></button></a>
    </div>

</body>
</html>
