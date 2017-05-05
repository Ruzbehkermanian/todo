<?php
  
    function addTodoItem($user_id,$todo_text)  				// Add Data to the User
    {
    global $db;
    $query = 'insert into todos(user_id,todo_item) values (:userid,:todo_text)';
    $statement = $db->prepare($query);
    $statement->bindValue(':userid',$user_id);
    $statement->bindValue(':todo_text',$todo_text);
    $statement->execute();
    $statement->closeCursor();
    }

    function deletedTodoItems($user_id,$todo_text)			// Delete Data from the user
    {
    global $db;
    $query = 'delete from todos where user_id = :user_id )';
    $statement = $db->prepare($query);
    $statement->bindValue(':userid',$user_id);
    $statement->bindValue(':todo_text',$todo_text);
    $statement->execute();
    $statement->closeCursor();
    }

    function getTodoItems($user_id)					// Fetch Data for the user
    {
    global $db;
    $query = 'select * from todos where user_id = :userid';
    $statement = $db->prepare($query);
    $statement->bindValue(':userid',$user_id);
    $statement->execute();
    $result = $statement->fetchAll();
    $statement->closeCursor();
    return $result;
    } 
  

     function isUserValid($username, $password)					// Check if Valid User is selected from the Database
     {
     global $db;
     $query = 'select * from users where username = :name and passwordHash = :pass';
     $statement = $db->prepare($query);
     $statement->bindValue(':name', $username);
     $statement->bindValue(':pass', $password);
     $statement-> execute();
     $result = $statement->fetchAll();
     $statement->closeCursor();

     $count = $statement->rowCount();

     $email_exists = 'select * from users where username = :name';
     $statement = $db->prepare($email_exists);
     $statement->bindValue(':name',$username);
     $statement->execute();
     $result = $statement->fetchAll();
     $statement->closeCursor();
     $num = $statement->rowCount();

     if($count ==1){
       setcookie('login',$username);
       setcookie('my_id',$result[0]['id']);
       setcookie('islogged',true);
       return true;
       } elseif ($count!=1 && $num==1) {
         unset($_COOKIE['login']);
         setcookie('login', false);
         setcookie('islogged', false);
         setcookie('id', false);
         return 'Email Exists';
     }
       elseif ($count!=1 && $num==0) {
        unset($_COOKIE['login']);
	setcookie('login', false);
	setcookie('islogged', false);
	setcookie('id', false); 
	return 'Email not found';
	     }
	     
      }


      function checkuser($username)
      {
          global $db;


      }

      function createUser( $username, $password, $firstname, $lastname, $mobilenumber, $dateofbirth, $gender) 	// Create New User if already not present
      {
	global $db;
	$query = 'select * from users where username = :name';
	$statement = $db->prepare($query);
	$statement->bindValue(':name',$username);
	$statement->execute();
	$result = $statement->fetchAll();
	$statement->closeCursor();
	$count = $statement->rowCount();
	if($count > 0)
	{
		return true;
	}
	else {
      $query = 'insert into users (username, passwordHash, firstname, lastname, mobilenumber, dateofbirth,	
      gender) values (:username, :passwordHash, :firstname, :lastname, :mobilenumber, :dateofbirth, :gender)';	// insert new user data in database.
     $statement = $db->prepare($query);
     $statement->bindValue(':username', $username);
     $statement->bindValue(':passwordHash', $password);
     $statement->bindValue(':firstname', $firstname);
     $statement->bindValue(':lastname', $lastname);
     $statement->bindValue(':mobilenumber', $mobilenumber);
     $statement->bindValue(':dateofbirth', $dateofbirth);
     $statement->bindValue(':gender', $gender);
     $statement->execute();
     $result = $statement->fetchAll();
     $statement->closeCursor();
     return false;
             }

      }
?>

