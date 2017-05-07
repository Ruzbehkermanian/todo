

<html>
<head>

    <link rel="stylesheet" href="main.css">
</head>
<body>
<div class="login-page">
    <div class="form">
        <form class="login-form" action="index.php" method="post">
            <input  type='text'name='todo_item' placeholder="Todo Item" maxlength="40"/>
            <input  type='text' name='description' placeholder="Description"/>
            <input type="date" name='date_of_entry' placeholder="Date of Entry"/>
            <input type='time'name='time_of_entry' value="" placeholder="Time of Entry"/>

            <input type="hidden" name="action" value="Add">
        <button>Add</button>
        </form>
    </div>
</div>
</body>
</html>