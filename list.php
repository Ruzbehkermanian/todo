<?php
  echo "<h1> To Do list system<h1>";
  echo "Welcome, ". $_COOKIE['login'] .' <br/>';
  echo " Below you may find your to-do items <br/><br/>";
?>

<html>
<head>

</head>

<body>
<header> <p align="right"><a href="logout.php" > Logout</a ></p></header>
  <table>
      <?php foreach($result as $res):?>
      <tr>
         <td><a href='detail.php'><?php echo $res['todo_item']. '<br/>';?></a></td>
          <td><?php echo $res['description']. '</br>'; ?>'</td>
          <td><?php echo $res['date_of_entry']. '</br>'; ?>'</td>
          <td><?php echo $res['time_of_entry']. '</br>'; ?>'</td>

          <td>
              <form action='index.php' method='post'>
                  <input type='hidden' name='edit_id' value='<?php echo $res['id']; ?>'>
                  <input type='hidden' name='action' value='Edit'>
                  <input type='submit' value="Edit">
              </form>
          </td>
	 <td>
	   <form action='index.php' method='post'>
	   <input type='hidden' name='item_id' value='<?php echo $res['id'] ?>'>
	   <input type='hidden' name='action' value='delete'>
	   <input type='submit' value="delete">
	   </form>
	  </td>

      </tr>
        <?php endforeach; ?>


   </table>
    
   <form action='add_description.php'>
    <input type="submit" value="Add"/>
    </form>
</body>
</html>


