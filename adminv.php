<?php
session_start(); 

require('./database.php');
require('./read.php'); 

// Check if a delete request has been made
if (isset($_POST['delete'])) {
    $idToDelete = $_POST['id'];
    $deleteQuery = "DELETE FROM rjmtbl WHERE ID = '$idToDelete'";
    mysqli_query($connection, $deleteQuery);
}

$queryBookings = "SELECT * FROM rjmtbl"; // Query to get all bookings 
$sqlBookings = mysqli_query($connection, $queryBookings);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin / View Records </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style3.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        body,h1,h2,h3,h4,h5,h6 {font-family: "Karma", sans-serif}
        .w3-bar-block .w3-bar-item {padding:20px}
        .w3-right a {text-decoration: none;}
        .img-responsive {
            width: 100%;
            height: 200px; 
            object-fit: cover; 
        }
    </style>
</head>
<body>

<!-- Sidebar (hidden by default) -->
<nav class="w3-sidebar w3-bar-block w3-card w3-top w3-xlarge w3-animate-left" style="display:none;z-index:2;width:40%;min-width:300px" id="mySidebar">
    <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button">Close Menu</a>
    <a href="#food" onclick="w3_close()" class="w3-bar-item w3-button">Food</a>
    <a href="#about" onclick="w3_close()" class="w3-bar-item w3-button">About</a>
    <a href="email.php" onclick="w3_close()" class="w3-bar-item w3-button">Email API</a>
    <a href="logout.php" onclick="w3_close()" class="w3-bar-item w3-button">Log out</a>

    <p style="padding-left: 25px;">────────────────────────────────</p>
</nav>

<!-- Top menu -->
<div class="w3-top">
    <div class="w3-white w3-xlarge" style="max-width:1200px;margin:auto">
        <div class="w3-button w3-padding-16 w3-left" onclick="w3_open()">☰</div>
        <div class="w3-right w3-padding-16">
            <a href="adminm.php" style="text-decoration: none;">Back</a>
        </div>
        <div class="w3-center w3-padding-16">My Food</div> <!-- This is now a heading and not a link -->
    </div>
</div>
<br><br><br><br>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h3>Registered List</h3>
        </div>
    </div>
    
    <div class="table-responsive"> <!-- Added responsive table wrapper -->
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Action</th> <!-- New column for actions -->
                </tr>
            </thead>
            <tbody>
                <?php while ($results = mysqli_fetch_array($sqlBookings)) { ?>
                    <tr>
                        <td><?php echo $results['ID'] ?></td>
                        <td><?php echo $results['Email'] ?></td>
                        <td><?php echo $results['Username'] ?></td>
                        <td><?php echo $results['Password'] ?></td>
                        <td>
                            <form method="POST" action="">
                                <input type="hidden" name="id" value="<?php echo $results['ID']; ?>">
                                <button type="submit" name="delete" onclick="return confirm('Are you sure you want to delete this record?');" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<script>
// Script to open and close sidebar
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
}

function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
}
</script>

</body>
</html>
