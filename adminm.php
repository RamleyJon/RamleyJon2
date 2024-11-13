<!DOCTYPE html>
<html>
<head>
<title>Admin / Menu</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
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
  <a href="javascript:void(0)" onclick="w3_close()"
  class="w3-bar-item w3-button">Close Menu</a>
  <a href="#food" onclick="w3_close()" class="w3-bar-item w3-button">Food</a>
  <a href="#about" onclick="w3_close()" class="w3-bar-item w3-button">About</a>
  <a href="adminv.php" onclick="w3_close()" class="w3-bar-item w3-button">Registered Users</a>
  <a href="email.php" onclick="w3_close()" class="w3-bar-item w3-button">Email API</a>
  <a href="logout.php" onclick="w3_close()" class="w3-bar-item w3-button">Log out</a>

  <p style="padding-left: 25px;">────────────────────────────────</p>
</nav>

<!-- Top menu -->
<div class="w3-top">
  <div class="w3-white w3-xlarge" style="max-width:1200px;margin:auto">
    <div class="w3-button w3-padding-16 w3-left" onclick="w3_open()">☰</div>
    <div class="w3-right w3-padding-16">
        <a href="record.php" style="text-decoration: none;">View Record</a>
    </div>
    <div class="w3-center w3-padding-16">My Food</div>
  </div>
</div>
  
<!-- !PAGE CONTENT! -->
<div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:100px">

  <!-- First Photo Grid-->
  <div class="w3-row-padding w3-padding-16 w3-center" id="food">
    <div class="w3-quarter">
      <img src="sisig.jpg" alt="Sisig Kapampangan" class="img-responsive">
      <h3>Sisig Kapampangan</h3>
      <p>Sisig Kapampangan is a traditional Filipino dish from Pampanga made of finely chopped pork, typically seasoned with calamansi, onions, and chili, then served on a sizzling plate.</p>
    </div>
    <div class="w3-quarter">
      <img src="adobo.jpg" alt="Adobong Pula" class="img-responsive">
      <h3>Adobong Pula</h3>
      <p>Also known as Adobo sa Atsuete, this variation uses atsuete (annatto seeds) to give the dish a distinct red color and adds a mild, earthy flavor to the savory, tangy sauce.</p>
    </div>
    <div class="w3-quarter">
      <img src="kare-kare.jpg" alt="Kare-Kare" class="img-responsive">
      <h3>Kare-Kare</h3>
      <p>Kare-Kare is a Filipino stew of oxtail, tripe, and vegetables in a rich peanut sauce, traditionally served with bagoong for added flavor.</p>
    </div>
    <div class="w3-quarter">
      <img src="sigang.jpg" alt="Sigang na Baboy" class="img-responsive">
      <h3>Sigang na Baboy</h3>
      <p>A Filipino sour soup made with pork, tamarind, and a mix of vegetables like radish, eggplant, and water spinach, known for its tangy, comforting flavor.</p>
    </div>
  </div>
  
  <!-- Second Photo Grid-->
  <div class="w3-row-padding w3-padding-16 w3-center">
    <div class="w3-quarter">
      <img src="morcon.jpg" alt="Morcon" class="img-responsive">
      <h3>Morcon</h3>
      <p>In Kapampangan, Morcon is sometimes referred to as "Murkun," a festive dish featuring rolled beef stuffed with sausage, eggs, carrots, and pickles, cooked in a rich tomato sauce.</p>
    </div>
    <div class="w3-quarter">
      <img src="pata.jpg" alt="Crispy Pata" class="img-responsive">
      <h3>Crispy Pata</h3>
      <p>Crispy Pata is a popular Filipino dish of deep-fried pork leg, known for its crispy skin and tender meat, often served with a soy-vinegar dipping sauce.</p>
    </div>
    <div class="w3-quarter">
      <img src="bringhe.jpg" alt="Bringhe" class="img-responsive">
      <h3>Bringhe</h3>
      <p>Bringhe is a classic Filipino rice dish also known as Kapampangan paella, said to have originated in the Pampanga region.</p>
    </div>
    <div class="w3-quarter">
      <img src="pindang.jpg" alt="Pindang" class="img-responsive">
      <h3>Pindang</h3>
      <p>Pindang Kapampangan is a sweet cured pork dish from Pampanga, typically marinated and fried until caramelized.</p>
    </div>
  </div>

  <!-- Pagination -->
  <div class="w3-center w3-padding-32">
    <div class="w3-bar">
      <a href="#" class="w3-bar-item w3-button w3-hover-black">«</a>
      <a href="#" class="w3-bar-item w3-black w3-button">1</a>
      <a href="#" class="w3-bar-item w3-button w3-hover-black">2</a>
      <a href="#" class="w3-bar-item w3-button w3-hover-black">3</a>
      <a href="#" class="w3-bar-item w3-button w3-hover-black">4</a>
      <a href="#" class="w3-bar-item w3-button w3-hover-black">»</a>
    </div>
  </div>
  
  <hr id="about">

  <!-- About Section -->
  <div class="w3-container w3-padding-32 w3-center">  
    <h3>About Me</h3><br>
    <div class="w3-padding-32">
      <h6><i>With Passion For Real, Good Food</i></h6>
      <p>Just me love to cook for people and to make them smile when they eat my food. There’s something special about bringing friends and family together around the table. Seeing their enjoyment is the best reward I could ask for. Cooking allows me to express my love and creativity in the most delicious way.</p>
    </div>
  </div>
  <hr>
  
  <!-- Footer -->
  <footer class="w3-row-padding w3-padding-32">
    <div class="w3-third">
      <h3>FOOTER</h3>
      <p></p>
      <p>Powered by Ramley Jon Magpayo</p>
    </div>

    <div class="w3-third w3-serif">
      <h3>POPULAR TAGS</h3>
      <p>
        <span class="w3-tag w3-black w3-margin-bottom">Travel</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Pampanga</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Dinner</span>
        <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Salmon</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">San Fernando</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Drinks</span>
        <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Ideas</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Flavors</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Cuisine</span>
        <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Chicken</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Dressing</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Fried</span>
        <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Fish</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Duck</span>
      </p>
    </div>
  </footer>

<!-- End page content -->
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
