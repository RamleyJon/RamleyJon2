<?php
session_start();
require('./database.php');

$searchId = '';
$orderDetails = null;

// Check if a search ID has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $searchId = $_POST['search_id'];

    // Prepare and execute a query to fetch order details based on the ID
    $stmt = $connection->prepare("SELECT * FROM book WHERE ID = ?");
    $stmt->bind_param("s", $searchId);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if any order exists
    if ($result->num_rows > 0) {
        $orderDetails = $result->fetch_assoc();
    } else {
        echo '<script>alert("No order found with this ID.");</script>';
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Orders</title>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
  <link rel="stylesheet" href="style.css">
  <style>
    form {
        display: flex;
        align-items: center;
        margin-bottom: 20px; /* Space between form and table */
    }
    input[type="text"] {
        width: 150px; /* Shorter input */
        margin-right: 10px;
    }
    .submit-button {
        padding: 5px 10px; /* Shorter button */
    }
    .order-details {
        margin-top: 20px;
        border-collapse: collapse;
        width: 100%;
    }
    .order-details th, .order-details td {
        border: 1px solid #ddd;
        padding: 8px;
    }
    .order-details th {
        background-color: #f2f2f2;
    }
  </style>
</head>
<body>
  <!-- Sidebar (hidden by default) -->
  <nav class="w3-sidebar w3-bar-block w3-card w3-top w3-xlarge w3-animate-left" style="display:none;z-index:2;width:40%;min-width:300px" id="mySidebar">
    <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button">Close Menu</a>
    <a href="menu.php" onclick="w3_close()" class="w3-bar-item w3-button">Food</a>
    <a href="logout1.php" onclick="w3_close()" class="w3-bar-item w3-button">Log out</a>
    <p style="padding-left: 25px;">────────────────────────────────</p>
  </nav>

  <!-- Top menu -->
  <div class="w3-top">
    <div class="w3-white w3-xlarge" style="max-width:1200px;margin:auto">
      <div class="w3-button w3-padding-16 w3-left" onclick="w3_open()">☰</div>
      <div class="w3-right w3-padding-16">
          <a href="menu.php" style="text-decoration: none;">Back</a>
      </div>
      <div class="w3-center w3-padding-16">View Orders</div>
    </div>
  </div>
<br><br>

  <div class="main-content">
    <section class="dashboard">
      <div class="appointments">
        <div class="form-class">
          <div class="form">
            <form method="POST">
                <label for="search_id" style="margin-right: 10px;">Search Order ID:</label>
                <input type="text" id="search_id" name="search_id" value="<?php echo htmlspecialchars($searchId); ?>" required>
                <button type="submit" class="submit-button">Search</button>
            </form>
          </div>
        </div>

        <?php if ($orderDetails): ?>
            <table class="w3-table w3-bordered w3-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Food</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Full Name</th>
                        <th>Contact Number</th>
                        <th>Request</th>
                        <th>Location</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo htmlspecialchars($orderDetails['ID']); ?></td>
                        <td><?php echo htmlspecialchars($orderDetails['Food']); ?></td>
                        <td><?php echo htmlspecialchars($orderDetails['Date']); ?></td>
                        <td><?php echo htmlspecialchars($orderDetails['Time']); ?></td>
                        <td><?php echo htmlspecialchars($orderDetails['FullName']); ?></td>
                        <td><?php echo htmlspecialchars($orderDetails['Number']); ?></td>
                        <td><?php echo htmlspecialchars($orderDetails['Request']); ?></td>
                        <td><?php echo htmlspecialchars($orderDetails['Location']); ?></td>
                    </tr>
                </tbody>
            </table>
        <?php elseif ($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
            <p>No orders found for the given ID.</p>
        <?php endif; ?>

      </div>
    </section>
  </div>

  <script>
      function w3_open() {
          document.getElementById("mySidebar").style.display = "block"; // Show the sidebar
      }

      function w3_close() {
          document.getElementById("mySidebar").style.display = "none"; // Hide the sidebar
      }
  </script>
</body>
</html>
