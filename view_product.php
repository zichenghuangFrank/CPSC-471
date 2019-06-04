<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
?>

<!DOCTYPE <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Product list</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>

    <style>
        body {background:url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/41294/hero.jpg") no-repeat center center fixed; background-size:cover;}

        .search {width: 450px;height: 50px;margin-top: 20px;margin-left: 173px;background: #444;background: rgba(0,0,0,.5);border-radius:  3px;border: 1px solid #fff;}
        .search input {width: 330px;padding: 15px 15px;float: left;color: #ccc;font-size: 20px;border: 0;background: transparent;border-radius: 3px 0 0 3px;}
        .search input:focus {outline: 0;background:transparent;}

        .search button {position: absolute;top: 21px;left:505px;float: right;border: 0;padding: 0;cursor: pointer;height: 50px;width: 120px;color: #fff;background: transparent;border-left: 1px solid #fff;border-radius: 0 3px 3px 0;}
        .search button:hover {background: #fff;color:#444;}
        .search button:active {box-shadow: 0px 0px 12px 0px rgba(225, 225, 225, 1);}
        .search button:focus {outline: 0;}

        body, ul, li {margin: 0; padding: 0; -style: none;}
        a {color: inherit; text-decoration: none;}
        .con {margin: 0 auto; width: 1200px;}
        .cell {float: left;box-sizing: border-box;}
        .img-box > img {display: block;width: 100%;}
        .product {height: 530px;width: 100%;margin: 45px 0 25px 0;}
        .product-item-list {width: 100%;height: 415.5px;box-sizing: border-box;}
        .product-item-list .list-1-box {width: 287px;height: 380px;display: block;margin:20px 0 20px; 0;}

        .unstyled-button {
          border: none;
          padding: 0;
          background: none;
          font-size: 20px;
          color: white;
          width: 260px;
          height: 50px;
        }



    </style>

</head>

<body>
    <?php
        include("header.php");
    ?>

    <form class = "search" action = "view_product.php?search=true" method="post">
        <input type = "search" placeholder = "Search here..." required name='keyword' autocomplete="off">
        <button type = "submit">Search</button>
    </form>

    <div class="con">
        <div class="prodect">
            <div class="product-item-list">
                <ul class="product-item-list-1">
                    <?php
                    include "database_connection.php";
                    if (isset($_GET['search']) && $_POST['keyword']){
                        $query = "SELECT * FROM products WHERE Product_name LIKE '%$_POST[keyword]%';";
                        $result = $conn->query($query);
                        if ($result->num_rows > 0){
                            while ($row = mysqli_fetch_assoc($result)){
                                $item = "<form action = 'product_page.php?clicked=true' method='post'>
                                            <li class='list-1-box cell'>
                                                <div class='imh-box'><input type='image' name=clicked width='260px' height='260px' src=".$row['Picture']. "></div>
                                                <input type='hidden' name='item_bar_code' value='".$row['Bar_code']."'>
                                                <button class='unstyled-button'>".$row['Product_name']."</button>
                                                <br>
                                                <br>
                                                <div style='color: white;'>$ ".$row['Price']."</div>
                                            </li>
                                        </form> ";
                                echo $item;
                            }
                        }else{
                            echo "<h1 style='color:orange; position: absolute; top'>no result</h1>";
                        }
                    }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
