<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
            integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
            integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1"
            crossorigin="anonymous"></script>

    <link href="https://v4-alpha.getbootstrap.com/examples/sticky-footer/sticky-footer.css" rel="stylesheet">


    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" rel="stylesheet"/>


    <!--    javascript der loader datatable-->
    <script src="js/app.js"></script>


    <!--  DATA TABLE   -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/css/dataTables.bootstrap4.min.css"
          rel="stylesheet"/>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.13/js/dataTables.bootstrap4.min.js"></script>
    <title>ProgExam xD </title>
</head>
<body>


<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">ProgExam</a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="create.php">create</a>
            </li>

        </ul>
    </div>
</nav>


<h1>ProgExam</h1>
<img src="images/map_bigsur.gif">
<!--<img src="images/backpack_main.jpg">-->
<div class="container">
    <table id="example" class="table table-striped  table-bordered table-hover" cellspacing="0"
           width="100%">
        <thead>
        <tr>
            <th>Tour name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Keywords</th>
            <th>Map</th>
        </tr>
        </thead>
        <tbody>


        <?php


        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "explorecalifornia";
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


                echo "<tr>";
                echo "<td>" . $row['tourName'] . "</td>";
                echo "<td>" . $row['description'] . "</td>";
                echo "<td>" . $row['price'] . "</td>";
                echo "<td>" . $row['keywords'] . "</td>";

                //this only gets the URL for the graphic, will now try and echo and <img> inside the <td>
                //<img src="images/asterisk.gif">

//                echo "<td>" . $row['graphic'] . "</td>";
//
                $imgURL = "images/" . $row['graphic'];
                echo "<td>" . "<img src=\"images/map_bigsur.gif\"> </td>";
                echo $imgURL;


                echo "</tr>";


//        echo "title: " . $row["title"] . " - url: " . $row["url"] . " - category: " . $row["category"] . "<br>";
//        echo "id: " . $row["user_id"]. " - Name: " . $row["email"]. "<br>";
            }
        } else {
            echo "0 results";
        }

        ?>


        </tbody>
    </table>
</div>


<footer class="footer">
    <div class="container">
        <span class="text-muted">Startsiden er verdens bedste startside.</span>
    </div>
</footer>
</body>
</html>


