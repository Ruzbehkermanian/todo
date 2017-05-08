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
  }  else if($action == 'test_user')                                       // action to check user
  	{
	  $username = $_POST['reg_uname'];
	  $password = $_POST['reg_password'];
	  $suc = isUserValid($username,$password);
	  if($suc === true)
	  {
	    $result = getTodoItems($_COOKIE['my_id']);
          include('list.php');
	  }
	  elseif($suc === 'Email Exists')
      {
         include("login_error.php");

	  }
	  elseif($suc === 'Email not found') {

       include('login_user_missing.php');

      }
	  else {

          include("index.php");
          include('login_user_error.php');
          print 'Username and Password combination is not present';

           }
    }
		  else if ($action == 'registrar')                              // action of registering
             {
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
	      else if ($action == 'Add')                                // action of adding
	     {
	       if (($_POST['todo_item'] AND $_POST['todo_item']))
	         {
		   adddescription( $_COOKIE['my_id'], $_POST['todo_item'], $_POST['description'], $_POST['date_of_entry'], $_POST['time_of_entry']);
		 }
		 $result = getTodoItems($_COOKIE['my_id']);
		 include('list.php');
	     }else if ($action == 'delete')                                 // action of deleting
	         {
		  if(isset($_POST['item_id']))
		   {
		    $selected = $_POST['item_id'];
		    deletedTodoItems($_COOKIE['my_id'], $selected);
		   }
		 $result = getTodoItems($_COOKIE['my_id']);
		 include ('list.php');    
           } else if($action == 'edit') {                                // action of editing
              $edit = $_POST['edit_id'];
              $result = getTodoItem($_POST['edit_id']);
              include('editdata.php');
          }

          else if($action == 'Edit') {

              $id = $_POST['ID'];

             updateTodoItem($_COOKIE['user_id'], $_POST['todo_item'], $_POST['description'], $_POST['date_of_entry'], $_POST['time_of_entry'], $id);
              $result = getTodoItems($_COOKIE['my_id']);
                    include('list.php');
				}


?>
