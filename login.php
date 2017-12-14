<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login page</title>
</head>
<body>
<form method="post" action="login.php">

    <label> Username </label>
    <input name="inputUsername">
    <br>
    <label> Password </label>
    <input name="inputPassword">
    <br>
    <button>Login</button>

</form>


<?php


$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "explorecalifornia";

// variable to store username and password? idea for now
$admin = $_POST["inputUsername"];
$adminPassword = $_POST["inputPassword"];



$sqlAdmin = "";
$sqlPassword = "";


// Create connection

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// SQL Statement for getting data from the tours table
$sql = "SELECT * FROM admin";


$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {

        // saving sql data into variable
        $sqlAdmin = $row['userName'];
        $sqlPassword = $row['password'];

    }
} else {
    echo "0 results";
}

echo "input var = " . $admin . "<br>" . $adminPassword;
echo "<br>";
echo "sql data:" . $sqlAdmin . "<br>" . $sqlPassword;

//check if user info matches
if ($admin == $sqlAdmin && $adminPassword == $sqlPassword){
    //correct password will send you to this page
    header("Location: http://dr.dk");

}
else{
    //wrong password can be handle here
//   echo "wrong password";

   // not really, this will execute always (will execute even before input)
}


?>


</body>
</html>