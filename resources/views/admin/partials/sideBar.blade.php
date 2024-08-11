<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{asset('/assets/css/sideNav.css')}}">


  </head>
  <body>
    <div class="">
      <aside class="sidebar">
        <div class="user">
         <!-- <div class="user-avatar">
            <p>JH</p>
          </div>-->
          <div class="user-logo">
            <img src="{{asset('/assets/images/aloo-salhi-logo-new.png')}}" class="img-fluid" alt="Sample image">
          </div>
          <div class="user-info">
            <h3>Salhi<span style="color: black">Express</span></h3>
            <p>Aloo salhi</p>
          </div>
        </div>
        <div class="hr"></div>
        <ul class="menu one">
          <li class="">
            <a href="{{route('admin.show')}}">
              <ion-icon name="home-outline"></ion-icon>
              <span>Dashboard</span>
            </a>
          </li>
          <li class="active">
            <a href="#">
              <ion-icon name="person-outline"></ion-icon>
              <span>Contact</span>
            </a>
          </li>
          <li>
            <a href="#">
              <ion-icon name="calendar-outline"></ion-icon>
              <span>Calendar</span>
            </a>
          </li>
          <li>
            <a href="#">
              <ion-icon name="mail-outline"></ion-icon>
              <span>Messages</span>
            </a>
          </li>
          <li>
            <a href="#">
              <ion-icon name="settings-outline"></ion-icon>
              <span>Settings</span>
            </a>
          </li>
        </ul>
       <!-- <div class="hr"></div>
        <ul class="menu two">
          <li>
            <a href="#">
              <ion-icon name="help-circle-outline"></ion-icon>
              <span>Help</span>
            </a>
          </li>
          <li>
            <a href="#">
              <ion-icon name="log-out-outline"></ion-icon>
              <span>Log out</span>
            </a>
          </li>
        </ul>-->
      </aside>
     
    </div>

    <!-- IONICONS -->
    <script
      type="module"
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"
    ></script>
    <script>
        const menuItems = document.querySelectorAll('.menu li');
    
        menuItems.forEach(item => {
          item.addEventListener('click', function() {
            // Remove 'active' class from all menu items
            menuItems.forEach(menuItem => {
              menuItem.classList.remove('active');
            });
    
            // Add 'active' class to the clicked menu item
            item.classList.add('active');
          });
        });
      </script>
  </body>
</html>