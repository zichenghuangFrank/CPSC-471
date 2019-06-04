<!DOCTYPE html>
<html>
  <head>
    <style type="text/css">
      body {
          background-image: url("https://images.unsplash.com/photo-1497506928652-500166625d53?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=600&q=60");
           background-size: cover;
      background-repeat: no-repeat; height = 100%;}
      form { position: fixed;
          top: 35%;
          left: 37.5%;
          font-size: 25px;
          border-style: groove;
            border-width: 3px;
            background-color: rgb(63,132,155);
            opacity: 0.75;
            }
      th, td{
          padding: 20px;
          font-size: 25px;
      }
      input {   background-color: white;
              color: black;
              border: 2.4px solid rgb(129, 125, 55); }

    </style>
    <title>userLogin</title>
  </head>
  <body>

    <form action="search.php?login=true" method="post">
      <table>
          <tr>
            <td><label>User ID</label>
        <td><input type="text" name="log_id" autocomplete="off"></td>
      </tr>
      <tr>
          <td><label>Password</label>
          <td><input type="password" name="log_pwd" autocomplete="off"></td>
      </tr>
      <tr>
        <td td  >
        <a href="index.php"><button>Cancel</button></a>
        </td>
        <td  align="right">
        <input type="submit" name="Sign up">
        </td>

      </tr>
    </form>
  </body>
</html>
