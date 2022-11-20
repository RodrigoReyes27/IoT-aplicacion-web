<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Dashboard</title>

    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp"
      rel="stylesheet"
  />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link rel="stylesheet" href="./style.css" />
</head>
<body>

<div class="container">
    
  <aside>
        <div class="top">
          <div class="logo">
            <img src="./images/logo.png" alt="Logo" />
            <h2>INTELLI<span class="danger">SECTION</span></h2>
          </div>
          <div class="close" id="close-btn">
            <span class="material-icons-sharp"> close </span>
          </div>
        </div>

        <div class="sidebar">
          <a href="/" class="active dashboard">
            <span class="material-icons-sharp"> dashboard </span>
            <h3>Dashboard</h3>
          </a>
          <a href="/analytics_temperature" class="temperature">
            <span class="material-icons-sharp"> device_thermostat </span>
            <h3>Temperatura</h3>
          </a>
          <a href="/analytics_distance" class="distance">
            <span class="material-icons-sharp"> straighten </span>
            <h3>Distancia</h3>
          </a>
          <a href="/analytics_movement" class="movement">
          <span class="material-symbols-outlined"> blur_medium </span>
            <h3>Movimiento</h3>
          </a>
          <a href="/analytics_light" class="light">
            <span class="material-icons-sharp"> lightbulb </span>
            <h3>Fotorresistor</h3>
          </a>
          <a href="/analytics_boton" class="button">
            <span class="material-icons-sharp"> traffic </span>
            <h3>Boton</h3>
          </a>


          <!-- <a href="#">
            <span class="material-icons-sharp"> person_outline </span>
            <h3>Customers</h3>
          </a>
          <a href="#">
            <span class="material-icons-sharp"> receipt_long </span>
            <h3>Orders</h3>
          </a>
          <a href="#">
            <span class="material-icons-sharp"> insights </span>
            <h3>Analytics</h3>
          </a>
          <a href="#">
            <span class="material-icons-sharp"> mail_outline </span>
            <h3>Messages</h3>
            <span class="message-count">26</span>
          </a>
          <a href="#">
            <span class="material-icons-sharp"> inventory </span>
            <h3>Products</h3>
          </a>
          <a href="#">
            <span class="material-icons-sharp"> report_gmailerrorred </span>
            <h3>Reports</h3>
          </a>
          <a href="#">
            <span class="material-icons-sharp"> settings </span>
            <h3>Settings</h3>
          </a> -->



          <a href="#">
            <span class="material-icons-sharp"> add </span>
            <h3>Add Product</h3>
          </a>
          <a href="#">
            <span class="material-icons-sharp"> logout </span>
            <h3>Logout</h3>
          </a>
        </div>
      </aside>
      
      <?php
        echo $content;
      ?>

      <div class="right">
        <div class="top">
          <div style="padding: 12px;">
            <button id="menu-btn">
              <span class="material-icons-sharp"> menu </span>
            </button>
            <div class="theme-toggler">
              <span class="material-icons-sharp active"> light_mode </span>
              <span class="material-icons-sharp"> dark_mode </span>
            </div>
          </div>
        </div>

        <!-- <div class="recent-updates">
          <h2>Recent Updates</h2>
            <div class="update">
              <div class="profile-photo">
                <img src="${update.imgSrc}" />
              </div>
              <div class="message">
              <p><b>${update.profileName}</b> ${update.message}</p>
              <small class="text-muted">${update.updatedTime}</small>
              </div>
            </div>
        </div> -->

        <!-- <div class="sales-analytics">
          <h2>Sales Analytics</h2>
          <div id="analytics">
            <!-- Add items div here | JS insertion -->
          </div>
          <div class="item add-product">
            <div>
              <span class="material-icons-sharp"> add </span>
              <h3>Add Product</h3>
            </div>
          </div>
        </div> -->
      </div>
</div>
    

  <script src="./constants/recent-order-data.js"></script>
  <script src="./constants/update-data.js"></script>
  <script src="./constants/sales-analytics-data.js"></script>
  <script src="./index.js"></script>

</body>
</html>
