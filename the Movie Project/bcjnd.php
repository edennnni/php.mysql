<?php
include_once('config.php');

if (isset($_POST['submit'])) {
    $movie_desc = $_POST['movie_desc'];
    $movie_quality = $_POST['movie_quality'];
    $movie_rating = $_POST['movie_rating'];
    $movie_name = $_POST['movie_name'];
    $movie_image = $_POST['movie_image'];

    $sql = "INSERT INTO movies (movie_name, movie_desc, movie_quality, movie_rating, movie_image)
            VALUES (:movie_name, :movie_desc, :movie_quality, :movie_rating, :movie_image)";

    $insertMovie = $db->prepare($sql); // use $db if using Option 2

    $insertMovie->bindParam(":movie_name", $movie_name);
    $insertMovie->bindParam(":movie_desc", $movie_desc);
    $insertMovie->bindParam(":movie_quality", $movie_quality);
    $insertMovie->bindParam(":movie_rating", $movie_rating);
    $insertMovie->bindParam(":movie_image", $movie_image);

    $insertMovie->execute();

    header('Location: list_movies.php');
    exit();
}

<?php

session_start();

include_once('config.php');

$user_id=$_SESSION['id'];
$movie_id=$_SESSION['id'];

$nr_tickets=$_POST['nr_tickets'];
$data=$_POST['date'];
$time=$_POST['time'];

$sql="INSERT INTO bookings (user_id,movie_id,nr_tickets,date,time) VALUES (:user_id,:movie_id,:nr_tickets,:date,:time)";


$insertBookinga=$conn->prepare($sql);
$insertBookinga=$conn->bindParam(":user_id",$user_id);
$insertBookinga=$conn->bindParam("movie_id",$movie_id);
$insertBookinga=$conn->bindParam(":nr_tickets",$nr_tickets);
$insertBookinga=$conn->bindParam(":date",$date);
$insertBookinga=$conn->bindParam(":time",$time);


$insertBookinga=$conn->execute();

header('Location:home.php');


?>

<?php 
session_start();

include_once('config.php');
$user_id=$_SESSION['id'];

$sql="SELECT movies.movie_name,user.email,bookings.id,bookings.nr_tickets,bookings.is_approved,bookings.time FROM movies
INNER JOIN bookings ON movies.id=bookings.movie_id
INNER JOIN users ON users.id=bookings.user_id";

$selectBookings=$conn->prepare($sql);
$selectBookings->execute();
$bookings_data=$selectBookings->fetchAll();







?>

<!DOCTYPE html>
 <html>
 <head>
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <link rel="apple-touch-icon" href="/docs/5.1/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
  <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
  <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
  <link rel="manifest" href="/docs/5.1/assets/img/favicons/manifest.json">
  <link rel="mask-icon" href="/docs/5.1/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
  <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon.ico">
  <meta name="theme-color" content="#7952b3">
 </head>
 <body>
 <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#"><?php echo "Welcome to dashboard ".$_SESSION['username']; ?></a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-50" type="text" placeholder="Search" aria-label="Search">
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="logout.php">Sign out</a>
    </div>
  </div>
</header>


<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#"><?php echo "Welcome to dashboard ".$_SESSION['username']; ?></a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-50" type="text" placeholder="Search" aria-label="Search">
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="logout.php">Sign out</a>
    </div>
  </div>
</header>


<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
      <ul class="nav flex-column">
      <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#"><?php echo "Welcome to dashboard ".$_SESSION['username']; ?></a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-50" type="text" placeholder="Search" aria-label="Search">
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="logout.php">Sign out</a>
    </div>
  </div>
</header>


<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
      <ul class="nav flex-column">
      <li class="nav-item">
              <a class="nav-link" href="home.php">
                <span data-feather="file"></span>
                Home
              </a>
            </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="dashboard.php">
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="list_movies.php">
              <span data-feather="file"></span>
              Movies
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="bookings.php">
              <span ></span>
              Bookings
            </a>
          </li>

          <?php 

$user = "root";
$pass = "";
$server = "localhost";
$dbname = "mms";

try {
    // Corrected the typo from "dbanme" to "dbname"
    $db = new PDO("mysql:host=$server;dbname=$dbname", $user, $pass);
    // Set the PDO error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    // Display error message if connection fails
    echo "Error: " . $e->getMessage();
}
?>

<?php 
 session_start();
include_once('config.php');

if(empty($_SESSION['username'])){
    header('Location:login.php');
}

$sql="SELECT * FROM users";
$selectUsers=$conn->prepare()
$selectUsers->execute();

$users_data=$selectUsers->fetchAll();




?>
<!DOCTYPE html>
 <html>
 <head>
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <link rel="apple-touch-icon" href="/docs/5.1/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
  <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
  <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
  <link rel="manifest" href="/docs/5.1/assets/img/favicons/manifest.json">
  <link rel="mask-icon" href="/docs/5.1/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
  <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon.ico">
  <meta name="theme-color" content="#7952b3">
 </head>
 <body>

 <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#"><?php echo "Welcome to dashboard ".$_SESSION['username']; ?></a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-50" type="text" placeholder="Search" aria-label="Search">
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="logout.php">Sign out</a>
    </div>
  </div>
</header>


<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">

        <li class="nav-item">
              <a class="nav-link" href="home.php">
                <span data-feather="file"></span>
                Home
              </a>
            </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="dashboard.php">
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="list_movies.php">
              <span data-feather="file"></span>
              Movies
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="bookings.php">
              <span ></span>
              Bookings
            </a>
          </li>
        </ul>

        
      </div>
    </nav>


    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        
      </div>

      <h2>Users</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Emri</th>
              <th scope="col">Username</th>
              <th scope="col">Email</th>
              <th scope="col">Update</th>
              <th scope="col">Delete</th>
            </tr>
          </thead>
          <tbody>
          
 
 
   <script src="/docs/5.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
 
 
       <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
   </body>
 </html>
 <?php foreach($users_data as $user_data){?>
                <tr>
                    <td><?php echo $user_data['id']?></td>
                    <td><?php echo $user_data['emri']?></td>
                    <td><?php echo $user_data['username']?></td>
                    <td><?php echo $user_data['email']?></td>
                    <td><a href="editUsers.php?id=<?= $user_data['id'];?>">Update</a></td>
                    <td><a href="deleteUsers.php?id=<?= $user_data['id'];?>">Delete</a></td>
                </tr>


          <?php  } ?>
           
            
           </tbody>
         </table>
       </div>
      <?php  else {
       
     } ?>
     </main>
   </div>
 </div>
 
 
  </body>
  </html>

  <?php 

include_once('config.php');

id=$_GET['id'];
$sql="UPDATE 'bookings' SET 'is_approved'='false' WHERE id=:id";
$prep=$conn->prepare($sql);
$prep->bindParam(':id')
?> 

<?php
include_once('config.php');

$id=$_GET['id'];
$sql="DELETE FROM movies WHERE id=:id";
$prep=$db->prepare($sql);
$prep->bindParam(':id',$id);
$prep->execute();

header('Location: list_movies.php');

?>

<?php

include_once('config.php');

$id=$_GET['id'];
$sql="DELETE FROM users WHERE id=:id";
$prep=$conn->prepare($sql);
$prep->bindParam(':id',$id);
$prep->bindParam(':id',$id);
$prep->execute();

header('Location:dashboard.php');

?>

<?php
session_start();

include_once('config.php');

$id=$_GET['id'];
$sql="SELECT * FROM users WHERE id=:id";

$selectUser=$conn->prepare($sql);
$selectUser->bindParam('id'$id);
$selectUser->execute();

$movie_data=selectUser->fetch();





?>

<!DOCTYPE html>
 <html>
 <head>
  <title>Home</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <link rel="apple-touch-icon" href="/docs/5.1/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
  <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
  <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
  <link rel="manifest" href="/docs/5.1/assets/img/favicons/manifest.json">
  <link rel="mask-icon" href="/docs/5.1/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
  <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon.ico">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <meta name="theme-color" content="#7952b3">
  <style>
    .form-floating{
      margin: 20px 0;
    }
  </style>
 </head>
 <body>
 <header>
    <div class="collapse bg-dark" id="navbarHeader">
     <div class="container">
        <div class="row">
            <div class="col-sm-8 col-md-7 py-4">
                <h4 class="text-white">About</h4>
                <p class="text-muted">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
            </div>
            <div class="col-sm-4 offset-md-1 py-4">
              <h4 class="text-white">Contact</h4>
              <ul class="list-unstyled">
                <li><a href="#" class="text-white">Follow on Twitter</a></li>
                <li><a href="#" class="text-white">Like on Facebook</a></li>
                <li><a href="#" class="text-white">Email me</a></li>
              </ul>
            </div>
      </div>
    </div>
  </div>
  <div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container">
      <a href="#" class="navbar-brand d-flex align-items-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 24 24"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
        <strong>Album</strong>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </div>
</header>
 
  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Book your ticket</h1>
        <p class="lead text-muted">You can book your ticket by clicking the button below</p>
      </div>
    </div>
  </section>
  <div class="album py-5 bg-light">
    <div class="container">
      <div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-6">
                    <div class="white-box text-center" style="width: 100%;height: 100%;"><img src="movie_images/<?php echo $movie_data['movie_image'];  ?>" class="img-responsive" style="width: 70%; height: 90%;"></div>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-6">
                    <h4 class="box-title mt-5"><?php echo $movie_data['movie_name']; ?></h4>
                    <p><?php echo $movie_data['movie_desc']; ?></p>
                    <form action="book.php" method="post">
                    <div class="form-floating">
                      <input type="number" class="form-control" id="floatingInput" placeholder="Number of tickets" name="nr_tickets" >
                      <label for="floatingInput">Number of tickets</label>
                    </div>
                    <div class="form-floating">
                      <input type="date" class="form-control" id="floatingInput" placeholder="Date" name="date" >
                      <label for="floatingInput">Date</label>
                    </div>
                    <div class="form-floating">
                      <select name="time">
                        <option value="12:00">12:00</option>
                        <option value="15:00">15:00</option>
                        <option value="17:00">17:00</option>
                        <option value="19:00">19:0</option>
                      </select>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Book</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
 </body>
 </html>

 <?php

session_start();

include_once('config.php');

$id=$_GET['id'];
$sql="SELECT * FROM users WHERE id=:id";

$selectUser=$conn->prepare($sql);
$selectUser->bindParam('id'$id);
$selectUser->execute();

$user_data=selectUser->fetch();





?>



<!DOCTYPE html>
 <html>
 <head>
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <link rel="apple-touch-icon" href="/docs/5.1/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
  <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
  <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
  <link rel="manifest" href="/docs/5.1/assets/img/favicons/manifest.json">
  <link rel="mask-icon" href="/docs/5.1/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
  <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon.ico">
  <meta name="theme-color" content="#7952b3">
 </head>
 <body>

 <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#"><?php echo "Welcome to dashboard ".$_SESSION['username']; ?></a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-50" type="text" placeholder="Search" aria-label="Search">
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="logout.php">Sign out</a>
    </div>
  </div>
</header>


<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="dashboard.php">
              <span data-feather="home"></span>
              Dashboard
            </a>
            </ul>


       
</div>
</nav>


<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Dashboard</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group me-2">
      <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
      <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
    </div>
    <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
      <span data-feather="calendar"></span>
      This week
    </button>
  </div>
</div>





<h2>Edit user's details</h2>
<div class="table-responsive">
  
  <form action="updateUsers.php" method="post">
  <div class="form-floating">
          <input type="number" class="form-control" id="floatingInput" placeholder="Id" name="id" value="<?php echo  $user_data['id'] ?>">
          <label for="floatingInput">Id</label>
        </div>
        <div class="form-floating">
          <input type="text" class="form-control" id="floatingInput" placeholder="Emri" name="emri" value="<?php echo  $user_data['emri'] ?>">
          <label for="floatingInput">Emri</label>
        </div>
        <div class="form-floating">
          <input type="text" class="form-control" id="floatingInput" placeholder="Username" name="username" value="<?php echo  $user_data['username'] ?>">
          <label for="floatingInput">Username</label>
        </div>
        <div class="form-floating">
          <input type="email" class="form-control" id="floatingInput" placeholder="Email" name="email" value="<?php echo  $user_data['email'] ?>">
          <label for="floatingInput">Email</label>
        </div>

        <br>
        <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Change</button>
      </form>
      </div>
    </main>
  </div>
</div>


  <script src="/docs/5.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>



 </body>
 </html>
  
<?php

session_start();

include_once('config.php');

$id=$_GET['id'];
$sql="SELECT * FROM users WHERE id=:id";

$selectUser=$conn->prepare($sql);
$selectUser->bindParam('id'$id);
$selectUser->execute();

$user_data=selectUser->fetch();





?>



<!DOCTYPE html>
 <html>
 <head>
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <link rel="apple-touch-icon" href="/docs/5.1/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
  <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
  <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
  <link rel="manifest" href="/docs/5.1/assets/img/favicons/manifest.json">
  <link rel="mask-icon" href="/docs/5.1/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
  <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon.ico">
  <meta name="theme-color" content="#7952b3">
 </head>
 <body>

 <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#"><?php echo "Welcome to dashboard ".$_SESSION['username']; ?></a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-50" type="text" placeholder="Search" aria-label="Search">
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="logout.php">Sign out</a>
    </div>
  </div>
</header>


<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="dashboard.php">
              <span data-feather="home"></span>
              Dashboard
            </a>
            </ul>


       
</div>
</nav>


<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Dashboard</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group me-2">
      <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
      <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
    </div>
    <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
      <span data-feather="calendar"></span>
      This week
    </button>
  </div>
</div>





<h2>Edit user's details</h2>
<div class="table-responsive">
  
  <form action="updateUsers.php" method="post">
  <div class="form-floating">
          <input type="number" class="form-control" id="floatingInput" placeholder="Id" name="id" value="<?php echo  $user_data['id'] ?>">
          <label for="floatingInput">Id</label>
        </div>
        <div class="form-floating">
          <input type="text" class="form-control" id="floatingInput" placeholder="Emri" name="emri" value="<?php echo  $user_data['emri'] ?>">
          <label for="floatingInput">Emri</label>
        </div>
        <div class="form-floating">
          <input type="text" class="form-control" id="floatingInput" placeholder="Username" name="username" value="<?php echo  $user_data['username'] ?>">
          <label for="floatingInput">Username</label>
        </div>
        <div class="form-floating">
          <input type="email" class="form-control" id="floatingInput" placeholder="Email" name="email" value="<?php echo  $user_data['email'] ?>">
          <label for="floatingInput">Email</label>
        </div>

        <br>
        <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Change</button>
      </form>
      </div>
    </main>
  </div>
</div>


  <script src="/docs/5.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>



 </body>
 </html>
  
 <?php

 include_once('config.php');
 
 $sql="SELECT * FROM movies";
 $selectMovies=$conn->prepare($sql);
 $selectMovies->execute();

 $movies_data=$selectMovies->fetchAll();

?>
<!DOCTYPE html>
<html>
<head>
<title>Home</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1">
 <meta name="description" content="">
 <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
 <meta name="generator" content="Hugo 0.88.1">
 <link rel="apple-touch-icon" href="/docs/5.1/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.1/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.1/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#7952b3">
</head>
<body>

<header>
<div class="collapse bg-dark" id="navbarHeader">
 <div class="container">
   <div class="row">
     <div class="col-sm-8 col-md-7 py-4">
       <h4 class="text-white">About</h4>
       <p class="text-muted">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
     </div>
     <div class="col-sm-4 offset-md-1 py-4">
       <h4 class="text-white">Contact</h4>
       <ul class="list-unstyled">
         <li><a href="#" class="text-white">Follow on Twitter</a></li>
         <li><a href="#" class="text-white">Like on Facebook</a></li>
         <li><a href="#" class="text-white">Email me</a></li>
       </ul>
     </div>
   </div>
 </div>
</div>

<div class="navbar navbar-dark bg-dark shadow-sm">
 <div class="container">
   <a href="#" class="navbar-brand d-flex align-items-center">
     <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 24 24"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
     <strong>Album</strong>
   </a>
   <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
     <a href="dashboard.php"><span class="navbar-toggler-icon"></span></a>
   </button>
 </div>
</div>
</header>

<section class="py-5 text-center container">
 <div class="row py-lg-5">
   <div class="col-lg-6 col-md-8 mx-auto">
     <h1 class="fw-light">Album example</h1>
     <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
     <p>
     <a href="#" class="btn btn-primary my-2">Main call to action</a>
       <a href="#" class="btn btn-secondary my-2">Secondary action</a>
     </p>
   </div>
 </div>
</section>


<div class="album py-5 bg-light">
 <div class="container">


   <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

   <?php
 foreach($movies_data as $movie_data){
 ?>
 <div class="col">
   <div class="card shadow-sm">
     <img src="movie_images/<?php echo $movie_data['movie_image'];?>" height="350">
     <div class="card-body">
       <h4><?php echo $movie_data['movie_name'] ?></h4>
       <p class="card-text"><?php echo $movie_data['movie_desc'] ?></p>
       <div class="d-flex justify-content-between align-items-center">
         <div class="btn-group">
          <a href="details.php?id=<?php echo $movie_data['id'];?>" class="btn btn-sm btn-outline-secondary">View</a>
          <a href="edit.php?id=<?php echo $movie_data['id'];?>" class="btn btn-sm btn-outline-secondary">Edit</a>
         </div>
         <small class="text-muted">Rating:<?php echo $movie_data['movie_rating']; ?></small>
         <small class="text-muted"><?php echo $movie_data['movie_quality']; ?></small>
       </div>
     </div>


   </div>
 </div>


 <?php
 }
 ?>

     
   </div>
 </div>
</div>






</body>
</html>

<?php 
 session_start();
include_once('config.php');

if(empty($_SESSION['username'])){
    header('Location:login.php');
}

$sql="SELECT * FROM users";
$selectUsers=$conn->prepare()
$selectUsers->execute();

$users_data=$selectUsers->fetchAll();




?>
<!DOCTYPE html>
 <html>
 <head>
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <link rel="apple-touch-icon" href="/docs/5.1/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
  <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
  <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
  <link rel="manifest" href="/docs/5.1/assets/img/favicons/manifest.json">
  <link rel="mask-icon" href="/docs/5.1/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
  <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon.ico">
  <meta name="theme-color" content="#7952b3">
 </head>
 <body>

 <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#"><?php echo "Welcome to dashboard ".$_SESSION['username']; ?></a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-50" type="text" placeholder="Search" aria-label="Search">
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="logout.php">Sign out</a>
    </div>
  </div>
</header>


<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">

        <li class="nav-item">
              <a class="nav-link" href="home.php">
                <span data-feather="file"></span>
                Home
              </a>
            </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="dashboard.php">
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="list_movies.php">
              <span data-feather="file"></span>
              Movies
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="bookings.php">
              <span ></span>
              Bookings
            </a>
          </li>
        </ul>

        
      </div>
    </nav>


    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        
      </div>

      <h2>Users</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Movie Name</th>
              <th scope="col">Movie Description</th>
              <th scope="col">Movie Quality</th>
              <th scope="col">Update</th>
              <th scope="col">Delete</th>
            </tr>
          </thead>
          <tbody>
          
 
 
   <script src="/docs/5.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
 
 
       <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
   </body>
 </html>
 <?php foreach($users_data as $user_data){?>
                <tr>
                    <td><?php echo $user_data['id']?></td>
                    <td><?php echo $user_data['movie_name']?></td>
                    <td><?php echo $user_data['movie_desc']?></td>
                    <td><?php echo $user_data['movie_quality']?></td>
                    <td><a href="editUsers.php?id=<?= $user_data['id'];?>">Update</a></td>
                    <td><a href="deleteUsers.php?id=<?= $user_data['id'];?>">Delete</a></td>
                </tr>
                <?php } ?>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>

<script src="/docs/5.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
<script src="dashboard.js"></script>

</body>
</html>
<a href="movies.php" class="btn btn-primary">Add Movie</a>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="apple-touch-icon" href="/docs/5.1/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/5.1/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/5.1/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
    <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon.ico">
    <style>


        html,
    body {
      height: 100%;
    }


    body {
      display: flex;
      align-items: center;
      padding-top: 40px;
      padding-bottom: 40px;
      background-color: #f5f5f5;
    }


    .form-signin {
      width: 100%;
      max-width: 330px;
      padding: 15px;
      margin: auto;
    }

    .form-signin .checkbox {
      font-weight: 400;
    }


    .form-signin .form-floating:focus-within {
      z-index: 2;
    }


    .form-signin input[type="email"] {
      margin-bottom: -1px;
      border-bottom-right-radius: 0;
      border-bottom-left-radius: 0;
    }


    .form-signin input[type="password"] {
      margin-bottom: 10px;
      border-top-left-radius: 0;
      border-top-right-radius: 0;
    }
    </style>
</head>
<body class="text-center">
<!-- Creating a from which will post some data in loginLogic.php file -->
<main class="form-signin">
  <form action="loginLogic.php" method="post">
    <img class="mb-4" src="https://getbootstrap.com/docs/5.1/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
    <div class="form-floating">
      <input type="text" class="form-control" id="floatingInput" placeholder="Username" name="username">
      <label for="floatingInput">Username</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
      <label for="floatingPassword">Password</label>
    </div>


    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Sign in</button>
    <p>Already have an account:<a href="index.php" >Sign up</a> </p>
  </form>
</main>


</body>
</html>

<?php 

session_start();

include_once ('config.php');

    $username=$_POST['username'];

    $password=$_POST['password'];

    if(empty($username) || empty($password)){
        echo "you have not filled in all the fields";
    }else{
        $sql="SELECT * FROM users WHERE username=:username";

        $selectUser=$conn->prepare($sql);

        $selectUser->bindParam(':username', $username);

        $selectUser->execute();

        $data=$selectUser->fetch();

        if($data==false){
            echo "the user does not exist";
        }else{
            if(password_verify($password,$data['password'])){
                $_SESSION['id']=$data['id'];
                $_SESSION['username']=$data['username'];
                $_SESSION['email']=$data['email'];
                $_SESSION['emri']=$data['emri'];
                $_SESSION['is_admin']=$data['is_admin'];

                header('Location:dashboard.php');
            }else{
                echo "password is not valid";
            }

        }
    }
?>

<?php
               
                
session_start();
include_once('config.php');
                 
session_destroy();
                               
header('Location:login.php');
?>

<?php
session_start();
?>

<!DOCTYPE html>
 <html>
 <head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
     <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <link rel="apple-touch-icon" href="/docs/5.1/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/5.1/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/5.1/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
    <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#7952b3">
 </head>
 <body>

 <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#"></a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-50" type="text" placeholder="Search" aria-label="Search">
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="logout.php">Sign out</a>
    </div>
  </div>
</header>
<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="dashboard.php">
              <span data-feather="home"></span>
              Dashboard
            </a>
         
        </ul>


        
      </div>
    </nav>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
          </button>
        </div>
      </div>
      <h2>Add movie's details</h2>
      <div class="table-responsive">  
        <form action="addMovie.php" method="post">
        <div class="form-floating">
          <input type="text" class="form-control" id="floatingInput" placeholder="movie_name" name="movie_name" >
          <label for="floatingInput">Movie Name</label>
        </div>
        <div class="form-floating">
          <input type="text" class="form-control" id="floatingInput" placeholder="Movie Description" name="movie_desc" >
          <label for="floatingInput">Movie Description</label>
        </div>
        <div class="form-floating">
          <input type="text" class="form-control" id="floatingInput" placeholder="Movie Quality" name="movie_quality" >
          <label for="floatingInput">Movie Quality</label>
        </div>
        <div class="form-floating">
          <input type="number" class="form-control" id="floatingInput" placeholder="Movie Rating" name="movie_rating">
          <label for="floatingInput">Movie Rating</label>
        </div>
        <div class="form-floating">
          <input type="file" class="form-control" id="floatingInput" placeholder="Image" name="movie_image">
          <label for="floatingInput">Image</label>
        </div>
        <br>
        <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Add</button>
      </form>
      </div>
    </main>
  </div>
</div>
    <script src="/docs/5.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>
 </body>

 <?php 
include_once('config.php');

if(isset($_POST['submit'])){
    $emri=$_POST['emri'];
    $username=$_POST['username'];
    $email=$_POST['email'];
    $tempPass=$_POST['password'];
    $password=password_hash($tempPass,PASSWORD_DEFAULT);

    $tempConfirm=$_POST['confirm_password'];
    $confirm_password=password_hash($tempConfirm,PASSWORD_DEFAULT);

    if(empty($emri)) \\ empty($username) \\ empty($password) \\ empty($confirm_password){
        echo "you have not filled in all the fields";
    }else {
        $sql="INSERT INTO users(emri,username,email,password,confirm_password) VALUES (:emri,:username,:email,:password,:confirm_password)";

        $insertSQL=$conn->prepare($sql);

        $insertSQL->bindParam(':emri',$emri);
        $insertSQL->bindParam(':username',$username);
        $insertSQL->bindParam(':email',$email);
        $insertSQL->bindParam(':password',$password);
        $insertSQL->bindParam(':confirm_',$confirm_password);

        $insertSQL->execute();

        header('Location:login.php');
    }
 }

 ?>

 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="apple-touch-icon" href="/docs/5.1/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/5.1/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/5.1/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
    <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon.ico">
    <style>


        html,
    body {
      height: 100%;
    }


    body {
      display: flex;
      align-items: center;
      padding-top: 40px;
      padding-bottom: 40px;
      background-color: #f5f5f5;
    }

    .form-signin {
      width: 100%;
      max-width: 330px;
      padding: 15px;
      margin: auto;
    }


    .form-signin .checkbox {
      font-weight: 400;
    }


    .form-signin .form-floating:focus-within {
      z-index: 2;
    }


    .form-signin input[type="email"] {
      margin-bottom: -1px;
      border-bottom-right-radius: 0;
      border-bottom-left-radius: 0;
    }


    .form-signin input[type="password"] {
      margin-bottom: 10px;
      border-top-left-radius: 0;
      border-top-right-radius: 0;
    }
    .form-floating{
        margin: 10px;
    }
    </style>
    </head>
<body class="text-center">
<!-- Creating a form which will post us some data in register.php file -->
<main class="form-signin">
  <form action="register.php" method="post">
    <img class="mb-4" src="https://getbootstrap.com/docs/5.1/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Register</h1>


    <div class="form-floating">
      <input type="text" class="form-control" id="floatingInput" placeholder="Emri" name="emri">
      <label for="floatingInput">Emri</label>
    </div>
    <div class="form-floating">
      <input type="text" class="form-control" id="floatingInput" placeholder="Username" name="username">
      <label for="floatingInput">Username</label>
    </div> ]
    <div class="form-floating">
      <input type="email" class="form-control" id="floatingInput" placeholder="Email" name="email">
      <label for="floatingInput">Email</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingInput" placeholder="Password" name="password">
      <label for="floatingInput">Password</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Confirm Password" name="confirm_password">
      <label for="floatingPassword">Confirm Password</label>
    </div><div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Sign up</button>
    <span>Already have an account: </span><a href="login.php">Sign in</a>
  </form>
</main>


</body>
</html>

<?php

include_once('config.php');

// Check if the form has been submitted
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $movie_name = $_POST['movie_name'];  // Correct variable name
    $movie_desc = $_POST['movie_desc'];  // Correct variable name
    $movie_quality = $_POST['movie_quality'];  // Correct variable name

    // SQL query to update the movie's details
    $sql = "UPDATE movies SET movie_name = :movie_name, movie_desc = :movie_desc, movie_quality = :movie_quality WHERE id = :id";

    // Prepare and bind the parameters to prevent SQL injection
    $prepareSQL = $db->prepare($sql);
    $prepareSQL->bindParam(':movie_name', $movie_name);
    $prepareSQL->bindParam(':movie_desc', $movie_desc);
    $prepareSQL->bindParam(':movie_quality', $movie_quality);
    $prepareSQL->bindParam(':id', $id);

    // Execute the query
    $prepareSQL->execute();

    // Redirect to the dashboard after the update
    header('Location: list_movies.php');
    exit();  // Always call exit() after header redirection
}

?>

<?php

include_once('config.php');

// Check if the form has been submitted
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $emri = $_POST['emri'];
    $username = $_POST['username'];
    $email = $_POST['email'];

    // SQL query to update the user's details
    $sql = "UPDATE users SET emri = :emri, username = :username, email = :email WHERE id = :id";

    // Use the $db variable instead of $conn
    $prepareSQL = $db->prepare($sql);
    $prepareSQL->bindParam(':emri', $emri);
    $prepareSQL->bindParam(':username', $username);
    $prepareSQL->bindParam(':email', $email);
    $prepareSQL->bindParam(':id', $id);
    $prepareSQL->execute();

    // Redirect to the dashboard after the update
    header('Location: dashboard.php');
    exit();  // Always call exit() after header redirection
}

?> here it is 