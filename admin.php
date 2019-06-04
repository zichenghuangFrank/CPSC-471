<?php
  session_start();
?>

<html>
  <head>
    <style type="text/css">
      body {
        /*background-image: url(https://boygeniusreport.files.wordpress.com/2017/05/water.jpg?quality=98&strip=all&w=782);
        background-repeat: no-repeat;*/
        background-position: center;
        background-width: 100%;
        background-height: 100%;
        background-size: 100%100%;
      }
      form { /* Container*/
        margin-left: auto;
        margin-right: auto;
        margin-top: 180px;
        max-width: 280px;
        background: rgb(204, 153, 255);
        padding: 25px 15px 25px 10px;
        font: 12px "Comic Sans MS", cursive, sans-serif;
        color: rgb(204, 153, 255);
        text-shadow: 1px 1px 1px #FFF;
        border:2px solid rgb(204, 255, 204);
        border-radius: 8px;
        box-shadow: 0px 0 13px rgba(100,100,100,.7);
        border-style: groove;
        opacity: 0.75;
      }
      form h1 {   /* Header of contatiner (Admin Login) */
          font-size: 25px;
          padding: 0px 0px 10px 70px;     /* up right down left */
          display: block;
          border-bottom:2px solid #E4E4E4;


          margin: -10px -15px 30px -10px;;
          color: rgb(255, 153, 153);
          text-shadow: 2px 2px 2px rgb(51, 51, 255)
      }
      form label {    /* All label class */
          display: block;
          margin: 0px;
      }
      form label>span {   /* span part in label */
          font-size: 12px;
          float: left;
          width: 20%;
          text-align: right;
          padding-right: 10px;
          margin-top: 10px;
          color:rgb(51, 102, 153);
          text-shadow: 2px 2px 2px rgb(255, 153, 153);
      }
      form input[type="text"], form input[type="text"] {  /* Input */
          border: 2px solid #DADADA;
          color: #888;
          height: 30px;
          margin-bottom: 16px;
          margin-right: 6px;
          margin-top: 2px;
          outline: 0 none;
          padding: 3px 3px 3px 5px;
          width: 70%;
          font-size: 12px;
          line-height:15px;
          box-shadow: inset 0px 1px 4px #ECECEC;
          -moz-box-shadow: inset 0px 1px 4px #ECECEC;
          -webkit-box-shadow: inset 0px 1px 4px #ECECEC;
      }
      form .submit {  /* Sign In submit button */
          background: #E27575;
          border: none;
          color: #FFF;
          box-shadow: 1px 1px 5px #B6B6B6;
          border-radius: 5px;
          text-shadow: 1px 1px 1px #9E3F3F;
          cursor: pointer;
          width: 155px;
          line-height: 35px;
          text-align: center;
          vertical-align: middle;
      }
      form .submit:hover {
          background: #CF7A7A
      }

      .AdminLink{
          text-decoration: none;
          border:0px solid rgb(51, 102, 153);
          position: fixed;
          left: 40%;
           text-shadow: 2px 2px 2px rgb(255, 153, 153);
          color:yellow;
          font: 50px "Comic Sans MS", cursive, sans-serif;

      }
      .AdminID{
          position: fixed;
          left: 2%;
          color: yellow;
           text-shadow: 2px 2px 2px rgb(255, 153, 153);
          font: 50px "Comic Sans MS", cursive, sans-serif;
      }


    </style>
  </head>
    <body style="background-image:url('https://images.unsplash.com/photo-1444703686981-a3abbc4d4fe3?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=600&q=60');
     background-repeat:non-repeat;background-size:cover;">
      <?php
      include "database_connection.php";

      $form_do = '<form action="admin.php?" method="post">
                <h1>Admin Login
                </h1>
                <label>
                <span>Admin Id: </span>
                <input id = "adminID"
                 type = "text"
                 autocomplete = "off"
                 name = "admin_id"
                 placeholder = "Your Admin ID" />
                </label><br>

                <label>
                <span>Password: </span>
                <input id = "password"
                 type = "password"
                 autocomplete = "off"
                 name = "admin_pwd"
                 placeholder = "Your Admin Password" />
                </label><br>

                <label>
                <span>&nbsp;</span>
                    <input type = "submit"
                     name="LogIn"
                     class = "submit"
                     value = "Sign In" />
                </label>

				';

      $form_insert = '<form aciton="admin.php" method="post">"hj
                      Product_name: <input type="text" name="pname"><br>
                      Bar_code: <input type="text" name="barCode"><br>
                      Picture: <input type="text" name="picture"><br>
                      Price: <input type="number" name="price"><br>
                      Brand_name: <input type:"text" name="bname"><br>
                      Description: <input type:"text" name="description"><br>
                      Size: <input type:"number" name="size"><br>
                      <input type="submit" name="insert" value="insert">
            </form>';

      if(isset($_GET['logout'])){
        $_SESSION['admin_id'] = NULL;
      }

      if(isset($_SESSION['admin_id'])){
         echo "<p class='AdminID'>Hi, ".$_SESSION['admin_id']."<br></p>".

              "<a href='admin.php?logout=true' style='font_size=50px;' class='AdminLink'>log out</a><br><br><br><br><br>
               <a href='addproduct.php' style='font_size=50px;' class='AdminLink'>Add Product</a><br><br><br><br><br>
               <a href='updateproduct.php' style='font_size=50px;'class='AdminLink'>Modify Product</a><br><br><br><br><br>
               <a href='deleteproduct.php' style='font_size=50px;'class='AdminLink'>Delete Product</a><br><br><br><br><br>
               <a href='addmoney.php' style='font_size=50px;'class='AdminLink'>Add money</a><br>";

        // Add product
         if(isset($_POST['insert'])){
           $sql = "INSERT INTO products (Product_name, Bar_code, Picture, Price, Brand_name, Description, Size)
                  VALUES ('$_POST[pname]', '$_POST[barCode]', '$_POST[picture]', '$_POST[price]', '$_POST[bname]', '$_POST[description]',
                  '$_POST[size]')";

           if(mysqli_query($conn, $sql)){
             echo '<script language="javascript">';
             echo 'alert("New product has been added.")';
             echo '</script>';
           }else{
             echo "Exception: " . $sql . "<br>" . mysqli_error($conn);
           }
         }
         // Modify product
         if(isset($_POST['modify'])){
           $sql = "UPDATE products SET Product_name='$_POST[pname]', Bar_code='$_POST[barCode]', Picture='$_POST[picture]', Price='$_POST[price]',
                  Brand_name='$_POST[bname]', Description='$_POST[description]', Size='$_POST[size]'
                  WHERE Bar_code='$_POST[barCode]'";

           if(mysqli_query($conn, $sql)){
             echo '<script language="javascript">';
             echo 'alert("Product has been updated.")';
             echo '</script>';
           }else{
             echo "Exception: " . $sql . "<br>" . mysqli_error($conn);
           }
         }
         // Delete product
         if(isset($_POST['delete'])){
           $sql = "DELETE FROM products WHERE Bar_code = '$_POST[barCode]'";
           if(mysqli_query($conn, $sql)){
             echo '<script language="javascript">';
             echo '<alert("Product has been deleted.")>';
             echo '</script>';
           }else{
             echo "Exception: " . $sql . "<br>" . mysqli_error($conn);
           }
         }

         if(isset($_POST['addmoney'])){
             $query = "SELECT * FROM client WHERE User_id = '$_POST[user_id_number]';";
             $result = mysqli_query($conn, $query);
             if (mysqli_num_rows($result) > 0){
                 $row = mysqli_fetch_assoc($result);
                 $balance = $row['Balance'];
                 $balance = $balance + $_POST['money_amount'];
                 $query = "UPDATE client SET Balance = '$balance' WHERE User_id = '$_POST[user_id_number]';";
                 mysqli_query($conn, $query);
             }else{
                 echo "invalid operation.";
             }
         }

      }else if(isset($_POST['LogIn'])){
        $query = mysqli_query($conn, "SELECT * FROM admin WHERE Admin_id='$_POST[admin_id]'");
        $numrows = mysqli_num_rows($query);
        if($numrows != 1){
            header('Location: admin.php');
        }else{
          $row = mysqli_fetch_assoc($query);
          $databaseUser = $row['Admin_id'];
          $databasePass = $row['Password'];

          if($_POST['admin_pwd']!=$databasePass){
            header('Location: admin.php');
          }else{
            $_SESSION['admin_id']=$databaseUser;
            $_SESSION['loggedin']=1;
            header('Location: admin.php');
          }
        }
      }else{
        echo $form_do;
      }

    ?>
   </body>
</html>
