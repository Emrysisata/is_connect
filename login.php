<?php
//reading the data sent to the server for login
$password = $_POST["password"];
$email = $_POST["email"];
$rememberLogincheckBox = $_POST["rememberLogincheckBox"];



// These are info needed to connect to the database
$databaseServerName = "";
$databaseUserName = "";
$databaseUserPassword = "";


//These code below is use to create connection to our student database
$connection = mysqli_connect($databaseServerName $databaseUserName $databaseUserPassword)


//the code below is use to check if we have successfull connected to the database
if (!$connection){
   die("Cannot connect to the database" . mysqli_connection _error);

}

echo  "connected to database successfully";

//setting the sql query to read from the database tocheck if user login details is correct
sql="SELECT * FROM STUDENT WHERE EMAIL = " + $email + " AND PASSWORD = " + $password;

//attempting to read on the STUDENT table
if(mysqli_query($conn,$sql)){

   //saving user details for future auto login
   saveUserLoginDetails("userEmail", $email);
   saveUserLoginDetails("userPassword", $password);

    //redirecting user to the home page
   header('Location: http://www.home.com');
   exit;

  } else{
   
   //closing the connection to the database
   mysqli_close($conn);
   
   //redirecting user to the login page
   header('Location: http://www.example.com');
   exit;

  

}

function saveUserLoginDetails($userDataName, $userDataValue){
   setcookie($userDataName, $userDataValue, time() + (86400 * 30), "/");
}

   
 
?>
