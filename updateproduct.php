<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
?>
<html>
	<head>
		<style type="text/css">
			body {background-color: grey;font-size: 28px;}
			form {	/* Container */
				 margin-left: auto;
				 margin-right: auto;
				 margin-top: 50px;
				 max-width: 250px;
				 background: #F7F7F7;
				 padding: 25px 15px 25px 10px;
				 font: 12px "Comic Sans MS", cursive, sans-serif;
				 color: #888;
				 text-shadow: 1px 1px 1px #FFF;
				 border:1px solid #E4E4E4;
				 border-radius: 8px;
				 box-shadow: 0px 0 13px rgba(100,100,100,.7);
				 opacity: 0.78;
			 }
			th, td {
		    	padding: 40px;
		    	font-size: 23px;
			}
			input {    background-color: white;
						padding: 8px;
						margin: 16px;
					    color: black;
					    border: 2px solid #4CAF50; /* Green */}
			a{font-size: 29px;}
		</style>
	</head>
	<body style="background-image:url('https://images.unsplash.com/photo-1451187580459-43490279c0fa?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=600&q=60');
	 background-repeat:non-repeat;background-size:cover;">


		<form action="admin.php?modify=true" method="post">
      Product_name: <br><input type="text" name="pname"><br>
      Bar_code: <br><input type="text" name="barCode"><br>
      Picture: <br><input type="text" name="picture"><br>
      Price: <br><input type="number" step="0.01" name="price"><br>
      Brand_name: <br><input type:"text" name="bname"><br>
      Description: <br><input type:"text" name="description"><br>
      Size: <br><input type:"number" name="size"><br>
			<input type="submit" name="modify" value="modify">

		</form>;


	</body>
</html>
