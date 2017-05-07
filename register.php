
<html>
<head>

    <link rel="stylesheet" href="main.css">
</head>
<body>
<div class="login-page">
    <div class="form">
        <form class="login-form" action="index.php" method="post">
            <input input type='text'name='user_firstname' placeholder="First Name" required/>
            <input input type='text' name='user_lastname' placeholder="Last Name" required/>
            <input type="number" name="user_pnumber" placeholder="Mobile Number" required/>
            <input type='text'name='user_emailid' value="" placeholder="This is your username" required/>
            <input type="date" name="bday" placeholder="Birthday" required/>
            <input type="password" name="user_password" placeholder="Password" required/>

            <input type="radio" name="gender" value="male"> Male
            <input type="radio" name="gender" value="female"> Female

            <input type="hidden" name="action" value="registrar">
            <button>Create</button>
        </form>
    </div>
</div>
</body>
</html>