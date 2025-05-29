<?php 
  session_start();
  include_once('config.php');

  $user_id = $_SESSION['id'];
  
  if ($_SESSION['is_admin'] == 'true') {
    $sql = "SELECT tesla.tesla_name, users.email, bookings.id, bookings.nr_tickets, bookings.date, bookings.is_approved, bookings.time 
            FROM tesla
            INNER JOIN bookings ON tesla.id = bookings.tesla_id
            INNER JOIN users ON users.id = bookings.user_id";

    $selectBookings = $conn->prepare($sql);
    $selectBookings->execute();
    $bookings_data = $selectBookings->fetchAll();
  } else {
    $sql = "SELECT tesla.tesla_name, users.email, bookings.nr_tickets, bookings.date, bookings.is_approved, bookings.time 
            FROM tesla 
            INNER JOIN bookings ON tesla.id = bookings.tesla_id 
            INNER JOIN users ON users.id = bookings.user_id 
            WHERE bookings.user_id = :user_id";

    $selectBookings = $conn->prepare($sql);
    $selectBookings->bindParam(':user_id', $user_id);
    $selectBookings->execute();
    $bookings_data = $selectBookings->fetchAll();
  }
?>

<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#"><?php echo "Welcome to dashboard " . $_SESSION['username']; ?></a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu">
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
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="list_tesla.php">
              Tesla
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
      </div>

      <h2>Tesla Bookings</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Tesla Model X</th>
              <th scope="col">User Email</th>
              <th scope="col">Number of tickets</th>
              <th scope="col">Date</th>
              <th scope="col">Time</th>
              <th scope="col">Approved</th>
            </tr>
          </thead>
          <tbody>
          <?php if ($_SESSION['is_admin'] == 'true') { ?>
            <?php foreach ($bookings_data as $booking_data) { ?>
              <tr>
                <td><?php echo $booking_data['tesla_name']; ?></td>
                <td><?php echo $booking_data['email']; ?></td>
                <td><?php echo $booking_data['nr_tickets']; ?></td>
                <td><?php echo $booking_data['date']; ?></td>
                <td><?php echo $booking_data['time']; ?></td>
                <td><?php echo $booking_data['is_approved']; ?></td>
                <td><a href="approve.php?id=<?= $booking_data['id']; ?>">Approve</a></td>
                <td><a href="decline.php?id=<?= $booking_data['id']; ?>">Decline</a></td>
              </tr>
            <?php }} else { ?>
            <?php foreach ($bookings_data as $booking_data) { ?>
              <tr>
                <td><?php echo $booking_data['tesla_name']; ?></td>
                <td><?php echo $booking_data['email']; ?></td>
                <td><?php echo $booking_data['nr_tickets']; ?></td>
                <td><?php echo $booking_data['date']; ?></td>
                <td><?php echo $booking_data['time']; ?></td>
                <td><?php echo $booking_data['is_approved']; ?></td>
              </tr>
            <?php } ?>
          <?php } ?>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>

<script src="/docs/5.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
<script src="dashboard.js"></script>

</body>
</html>
