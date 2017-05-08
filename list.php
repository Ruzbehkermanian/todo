

<html>
<head>

    <form align="right" action="login.php">
        <input type="submit" value="Logout" class="button"> </form>
    <?php
   // echo "<h2> To Do list system  </h2><br/><br/>";


    echo " <h3> Welcome, ". $_COOKIE['login'] .' <br/>';
    echo " <h3> Below you may find your to-do items </h3><br/><br/>";
        ?>

    <form action='add_description.php'>
        <label> Add a new item</label>
        <input type="submit" value="Add" align=""/>
    </form>

   <link rel="stylesheet" href="main.css">

</head>

<body>


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
              <td> <form action='index.php' method='post'>
                  <input type='hidden' name='edit_id' value='<?php echo $res['id']; ?>'>
                  <input type='hidden' name='action' value='Edit'; >
                  <input type='submit' value="Edit">
                  </form></td>

              <td>
                  <form action='index.php' method='post'>
                      <input type='hidden' name='item_id' value='<?php echo $res['id'] ?>'>
                      <input type='hidden' name='action' value='delete'; >
                      <input type='submit' value="delete">
                  </form>
              </td>

          </tr>


<?php endforeach; ?>

</table>
</body>
</html>


