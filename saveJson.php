<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
/**
 * Created by PhpStorm.
 * User: Simon_
 * Date: 14-12-2017
 * Time: 12:11
 */

//this is just a test, not sure if this will work




$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "explorecalifornia";

//This will write a txt file to the server, and the user will be able to download it, this isnt formatted as proper Json,
//But this was just to show i was able to save a file, and let the user download it.

$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");


// Create connection

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// SQL Statement for getting data from the tours table
$sql = "SELECT * FROM tours";


$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {


        $stringData = $row['tourId'] . "\t";
        $stringData = $stringData . $row['packageId'] . "\t";
        $stringData = $stringData . $row['tourName'] . "\t";
        $stringData = $stringData . $row['blurb'] . "\t";
        $stringData = $stringData . $row['description'] . "\t";
        $stringData = $stringData . $row['price'] . "\t";
        $stringData = $stringData . $row['difficulty'] . "\t";
        $stringData = $stringData . $row['graphic'] . "\t";
        $stringData = $stringData . $row['length'] . "\t";
        $stringData = $stringData . $row['keywords'] . "\t";
        fwrite($myfile,$stringData);




//        echo "title: " . $row["title"] . " - url: " . $row["url"] . " - category: " . $row["category"] . "<br>";
//        echo "id: " . $row["user_id"]. " - Name: " . $row["email"]. "<br>";
    }
} else {
    echo "0 results";
}

echo "xd;";

fclose($myfile);
?>
<h1>You can download the json file as a .txt</h1>

<a href="newfile.txt" download="newfile.txt"> CLICK HERE</a>
</body>
</html>