<html>
<body>

  <h1> Create a New Account </h1>
  <form method = 'post' action ='index.php'>
 

 <link rel="stylesheet" type = "text/css" href="./main.css">
  
  <label> First Name: </label> <input type='text'name='user_firstname' value=""/></br></br>
  <label> Last Name: </label> <input type='text' name='user_lastname' value=""/></br></br>
  <label> Mobile number: </label><input type="number" name="user_pnumber" /></br>
  <label> Email Id: </label> <input type='text'name='user_emailid' value="" placeholder="This is your username" /><br><br>
  <label> Birthday: </label>  <input type="date" name="bday"/></br>
  <label> Password: </label> <input type="password" name="user_password" /></br></br>
  <label> Gender:</label>
  
  <input type="radio" name="gender" value="male"> Male
  <input type="radio" name="gender" value="female"> Female<br>
  <input type ="hidden" name="action" value ="registrar">
  <input type='submit' value='register'>
  </form>

  <form action="login.php" method='post'>
  <input type='submit' value='try to login'>
  </form>

</body>
</html>
