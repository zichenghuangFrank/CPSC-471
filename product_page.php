<!DOCTYPE <!DOCTYPE <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Product name</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>

    <style>
        body {background:url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/41294/hero.jpg") no-repeat center center fixed; background-size:cover;}

        .search {width: 450px;height: 50px;margin-top: 20px;margin-left: 173px;background: #444;background: rgba(0,0,0,.5);border-radius:  3px;border: 1px solid #fff;}
        .search input {width: 330px;padding: 15px 15px;float: left;color: #ccc;font-size: 20px;border: 0;background: transparent;border-radius: 3px 0 0 3px;}
        .search input:focus {outline: 0;background:transparent;}

        .search button {position: absolute;top: 21px;left:512px;float: right;border: 0;padding: 0;cursor: pointer;height: 50px;width: 120px;color: #fff;background: transparent;border-left: 1px solid #fff;border-radius: 0 3px 3px 0;}
        .search button:hover {background: #fff;color:#444;}
        .search button:active {box-shadow: 0px 0px 12px 0px rgba(225, 225, 225, 1);}
        .search button:focus {outline: 0;}

       .basebox {
         position: absolute;
         background-color: white;
         width: 600px;
         height: 500px;
         padding: 25px;
         top: 150px;
         left: 700px;
        }

        .txtlink {
          text-decoration: none;
        }

        .qtyinput {
          width: 33px;
          height: 22px;
          border: 1px solid #a3b8d3;
          background: #f2f2f2;
          color: #616161;
          text-align: center;
        }

    </style>
</head>

<body>
    <?php
        include("header.php");
    ?>

    <form class = "search" action = "view_product.php?search=true" method="post">
        <input type = "search" name='keyword' placeholder = "Search here..." required autocomplete="off">
        <button type = "submit">Search</button>
    </form>


    <?php
    include "database_connection.php";
    if (isset($_GET['clicked'])){
        $query = mysqli_query($conn, "SELECT * FROM products WHERE Bar_code='$_POST[item_bar_code]'");
        $row = mysqli_fetch_assoc($query);

        $info = "
            <img style = 'position:absolute; top:150px; left:170px' src='".$row['Picture']."'>
            <div class = 'basebox'>
                <h2 style = 'font-size: 23px;'>".$row['Product_name']."</h2>
                <p style = 'font-size: 18px;'>".$row['Size']."</p>
                <p>By <a href = '#' class = 'txtlink'><b style = 'color:blue;'>".$row['Brand_name']."</b></a></p>
                <br>
                <form action = 'shopping_cart.php?add=true' method='post'>
                  Qty:  <input style = 'width: 10%' class='qtyinput' type='number' name='qty' value='1' min='1' max='99' autocomplete='off'>
                  <br>
                  <p style = 'color: blue;'>$ ".$row['Price']."</p>
                  <button type='submit' value='add'>Add to shopping cart</button>
                  <input type='hidden' name='item_bar_code' value='".$row['Bar_code']."'>
                </form>

                <form action = 'wish_list.php?add=true' method='post'>
                  <button type='submit' value='add'>Add to wish list</button>
                  <input type='hidden' name='item_bar_code' value='".$row['Bar_code']."'>
                </form>
                <h3>Description</h3>
                  <p>".$row['Description']."</p>
            </div>";

        echo $info;
    }
    ?>

</body>
</html>
