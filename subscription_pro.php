<?php
$servername = "localhost";
$username= "root";
$password= "";
$dbase="subscribers";
$conn = mysqli_connect($servername, $username, $password, $dbase);
if($conn){//test the connection
    echo "connection successful";

}else{
    die("connection failed". mysqli_connect_error());
}
$sq1="CREATE TABLE IF NOT EXISTS subscribers
      ( SN INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
         FULLNAME VARCHAR(50) NOT NULL,
         EMAIL VARCHAR(100) NOT NULL,
         DT DATE NULL)";
         
         if(mysqli_query($conn,$sq1)){
             echo "table has been created". "<br><br>";

         }else{
             echo "could not create the table".mysqli_error($conn);

         }
         $fn = $_POST["nm"];
         $email = $_POST["email"];
         $d=date("y-m-d");

         $sq2 = "INSERT INTO subscribers (FULLNAME, EMAIL, DT)
         VALUES('$fn', '$email', '$d')";
         if(mysqli_query($conn,$sq2)){
             echo "Table update succesfull"."<br>";

         }else{
             echo "Table could not be updated".mysqli_error($conn);
         }
         mysqli_close($conn);
         ?>