<?php
  error_reporting(0);
  //Server side code for user authentication
  /*Status Code and Meanings:
     0 : Code hasn't executed
    -1 : Database connection error
     1 : Authentication successful, access granted
     2 : Authentication failed, access denied
     3 : Invalid request method, only POST is allowed
  */
  //Response Array
  $response = array('status' => 0);
  if(isset($_POST) && !empty($_POST["user_name"]))
  {
    //Creating Database Connection
    $servername = "localhost"; //replace with your hostname
    $username = "root"; //replace with your database username
    $password = ""; //replace with your database password
    $dbname = "login_modules"; //replace with your database name
    $con = mysqli_connect($servername,$username,$password,$dbname);
    if(!$con)
    {
      $response['status'] = -1;
      $response['message'] = mysqli_connect_error();
    }
    else
    {
      //fetching form data & querying database for authentication
      $user_name = mysqli_real_escape_string($con,$_POST["user_name"]);
      $user_password = mysqli_real_escape_string($con,$_POST["user_password"]);
      $sql = "select * from users where user_name='$user_name' and user_password=PASSWORD('$user_password')";
      $result = mysqli_query($con,$sql);
      if(mysqli_num_rows($result)>0)
      {
        $response["status"] = 1;
        $response["url"] = "dashboard"; //set this to your target url after successful authentication
        $response["message"] = "access granted";
        session_start();
        $_SESSION["logged"] = session_id();
      }
      else
      {
        $response["status"] = 2;
        $response["message"] = "access denied";
      }
    }
  }
  else
  {
    //Invalid Request Method
    $response["status"] = 3;
    $response["message"] = "invalid request method (only POST is allowed)";
  }
  die(json_encode($response));
?>
