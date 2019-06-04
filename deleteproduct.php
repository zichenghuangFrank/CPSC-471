<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
?>
<html>
	<head>
		<title>delete Product</title>
		<style type="text/css">
			body {background-color: grey;font-size: 28px;}
			form {	/* Container */
				 margin-left: auto;
				 margin-right: auto;
				 margin-top: 180px;
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
		<form action="admin.php?delete=true" method="post">
      		Bar_code: <input type="text" name="barCode"><br>
			<input type="submit" name="delete" value="delete">
		</form>
	</body>
</html>
