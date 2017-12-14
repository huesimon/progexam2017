<?php
/**
 * Created by PhpStorm.
 * User: Simon_
 * Date: 14-12-2017
 * Time: 09:35
 */

// get the HTTP method, path and body of the request
$method = 'GET';

$request = explode('/', trim($_SERVER['PATH_INFO'],'/'));
$input = json_decode(file_get_contents('php://input'),true);

// connect to the mysql database
$link = mysqli_connect('localhost', 'root', 'root', 'explorecalifornia');
mysqli_set_charset($link,'utf8');

// retrieve the table and key from the path
$table = preg_replace('/[^a-z0-9_]+/i','',array_shift($request));

$key = array_shift($request);

// escape the columns and values from the input object
$columns = preg_replace('/[^a-z0-9_]+/i','',array_keys($input));
$values = array_map(function ($value) use ($link) {
    if ($value===null) return null;
    return mysqli_real_escape_string($link,(string)$value);
},array_values($input));


// create SQL based on HTTP method
//Denne switch bliver ikke brugt, kun fordi at det er fra et tidligere projekt
switch ($method) {
    case 'GET':
        $sql = "SELECT * FROM `$table`"; // henter alt data fra SQL
        //        $sql = "SELECT * FROM `$table`  WHERE orders.ORD_ID=" . "'" .$key . "'";
    break;
}

// excecute SQL statement
$result = mysqli_query($link,$sql);

// die if SQL statement failed
if (!$result) {
    http_response_code(404);
    die(mysqli_error());
}

//print the json object
if (!$key) echo '[';
for ($i=0;$i<mysqli_num_rows($result);$i++) {
    echo ($i>0?',':'').json_encode(mysqli_fetch_object($result));
}
if (!$key) echo ']';



// close mysql connection
mysqli_close($link);

//Denne api returnere et array af jSON objekter, man har nu mulighed for at implementere disse data i andre programmer,
// da jSON er meget universal og du kan ændre hvilket table du gerne vil have data fra f.eks =
// http://localhost/progexam2017/explore_california_api.php/tours

//med denne url for du data ud fra tours table, og det bliver vist som et json object med
// tourId, packageId, tourNAme, blurb, description, price, difficulty, graphic, length, region, keywords.

//I min api har jeg kun implanteret GET request, hvis en api er RESTful skulle man også kunne manipulere med data
// f.eks Create, Retrieve, Update, Delete (POST, GET, PUT, DELETE) men da denne opgave kun skulle vise json data, valgte jeg kun at impamentere GET
