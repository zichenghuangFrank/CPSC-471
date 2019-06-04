<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {background:url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/41294/hero.jpg") no-repeat center center fixed; background-size:cover;}

* {
    box-sizing: border-box;
}

#myInput {
    background-image: url('/css/searchicon.png');
    background-position: 10px 12px;
    background-repeat: no-repeat;
    width: 100%;
    font-size: 16px;
    padding: 12px 20px 12px 40px;
    border: 1px solid #ddd;
    margin-bottom: 12px;
}

#myUL {
    list-style-type: none;
    padding: 0;
    margin: 0;
}

#myUL li a {
    border: 1px solid white;
    margin-top: -1px; /* Prevent double borders */

    padding: 12px;
    text-decoration: none;
    font-size: 20px;
    color: white;
    display: block
}

#myUL li a:hover:not(.header) {
    background-color: #ccc;
}


.button .cellss{width: 250px; height: 50px;background-color: #ff9933;border: none;position: absolute; padding: 15px 32px;text-align: center;color: #003399;text-decoration: none;display: inline-block;font-size: 23px;cursor: pointer;float: right;}
.cellss:hover {background-color: #00ff99;}
.txtlink {text-decoration: none;}

</style>
<title>Order history</title>
</head>

<h2>My Order History</h2>
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for orders.." title="Type order numbers">

<ul id="myUL">

    <?php
        include("database_connection.php");
        $query = "SELECT * FROM order_history WHERE User_id='$_SESSION[userid]';";
        $result = $conn->query($query);
        if ($result->num_rows > 0){
            while ($row = mysqli_fetch_assoc($result)){
                $history = "<li><a href='#'>OrderID: #".$row['Order_id']." Total amount: $".$row['Total_amount']." Time: ".$row['Order_date']."</a></li>";
                echo $history;
            }
        }

    ?>

</ul>

<script>
function myFunction() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}
</script>

<div class='button'>
    <a href='search.php'><button type='button' class='cellss' style="margin-left: 1270px;margin-top:30px;"><b>Homepage</b></button></a>
</div>

</body>
</html>
