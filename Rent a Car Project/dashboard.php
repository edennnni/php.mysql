<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
     <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="tesla-dashboard">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Dashboard</h1>
        </div>

        <h2>Tesla Bookings</h2>
        <div class="table-section">
          <h2>Users</h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Name</th>
                  <th scope="col">Username</th>
                  <th scope="col">Email</th>
                  <th scope="col">Update</th>
                  <th scope="col">Delete</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($users_data as $user): ?>
                  <tr>
                    <td><?php echo htmlspecialchars($user['id']); ?></td>
                    <td><?php echo htmlspecialchars($user['name']); ?></td>
                    <td><?php echo htmlspecialchars($user['username']); ?></td>
                    <td><?php echo htmlspecialchars($user['email']); ?></td>
                    <td><a href="editUsers.php?id=<?= $user['id'];?>" class="btn btn-primary">Update</a></td>
                    <td><a href="deleteUsers.php?id=<?= $user['id'];?>" class="btn btn-danger">Delete</a></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </main>
  </div>
</body>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="style.css">
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Dashboard</title>
  <style>
body {
  font-family: 'Helvetica Neue', sans-serif;
  background-color: #f4f4f4;
  margin: 0;
  padding: 0;
  color: #333;
}

.tesla-dashboard {
  padding: 30px;
  max-width: 1200px;
  margin: auto;
}

.tesla-dashboard h1,
.tesla-dashboard h2 {
  font-weight: 600;
  color: #111;
  margin-bottom: 20px;
}

.tesla-dashboard table {
  width: 100%;
  border-collapse: collapse;
  background: #fff;
  border-radius: 8px;
  overflow: hidden;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
}

.tesla-dashboard th,
.tesla-dashboard td {
  padding: 16px 20px;
  text-align: left;
  border-bottom: 1px solid #e0e0e0;
}

.tesla-dashboard th {
  background-color: #fafafa;
  font-weight: 600;
  color: #222;
}

.tesla-dashboard tr:hover {
  background-color: #f9f9f9;
}

.tesla-dashboard a {
  color: #0071e3;
  text-decoration: none;
  font-weight: 500;
}

.tesla-dashboard a:hover {
  text-decoration: underline;
}

/* Add some flair to your buttons or links if you want */
.tesla-button {
  background-color: #0071e3;
  color: white;
  border: none;
  padding: 10px 20px;
  border-radius: 4px;
  cursor: pointer;
  transition: background-color 0.2s ease-in-out;
}

.tesla-button:hover {
  background-color: #005bb5;
}

</style>
</head>
<body>
  <div class="sidebar">
    <h2>Rent a Tesla</h2>
    <a href="dashboard.php">Dashboard</a>
    <a href="tesla.php">Cars</a>
    <a href="booking.php">Rent</a>
    <a href="rent_tesla.php">Tesla</a>
    <a href="logout.php">Logout</a>

  </div>

  <div class="main-content">
    <div class="header">Dashboard Overview</div>

    <div class="dashboard-widgets">
      <div class="widget">
        <h3>Total Users</h3>
        <p>3,276</p>
      </div>
      <div class="widget">
        <h3>New Signups</h3>
        <p>89 today</p>
      </div>
      <div class="widget">
        <h3>Revenue</h3>
        <p>$9,287</p>
      </div>
    </div>
    </tbody>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="tesla-dashboard">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Dashboard</h1>
    </div>

    <h2>Tesla Bookings</h2>
    <div class="table-responsive">
      <table class="table table-striped table-sm">

    <div class="table-section">
      <h2>Users</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Name</th>
              <th scope="col">Username</th>
              <th scope="col">Email</th>
              <th scope="col">Update</th>
              <th scope="col">Delete</th>
            </tr>
          </thead>
          <tbody>
              <?php foreach ($users_data as $user): ?>
                <?php endforeach; ?>
              <tr>
                <td><?php echo htmlspecialchars($user['id']); ?></td>
                <td><?php echo htmlspecialchars($user['name']); ?></td>
                <td><?php echo htmlspecialchars($user['username']); ?></td>
                <td><?php echo htmlspecialchars($user['email']); ?></td>
                <td><a href="editUsers.php?id=<?= $user['id'];?>" class="btn btn-primary">Update</a></td>
                <td><a href="deleteUsers.php?id=<?= $user['id'];?>" class="btn btn-danger">Delete</a></td>
              </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</body>
</html>
</tbody>
</table>
</div> <!-- Close tesla-dashboard -->
</main> <!-- End of main content -->
</div> <!-- End of main content -->
</body>
</html>
 