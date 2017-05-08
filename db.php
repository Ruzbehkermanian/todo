<?php
  
    function addTodoItem($user_id,$todo_text)  		// Add Data to the User
    {
    global $db;
    $query = 'insert into todos(user_id,todo_item) values (:userid,:todo_text)';
    $statement = $db->prepare($query);
    $statement->bindValue(':userid',$user_id);
    $statement->bindValue(':todo_text',$todo_text);
    $statement->execute();
    $statement->closeCursor();
    }

    function deletedTodoItems($user_id,$todo_id)	// Delete Data from the user
    {
    global $db;
    $query = 'delete from todos where user_id = :user_id AND id= :todo_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':user_id',$user_id);
    $statement->bindValue(':todo_id',$todo_id);
    $statement->execute();
    $statement->closeCursor();
    }

    function getTodoItems($user_id)			// Fetch Data for the user
    {
    global $db;
    $query = 'select * from todos where user_id = :userid order by date_of_entry,time_of_entry asc';
    $statement = $db->prepare($query);
    $statement->bindValue(':userid',$user_id);
    $statement->execute();
    $result = $statement->fetchAll();
    $statement->closeCursor();
    return $result;
    } 

    function isUserValid($username, $password)		// Check if Valid User is selected from the Database
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

     $u_name = $result[0]['firstname'].' '.$result[0]['lastname'];

     if($count ==1){
       setcookie('login',$u_name);
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

    function createUser($username, $password, $firstname, $lastname, $mobilenumber, $dateofbirth, $gender) // Create New User if already not present
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

    function adddescription($userid, $todo_item ,$description, $date_of_entry, $time_of_entry)
    {
        global $db;
        $query ='insert into todos (user_id,todo_item, description, date_of_entry, time_of_entry) values (:user_id,:todo_item, :description, :date_of_entry, :time_of_entry)';
        $statement = $db-> prepare($query);
        $statement->bindValue(':user_id', $userid);
        $statement->bindValue(':todo_item', $todo_item);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':date_of_entry', $date_of_entry);
        $statement->bindValue(':time_of_entry', $time_of_entry);
        $statement-> execute();
        $statement->closeCursor();

    }

    function getTodoItem($id)		// Fetch Data for the user for edit use
{
    global $db;
    $query = 'select * from todos where id = :id';
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->execute();
    $result = $statement->fetchAll();
    $statement->closeCursor();
    return $result;
}

    function updateTodoItem($user_id, $todo_item, $description, $date_of_entry, $time_of_entry, $id)      // Edit the data and update accordingly
    {
        global $db;
        $query = 'UPDATE todos SET user_id = :user_id, todo_item = :todo_item, description = :description, date_of_entry = :date_of_entry, time_of_entry = :time_of_entry WHERE id = :id';
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->bindValue(':user_id', $user_id);
        $statement->bindValue(':todo_item', $todo_item);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':date_of_entry', $date_of_entry);
        $statement->bindValue(':time_of_entry', $time_of_entry);
        $statement->execute();
        $statement->closeCursor();
        $result = $statement->fetchAll();
       
    }


?>
