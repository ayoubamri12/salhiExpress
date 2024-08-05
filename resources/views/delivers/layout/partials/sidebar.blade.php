<!DOCTYPE html>
<html lang="en">
<head>
  
</head>
<body>
    <div class="sidebar">
        <div class="menu-btn">
          <i class="ph-bold ph-caret-left"></i>
        </div>
        <div class="head">
          <div class="user-img">
            <img src="{{asset("/assets/images/profile.png")}}" alt="" />
          </div>
          <div class="user-details">
            <p class="title">Livreur</p>
            <p class="name"> {{auth()->user()->deliverymen->firtsName." ".auth()->user()->deliverymen->lastName}}</p>
          </div>
        </div>
        <div class="nav">
          <div class="menu">
            <p class="title">Main</p>
            <ul>
              <li class="{{ request()->routeIs('delivery.show') ? 'active' : '' }}">
                <a href="#">
                  <i class="icon ph-bold ph-house-simple"></i>
                  <span class="text">Home</span>
                </a>
              </li>
              
              <li >
                <a href="{{route("delivery.show")}}">
                  <i class="icon ph-bold ph-file-text"></i>
                  <span class="text">Posts</span>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="icon ph-bold ph-calendar-blank"></i>
                  <span class="text">Schedules</span>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="icon ph-bold ph-chart-bar"></i>
                  <span class="text">Income</span>
                  <i class="arrow ph-bold ph-caret-down"></i>
                </a>
                <ul class="sub-menu">
                  <li>
                    <a href="#">
                      <span class="text">Earnings</span>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <span class="text">Funds</span>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <span class="text">Declines</span>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <span class="text">Payouts</span>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
          <div class="menu">
            <p class="title">Settings</p>
            <ul>
              <li>
                <a href="#">
                  <i class="icon ph-bold ph-gear"></i>
                  <span class="text">Settings</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="menu">
          <p class="title">Account</p>
          <ul>
            <li>
              <a href="#">
                <i class="icon ph-bold ph-info"></i>
                <span class="text">Help</span>
              </a>
            </li>
            <li>
              <a href="{{route("logout")}}">
                <i class="icon ph-bold ph-sign-out"></i>
                <span class="text">Logout</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
</body>
<script
src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.js"
integrity="sha512-8Z5++K1rB3U+USaLKG6oO8uWWBhdYsM3hmdirnOEWp8h2B1aOikj5zBzlXs8QOrvY9OxEnD2QDkbSKKpfqcIWw=="
crossorigin="anonymous"
></script>
<script>
    $(".menu > ul > li").click(function (e) {
  // remove active from already active
  $(this).siblings().removeClass("active");
  // add active to clicked
  $(this).toggleClass("active");
  // if has sub menu open it
  $(this).find("ul").slideToggle();
  // close other sub menu if any open
  $(this).siblings().find("ul").slideUp();
  // remove active class of sub menu items
  $(this).siblings().find("ul").find("li").removeClass("active");
});

$(".menu-btn").click(function () {
  $(".sidebar").toggleClass("active");
});

</script>
</html>