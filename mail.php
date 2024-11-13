<?php
session_start();
require('./database.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $food = $_POST['food'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $fullname = $_POST['name'];
    $number = $_POST['contact'];
    $request = $_POST['notes'];
    $location = $_POST['location']; // New variable for location

    $stmt = $connection->prepare("INSERT INTO book (Food, Date, Time, FullName, Number, Request, Location) VALUES (?, ?, ?, ?, ?, ?, ?)");

    if ($stmt === false) {
        echo '<script>alert("Error in preparing the statement."); window.location.href="mail.php";</script>';
    } else {
        $stmt->bind_param("sssssss", $food, $date, $time, $fullname, $number, $request, $location); // Bind the location parameter

        if ($stmt->execute()) {
            echo '<script>alert("Your order has been sent successfully!"); window.location.href="mail.php";</script>';
        } else {
            $error = $stmt->error;
            echo "<script>alert('Failed to place your order. Error: $error'); window.location.href='mail.php';</script>";
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Food / Mail</title>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <!-- Sidebar (hidden by default) -->
  <nav class="w3-sidebar w3-bar-block w3-card w3-top w3-xlarge w3-animate-left" style="display:none;z-index:2;width:40%;min-width:300px" id="mySidebar">
    <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button">Close Menu</a>
    <a href="menu.php" onclick="w3_close()" class="w3-bar-item w3-button">Food</a>
    <a href="view.php" onclick="w3_close()" class="w3-bar-item w3-button">View</a>
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
      <div class="w3-center w3-padding-16">My Food</div>
    </div>
  </div>
<br><br>
  <div class="main-content">
    <section class="dashboard">
      <div class="appointments">
        <div class="form-class">
          <div class="form">
            <form id="booking-form" method="POST" onsubmit="return validateForm()">
              <div class="form-group">
                <label for="food">Select Food:</label>
                <select id="food" name="food" required>
                  <option value="" disabled selected>Select a dish</option>
                  <option value="Sisig Kapampangan">Sisig Kapampangan</option>
                  <option value="Adobong Pula">Adobong Pula</option>
                  <option value="Kare-Kare">Kare-Kare</option>
                  <option value="Sigang na Baboy">Sigang na Baboy</option>
                  <option value="Morcon">Morcon</option>
                  <option value="Crispy Pata">Crispy Pata</option>
                  <option value="Bringhe">Bringhe</option>
                  <option value="Pindang">Pindang</option>
                </select>
              </div>
              <div class="form-group">
                <label for="date">Select Date:</label>
                <input type="date" id="date" name="date" required>
              </div>
              <div class="form-group">
                <label for="time">Select Time:</label>
                <select id="time" name="time" required>
                  <option value="" disabled selected>Select a time</option>
                  <option value="9:00 AM">9:00 AM</option>
                  <option value="9:30 AM">9:30 AM</option>
                  <option value="10:00 AM">10:00 AM</option>
                  <option value="10:30 AM">10:30 AM</option>
                  <option value="11:00 AM">11:00 AM</option>
                  <option value="1:00 PM">1:00 PM</option>
                  <option value="2:00 PM">2:00 PM</option>
                  <option value="3:00 PM">3:00 PM</option>
                </select>
              </div>
              <div class="form-group">
                <label for="name">Your Full Name:</label>
                <input type="text" id="name" name="name" placeholder="Enter your Full Name" required>
              </div>
              <div class="form-group">
                <label for="contact">Contact Number:</label>
                <input type="tel" id="contact" name="contact" placeholder="Enter 11 digits" required>
              </div>
              <div class="form-group">
    <label for="location">Location:</label>
    <div class="location-input">
        <input type="text" id="location" name="location" placeholder="Enter your location" required> 
        <span class="location-icon" onclick="getLocation()">📍</span> <!-- Icon for location -->
    </div>
</div>

              <div class="form-group">
                <label for="notes">Notes:</label>
                <textarea id="notes" name="notes" rows="4" placeholder="Any specific requests..."></textarea>
              </div>
              <div class="form-group">
                <label>
                  <input type="checkbox" required>
                  I agree to the My Food policies.
                </label>
              </div>
              <button type="submit" class="submit-button">Place Order</button>
            </form>
          </div>
        </div>
        <script>
            function w3_open() {
                document.getElementById("mySidebar").style.display = "block"; // Show the sidebar
            }

            function w3_close() {
                document.getElementById("mySidebar").style.display = "none"; // Hide the sidebar
            }
            
            document.getElementById('name').addEventListener('input', function (e) {
                this.value = this.value.replace(/[^a-zA-Z\s]/g, '');
            });
            document.getElementById('notes').addEventListener('input', function (e) {
                this.value = this.value.replace(/[^a-zA-Z\s]/g, '');
            });
            document.getElementById('contact').addEventListener('input', function (e) {
                this.value = this.value.replace(/[^0-9]/g, '');
                checkContactExists(this.value);
            });
            function checkContactExists(contact) {
                if (contact.length === 11) {
                    const xhr = new XMLHttpRequest();
                    xhr.open('POST', 'check_contact.php', true);
                    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                    xhr.onreadystatechange = function () {
                        if (xhr.readyState === 4 && xhr.status === 200) {
                            const response = JSON.parse(xhr.responseText);
                            if (response.exists) {
                                alert("This contact number is already registered. Please use a different number.");
                                document.getElementById('contact').value = '';
                            }
                        }
                    };
                    xhr.send('contact=' + encodeURIComponent(contact));
                }
            }

            function getLocation() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(showPosition, showError);
                } else {
                    alert("Geolocation is not supported by this browser.");
                }
            }

            function showPosition(position) {
                const latitude = position.coords.latitude;
                const longitude = position.coords.longitude;

                // You can use these coordinates to get a more readable address if needed
                const locationInput = document.getElementById("location");
                locationInput.value = "Lat: " + latitude + ", Lon: " + longitude;

                // Optional: To reverse geocode the coordinates to get a location name
                fetch(`https://nominatim.openstreetmap.org/reverse?lat=${latitude}&lon=${longitude}&format=json`)
                    .then(response => response.json())
                    .then(data => {
                        if (data && data.display_name) {
                            locationInput.value = data.display_name; // Fill input with the address
                        }
                    })
                    .catch(err => console.error(err));
            }

            function showError(error) {
                switch(error.code) {
                    case error.PERMISSION_DENIED:
                        alert("User denied the request for Geolocation.");
                        break;
                    case error.POSITION_UNAVAILABLE:
                        alert("Location information is unavailable.");
                        break;
                    case error.TIMEOUT:
                        alert("The request to get user location timed out.");
                        break;
                    case error.UNKNOWN_ERROR:
                        alert("An unknown error occurred.");
                        break;
                }
            }

            function validateForm() {
                const name = document.getElementById('name').value.trim();
                const date = document.getElementById('date').value;
                const contactNumber = document.getElementById('contact').value;
                const location = document.getElementById('location').value;

                if (!location) {
                    alert("Please enter your location.");
                    return false;
                }

                if (contactNumber.length > 11) {
                    alert("Contact number is too many digits.");
                    return false;
                } else if (contactNumber.length < 11) {
                    alert("Contact number must be 11 digits.");
                    return false;
                }

                if (!date) {
                    alert("Please select a valid date.");
                    return false;
                }

                const [year, month, day] = date.split('-').map(Number);

                if (year < 2024 || year > 2100) {
                    alert("Year must be between 2024 and 2100.");
                    return false;
                }

                if (month < 1 || month > 12) {
                    alert("Month must be between 01 and 12.");
                    return false;
                }

                const daysInMonth = new Date(year, month, 0).getDate();
                if (day < 1 || day > daysInMonth) {
                    alert(`Day must be between 01 and ${daysInMonth} for the selected month.`);
                    return false;
                }

                if (name.length < 10 || name.length > 50) {
                    alert("Name must be between 10 and 50 characters long.");
                    return false;
                }

                return true;
            }
        </script>
      </div>
    </section>
  </div>
</body>
</html>
