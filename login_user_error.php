

<html>
<head>

    <link rel="stylesheet" href="main.css">
</head>
<body>
<div class="login-page">
    <div class="form">
        <p class="message">Wrong Username, Please try again by entering the correct username</p>
        <form class="login-form" action="index.php" method="post">
            <input type="text" name="reg_uname" placeholder="username" required/>
            <input type="password" name="reg_password" placeholder="password" required/>
            <input type="hidden" name="action" value="test_user">
            <button>login</button>
            <p class="message">Not registered? <a href="register.php">Create an account</a></p>
        </form>
    </div>
</div>
</body>
</html>



