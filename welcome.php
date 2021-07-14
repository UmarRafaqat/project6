<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;

  }
 
// // Include config file
// require_once "valueconfig.php";
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'form values');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

  $dishName=$_POST["dishName"];
  $userName=$_POST["namee"];
  $guestsNo=$_POST["guests"];
  $venuDate=$_POST["Date"];
  $phone=$_POST["phone"];
  $address=$_POST["address"];
  $dishPrice=['100','150','200'];
echo $dishName;
//   $chkStr1= implode('$dishName');
// echo $chkStr1;

$sql = "INSERT INTO booking info
VALUES ('$venuDate',' $guestsNo', '$userName', '$address', '$phone', '$chkStr1','$dishPrice')";

if(!mysqli_query($link,$sql)){
  echo"Not Inserted";
}
else{
  echo"inserted";
}
?>
 <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="style.css" />
    <script >
   
    </script>
    <title>Modal window</title>
  </head>
  <body>
    <h1 class="my-5">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1>
    <br>
    <p>
        <a href="reset-password.php" class="btn btn-warning" >Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger ml-3">Sign Out of Your Account</a>
    </p>
    <br>
    <form action="" method="post" class="book">
      <label >Booking date</label>

      <input type="date" name="Date" id="date">
      
      <label for="person">No Of Guests</label>
      <input type="text" name="guests" class="person" >
      <h1>Customer Information</h1>
      
      <label>Name</label>
      <input type="text" name="namee">
      
      <label >Address</label>
      <input type="text" name="address">
      <label >Phone</label>
      <input type="tel" name="phone" id="">
      
      
      <h2>Dishes List</h2>
      
        <section >
          
          <table>
            <tr>
              <th>Select Dishes</th>
              <th>Price PerHead</th>
            </tr>
            <tr>
              <td><input type="checkbox" name="dishName[]" >
                <label >Moton</label></td>
                <td><li value="150" >150</li></td>
              </tr>
              <tr>
              <td><input type="checkbox" name="dishName[]" >
                <label >Baryani</label></td>
                <td><li value="250" >250</li></td>
              </tr>
              <tr>
              <td><input type="checkbox" name="dishName[]" >
                <label >Karahi</label></td>
                <td><li value="350" >350</li></td>
              </tr>
              
                  
                </table>
                
              </section>
              
            </section>
            <!-- total section start -->
            
            <br>
            <section class="total-sec">
              <label>Total</label>
              
              <input type="button" value="Delete" class="dlt btn"  onClick='Delete()'>
              <ol id="item-list">
              </ol>
            </section>
            
            <br>
            <button type="submit" onclick="addList()"> submit</button>
          </form> 
        <br>
          <button class="show-modal" >Show Bill</button>
          
      
          <div class="modal hidden">
            <button class="close-modal">&times;</button>
            <h1 >I'm a modal window </h1>
            <p>Your Dishes </p>
          </div>
          <div class="overlay hidden"></div>
      

    <script src="script.js"></script>
  </body>
</html>
