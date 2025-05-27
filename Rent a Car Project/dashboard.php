<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Dashboard</title>
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: Arial, sans-serif;
      display: flex;
      height: 100vh;
      background-color: #f0f2f5;
    }

    .sidebar {
      width: 220px;
      background-color: #2c3e50;
      color: #ecf0f1;
      padding: 20px 0;
      position: fixed;
      height: 100%;
    }

    .sidebar h2 {
      text-align: center;
      margin-bottom: 30px;
    }

    .sidebar a {
      display: block;
      padding: 12px 20px;
      color: #ecf0f1;
      text-decoration: none;
      transition: background 0.3s;
    }

    .sidebar a:hover {
      background-color: #34495e;
    }

    .main-content {
      margin-left: 220px;
      padding: 30px;
      flex: 1;
    }

    .header {
      background-color: #fff;
      padding: 15px 30px;
      border-bottom: 1px solid #ddd;
      font-size: 20px;
    }

    .dashboard-widgets {
      display: flex;
      gap: 20px;
      margin-top: 20px;
      flex-wrap: wrap;
    }

    .widget {
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
      flex: 1;
      min-width: 200px;
    }

    /* Add spacing between widgets and table */
    .table-section {
      margin-top: 30px;
    }

    /* Additional styling for the table */
    table {
      width: 100%;
      border-collapse: collapse;
    }

    th, td {
      padding: 10px;
      border: 1px solid #ddd;
      text-align: left;
    }

    th {
      background-color: #f4f4f4;
    }

    .btn {
      padding: 6px 12px;
      border-radius: 5px;
      color: white;
      text-decoration: none;
      display: inline-block;
      text-align: center;
    }

    .btn-primary {
      background-color: #3498db;
    }

    .btn-danger {
      background-color: #e74c3c;
    }

    .btn:hover {
      opacity: 0.8;
    }
  </style>
</head>
<body>

  <div class="sidebar">
    <h2>Rent a Tesla</h2>
    <a href="dashboard.php">Dashboard</a>
    <a href="moto.php">Cars</a>
    <a href="booking.php">Rent</a>
    <a href="list_moto.php">Tesla</a>
    <a href="logout.php">Logout</a>

  </div>

  <div class="main-content">
    <div class="header">Dashboard Overview</div>

    <div class="dashboard-widgets">
      <div class="widget">
        <h3>Total Users</h3>
        <p>1,245</p>
      </div>
      <div class="widget">
        <h3>New Signups</h3>
        <p>87 today</p>
      </div>
      <div class="widget">
        <h3>Revenue</h3>
        <p>$12,340</p>
      </div>
    </div>
    
    <!-- Table Section -->
    <div class="table-section">
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
            <?php foreach ($users_data as $user ): ?>
              <tr>
                <td><?php echo htmlspecialchars($user['id']); ?></td>
                <td><?php echo htmlspecialchars($user['emri']); ?></td>
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

</body>
</html>
