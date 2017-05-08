

<html>
<head>

    <link rel="stylesheet" href="main.css">
</head>
<body>
<?php foreach ($result as $res):?>


<div class="login-page">
    <div class="form">
        <form class="login-form" action="index.php" method="post">
            <input type="text" name='todo_item' value="<?php echo $res['todo_item'];?>" maxlength="40"/>
            <input type="text" name='description' value="<?php echo $res['description'];?>">
            <input type="date" name="date_of_entry" value="<?php echo $res['date_of_entry'];?>">
            <input type="time" name="time_of_entry" value="<?php echo $res['time_of_entry'];?>">
            <input type="hidden" name="ID" value="<?php echo $res['id'];?>">
            <input type="hidden" name="action" value="Edit">
            <button>Edit</button>
        </form>

        <?php endforeach;?>
    </div>
</div>
</body>
</html>


