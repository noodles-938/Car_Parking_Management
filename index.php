<?php

//Connecting Server to database
$servername = "localhost";
$username = "root";
$password = "";
$database = "parking";

//Create a connection
$conn = mysqli_connect($servername,$username,$password,$database);
//Die if connection was not successful
if(!$conn){
    die("Sorry we failed to connect:". mysqli_connect_error());
}else{
  echo "Connection is Successful";
}
if ($_SERVER['REQUEST_METHOD'] == 'POST'){

  $owner = $_POST['owner'];
   $car = $_POST['car'];
   $license = $_POST['license'];
   $entryDate = $_POST['entryDate'];
   $exitDate = $_POST['exitDate'];



  $sql ="INSERT INTO `parking` (`SNo`, `Owner`, `Car`, `License Plate`, `Entry Date`, `Exit Date`) VALUES (NULL, '$owner', '$car', '$license', '$entryDate', '$exitDate')";
$result = mysqli_query($conn,$sql);

//Add a new trip to the Trip table in the database
if($result){
    echo "The record has been inserted  successfully";
}
else{
    echo "The record was not inserted successfully because of this error --->". mysqli_error($conn);
}

}

?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Parking Lot Management</title>
  </head>
  <style>
    body{
      color: black;
      background-color: green;
    }
  </style>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Parking Lot Management</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <form class="d-flex">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>


      <div class="container">
        <form action="/parking/index.php" method="POST">
            <div class="form-group mb-3 my-4">
              <label for="owner">Owner</label>
              <input type="text" class="form-control" id="owner" name="owner" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
              <label for="car">Car</label>
              <input type="text" class="form-control" id="car" name="car" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
              <label for="licence">License Plate</label>
              <input type="text" class="form-control" id="licence" name="licence" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
              <label for="entryDate">Entry Date</label>
              <input type="date" class="form-control" id="entryDate" name="entryDate" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
              <label for="exitDate">Exit Date</label>
              <input type="date" class="form-control" id="exitDate" name="exitDate" aria-describedby="emailHelp">
            </div>
            <button type="submit" class="btn btn-primary">Add Car</button>
    </form>
      </div>


  


      </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>