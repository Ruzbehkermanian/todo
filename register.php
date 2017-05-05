<html>
<body>

<div class="login_text">
    <h1> Create a New Account </h1> </div>
  <form method = 'post' action ='index.php'>
 

 <link rel="stylesheet" type = "text/css" href="./main.css">


      <div class ="login">
          <table>
              <tr>
                  <td><label> First Name: </label></td>
                  <td><input type='text'name='user_firstname' value=""/></br></br></td>
              </tr>

              <tr>
                  <td><label> Last Name: </label> </td>
                  <td><input type='text' name='user_lastname' value=""/></br></br></td>
              </tr>

              <tr>
                  <td><label> Mobile number: </label> </td>
                  <td><input type="number" name="user_pnumber" /></br></br></td>
              </tr>


              <tr>
                  <td><label> Email Id: </label> </td>
                  <td><input type='text'name='user_emailid' value="" placeholder="This is your username" /><br><br></td>
              </tr>

              <tr>
                  <td><label> Birthday: </label></td>
                  <td><input type="date" name="bday"/></br></br></td>
              </tr>

              <tr>
              <td><label> Password: </label> </td>
              <td><input type="password" name="user_password" /></br></br></td>
              </tr>


              <tr>
                  <td> <Label> Gender </Label></td>
                  <td><input type="radio" name="gender" value="male"> Male
                      <input type="radio" name="gender" value="female"> Female<br></br></td>
              </tr>


          </table>




  <input type ="hidden" name="action" value ="registrar">
  <input type='submit' value='register'>

  <form action="login.php" method='post'>
  <input type='submit' value='try to login'>
  </form>
  </form>
</div>

</body>
</html>
