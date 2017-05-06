<?php

  require('db_connection.php');
  require('db.php');

  $action = filter_input(INPUT_POST, "action");
  if($action == NULL)
  {
    $action = "show_login_page";
  }
  if($action == "show_login_page")
  {
    include('login.php');
  }  else if($action == 'test_user')
  	{
	  $username = $_POST['reg_uname'];
	  $password = $_POST['reg_password'];
	  $suc = isUserValid($username,$password);
	  if($suc === true)
	  {
	    $result = getTodoItems($_COOKIE['my_id']);
	    include('list.php');


	  } elseif($suc === 'Email Exists') {
	  	echo 'Email correct. Incorrect Password';
	  } elseif($suc === 'Email not found') {
          echo 'User not found';
      }
	  else {
	  	// echo "wrong login and password";
	  	   header("Location: badInfo.php");
	         }
		 }
		  else if ($action == 'registrar')
             {
              // echo " we want to create a new account";
              $name = filter_input(INPUT_POST, 'user_emailid');

	      if(isset($name))
	        {
		 $firstname= filter_input(INPUT_POST, 'user_firstname');
		 $lastname= filter_input(INPUT_POST, 'user_lastname');
		 $mobilenumber= filter_input(INPUT_POST, 'user_pnumber');
		 $pass = filter_input(INPUT_POST, 'user_password');
		 $birthday= filter_input(INPUT_POST, 'bday');
		 $gender= filter_input(INPUT_POST, 'gender');
		 $exists = createUser($name, $pass,$firstname, $lastname,$mobilenumber, $birthday, $gender);
		  if($exists == true)
		   {
			header("location: user_exists.php");

		   }else {

		          header("Location: login.php");
		         }
		}
	     } 						
	      else if ($action == 'Add')
	     {
	       if (($_POST['todo_item'] AND $_POST['todo_item']))
	         {
		   adddescription( $_COOKIE['my_id'], $_POST['todo_item'], $_POST['description'], $_POST['date_of_entry'], $_POST['time_of_entry']);
		 }
		 $result = getTodoItems($_COOKIE['my_id']);
		 include('list.php');
	     }else if ($action == 'delete')
	         {
		  if(isset($_POST['item_id']))
		   {
		    $selected = $_POST['item_id'];
		    deletedTodoItems($_COOKIE['my_id'], $selected);
		   }
		 $result = getTodoItems($_COOKIE['my_id']);
		 include ('list.php');    
           } else if($action == 'edit'){
				$result = getTodoItem($_POST['id']);
  				include('editdata.php');
		  }
?>
