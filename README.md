<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Search</title>
        <style type = "text/css">
            body {background:url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/41294/hero.jpg") no-repeat center center fixed; background-size:cover;}

            .search {width: 570px;height: 50px;margin: 300px auto;background: #444;background: rgba(0,0,0,.5);border-radius:  3px;border: 1px solid #fff;}
            .search input {width: 440px;padding: 15px 15px;float: left;color: #ccc;font-size: 20px;border: 0;background: transparent;border-radius: 3px 0 0 3px;}
            .search input:focus {outline: 0;background:transparent;}
            .search button {position: absolute; left: 934px;float: right;border: 0;padding: 0;cursor: pointer;height: 50px;width: 120px;color: #fff;background: transparent;border-left: 1px solid #fff;border-radius: 0 3px 3px 0;}
            .search button:hover {background: #fff;color:#444;}
            .search button:active {box-shadow: 0px 0px 12px 0px rgba(225, 225, 225, 1);}
            .search button:focus {outline: 0;}

            h1{position: absolute;left: 590px;top: 70px;font-size: 100px;color: rgb(255, 255, 102);}   /*tittle position*/

            li {font-size: 25px;list-style-type:none;display: inline;float: right;}

            .button .cell{
                background-color: #ccc; /* Green */
                border: none;
                color: #ff0000;
                padding: 15px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                cursor: pointer;
                float: right;
            }

            .cell:hover {background-color: #99ccff;}
            .txtlink {text-decoration: none;}

        </style>

</head>

<body>
    <center>
        <h1 style="font-family: Comic Sans MS;">Taobao</h1>
    </center>


    <form class = "search" action = "view_product.php?search=true" method="post">
        <input type = "search" name ="keyword" placeholder = "Search here..." required autocomplete="off">
        <button type = "submit">Search</button>
    </form>


    <?php
        include("header.php");
    ?>

</body>
</html>
