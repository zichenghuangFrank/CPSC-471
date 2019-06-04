<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
?>
<!DOCTYPE <!DOCTYPE <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>wish-list</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>

    <style>
        body {background:url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/41294/hero.jpg") no-repeat center center fixed; background-size:cover;}

        .t {width: 90%;border: 2px solid grey; margin-left: 70px;}
        .tr th {padding: 15px;color: white;border: 2px solid grey}
        tr {}
            #attr {font:20px "Comic Sans MS", cursive, sans-serif;color: yellow;}

    </style>
</head>

<body>
    <h2 style="font: 50px 'Comic Sans MS', cursive, sans-serif;color:pink">Wish list</h2>

    <script>
		function myFunction() {
		    alert("You have cancelled a product from the wish list.");
		}
	</script>

    <?php
        include("header.php");
        include "database_connection.php";

        if(isset($_GET['cancel_id'])){
            $dele_sql = "DELETE FROM wish_list
                        WHERE Bar_code = '$_GET[cancel_id]'";
            mysqli_query($conn, $dele_sql);
        }

        if(isset($_GET['add'])){
            $query = "SELECT * FROM products WHERE Bar_code ='$_POST[item_bar_code]';";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);

            $sql = "INSERT INTO wish_list(Product_name, Bar_code, User_id)
            VALUES ('$row[Product_name]', '$_POST[item_bar_code]','$_SESSION[userid]');";

            if (mysqli_query($conn, $sql)) {
                echo "<p style='color:#99ff33;'>You have successfully added it into your wish list.</p>";

            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }

        echo "<table class='t'>
              <tr id='attr'>
                <th>Product name</th>
                <th>Bar code</th>
                <th></th>
              </tr>";

        $query = "	SELECT *
                    FROM products as p, wish_list as wh
                    WHERE p.Bar_code = wh.Bar_code AND wh.User_id = '$_SESSION[userid]';";

        $result = $conn->query($query);
        if($result->num_rows > 0){
          while($row = mysqli_fetch_assoc($result)){
                echo "<tr class='tr'>
                        <th>".$row['Product_name']."</th>
                        <th>".$row['Bar_code']."</th>
                        <th><a href='wish_list.php?cancel_id=".$row['Bar_code']."'
                            onclick='myFunction()' class='txtlink'>CANCEL</a></th>
                      </tr>";
        }
            echo "</table>";

        }


     ?>

</body>
</html>
