<?php
//This is a simple form for user sign up
$userFirstName = $_POST["username"];
$userLastName = $_POST["username"];
$password = $_POST["password"];
$email = $_POST["email"];
$id = $_POST["id"];
$phonenumber = $_POST["phonenumber"];


// These are info needed to connect to the database
$databaseServerName = "localhost:3306";
$databaseUserName = "1d22274795_isconnect";
$databaseUserPassword = "Ipamuslis2@is";


//These code below is use to create connection to our student database
$connection = mysqli_connect($databaseServerName $databaseUserName $databaseUserPassword)


//the code below is use to check if we have successfull connected to the database
if (!$connection){
   die("Cannot connect to the database" . mysqli_connection _error);

}

echo  "connected to database successfully";

//setting the sql query to writeon the STUDENT table
sql="INSERT INTO STUDENT VALUES(" . $userFirsName .","$userLastName .",". $password .","$email .","$id .","$phonenumber .")";

//attempting to write on the STUDENT table
if(mysqli_query($conn,$sql)){

    echo "new data insert into table successfully";

  } esle

  echo "Error:" .$sql .mysqli_error($conn);

}

//closing the connection to the database
mysqli_close($conn);

//redirecting user to the login page
header('Location: https://github.dev/Emrysisata/is_connect/blob/main/index.html');
exit;
 
?>
