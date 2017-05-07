<?php

  echo "<h2> To Do list system </h2>";
  echo " <h3> Welcome, ". $_COOKIE['login'] .' <br/>';
  echo " <h3> Below you may find your to-do items </h3><br/><br/>";
?>

<html>
<head>
   <link rel="stylesheet" href="main.css">
    <style>
        table, th, td {
            border: 1px solid black;
            background-color: #f1f1c1;
        }
    </style>

    <button class='btn btn-primary pull-right'>
        <form align="right" action="login.php">
            <input type="submit" value="Logout" class="button"> </form></button>

</head>

<body>


<tr>
    <td>

        <form class=".top">
            <h2>To Do List System</h2>
        </form>
    </td>
</tr>
<header> </header>

<table style="width:80%">

      <tr>
          <th>ToDo Item</th>
          <th>Description</th>
          <th>Date of Entry</th>
          <th>Time of Entry</th>
      </tr>

      <?php foreach($result as $res):?>
          <tr>
          <td><a href='detail.php'><?php echo $res['todo_item']. '<br/>';?></a></td>
              <td><?php echo $res['description']. '</br>'; ?>'</td>
              <td><?php echo $res['date_of_entry']. '</br>'; ?>'</td>
              <td><?php echo $res['time_of_entry']. '</br>'; ?>'</td>

          </tr>

          <td>
              <form action='index.php' method='post'>
                  <input type='hidden' name='edit_id' value='<?php echo $res['id']; ?>'>
                  <input type='hidden' name='action' style="float: right" value='Edit'; >
                  <input type='submit' value="Edit">
              </form>
          </td>

          <td>
	   <form action='index.php' method='post'>
	   <input type='hidden' name='item_id' value='<?php echo $res['id'] ?>'>
	   <input type='hidden' name='action' style="float: right" value='delete'; >
	   <input type='submit' value="delete">
	   </form>
	     </td>

<?php endforeach; ?>

</table>

   <form action='add_description.php'>
   <label> Add a new item</label>
    <input type="submit" value="Add"/>
    </form>
</body>
</html>


