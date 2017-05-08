

<html>
<head>

    <?php   echo " <h3> Welcome, ". $_COOKIE['login'] .' <br/>';?>
    <form align="right" action="login.php">
        <input type="submit" value="Logout" style="color:brown;class="button">

    </form>

    <?php

    echo " <h3> Below you may find your to-do items </h3><br/><br/>";
        ?>

    <form action='add_description.php'>
        <label> Add a new item:   </label>
        <input type="submit" value="Add" align="left" style="color:blue;"/> <td><br></td> <td><br></td>
    </form>

   <link rel="stylesheet" href="main.css">

</head>

<body>

<h3 align="center" style="color:red;"> INCOMPLETE TODO ITEMS </h3>

<table style="width:80%">

      <tr>

          <th align="left">ToDo Item</th>
          <th align="left">Description</th>
          <th align="left">Date of Entry</th>
          <th align="left">Time of Entry</th>


      </tr>

      <?php foreach($result as $res):?>
          <tr>
          <td><?php echo $res['todo_item']. '<br/>';?></a></td>
              <td><?php echo $res['description']. '</br>'; ?></td>
              <td><?php echo $res['date_of_entry']. '</br>'; ?></td>
              <td><?php echo $res['time_of_entry']. '</br>'; ?></td>
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

              <td>
                  <form action='index.php' method='post'>
                      <input type='hidden' name='item_id' value='<?php echo $res['id'] ?>'>
                      <input type='hidden' name='action' value='complete'; >
                      <input type='submit' value="complete">
                  </form>
              </td>


          </tr>


<?php endforeach; ?>

</table>



<tr>
    <td><br></td>
    <td><br></td>

</tr>

<h3 align="center" style="color:green;"> COMPLETE TODO ITEMS</h3>

<table style="width:60%">

    <tr>

        <th align="left">ToDo Item</th>
        <th align="left">Description</th>
        <th align="left">Date of Entry</th>
        <th align="left">Time of Entry</th>


    </tr>

    <?php foreach($result as $res):?>
        <tr>
            <td><?php echo $res['todo_item']. '<br/>';?></a></td>
            <td><?php echo $res['description']. '</br>'; ?></td>
            <td><?php echo $res['date_of_entry']. '</br>'; ?></td>
            <td><?php echo $res['time_of_entry']. '</br>'; ?></td>

           <!-- <td>
                <form action='index.php' method='post'>
                    <input type='hidden' name='item_id' value='<?php /*echo $res['id'] */?>'>
                    <input type='hidden' name='action' value='incomplete'; >
                    <input type='submit' value="incomplete">
                </form>
            </td>-->
        </tr>

    <?php endforeach; ?>

</table>
</body>
</html>


