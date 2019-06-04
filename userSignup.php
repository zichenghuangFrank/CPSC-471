<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
?><!DOCTYPE html>
<html>
<style>
form { /*

    left: 37.5%;
    font-size: 25px;*/
    position: fixed;
    left: 5%;
    top: 20%;
    width: 90%;
    /* border-style: groove; */
      /* border-width: 3px; */
      /* background-color: rgb(63,132,155); */
      /* opacity: 0.75; */
      }
input[type=text], select {
    width: 20%;
    padding: 8px 27px;
    margin: 8px 27px;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 10%;
    background-color:rgb(153, 194, 255);
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    /*background-color: #45a049;*/
}
label{
    /*background-color: rgb(153, 194, 255);*/
    color: rgb(153, 194, 255);
}

div {
    border-radius: 5px;
    /*background-color: #f2f2f2;*/
    padding: 20px;
}
</style>
<body style="background-image:url('https://images.unsplash.com/photo-1436891620584-47fd0e565afb?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=600&q=60'); background-repeat:non-repeat;background-size:cover;">

<div>
    <center>
  <form action="search.php?signup=true" method="post">

    <label for='userid'>User ID</label>
    <input type="text" name="id" placeholder="Your user id.." required autocomplete="off"><br>

    <label for="fname">First Name</label>
    <input type="text" name="firstn" placeholder="Your first name.." required autocomplete="off"><br>

    <label for="lname">Last Name</label>
    <input type="text" name="lastn" placeholder="Your last name.." required autocomplete="off"><br>

   	<label for="age">Age</label>
    <input type="text" name="age" placeholder="Your age.." required autocomplete="off"><br>

    <label for='balance'>Balance</label>
    <input type="text" name="bala" placeholder="Your balance.." required autocomplete="off"><br>

    <label for="address">Address</label>
    <input type="text" name="addr" placeholder="Your address.." required autocomplete="off"><br>

    <label for='password'>Password</label>
    <input type="text" name="pwd" placeholder="Your user password.." required autocomplete="off"><br>

    <input type="submit" value="Submit">
    <a href = "search.php"><input type ="submit" value="cancel"></a>
  </form>
</center>
</div>

</body>
</html>
