<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{asset('/assets/css/bootstrap.min.css')}}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    
    <style>
      @import url(https://fonts.googleapis.com/css?family=Inter:100,200,300,regular,500,600,700,800,900);
      .btn:focus {
    border-color: orange;
    box-shadow: 0 0 0 0.2rem rgba(255, 69, 0, 0.25);
}  
      .sidebar {
  position: relative;
  width: 256px;
  height: 110vh;
  display: flex;
  flex-direction: column;
  gap: 20px;
  background-color: #fff;
  padding: 24px;
  transition: all 0.3s;
}
.sidebar .head {
  display: flex;
  gap: 20px;
  padding-bottom: 20px;
  border-bottom: 1px solid orange;
}
.user-img {
  width: 44px;
  height: 44px;
  border-radius: 50%;
  overflow: hidden;
  border: 1.5px solid orange ;
}
.user-img img {
  width: 100%;
  object-fit: cover;
}
.user-details .title,
.menu .title {
  font-size: 10px;
  font-weight: 500;
  color:black;
  text-transform: uppercase;
  margin-bottom: 10px;
}
.user-details .name {
  font-size: 14px;
  font-weight: 500;
  color: orange;
}
.nav {
  flex: 1;
}
.menu ul li {
  position: relative;
  list-style: none;
  margin-bottom: 5px;
}
.menu ul li a {
  display: flex;
  align-items: center;
  gap: 10px;
  font-size: 14px;
  font-weight: 500;
  color: orange;
  text-decoration: none;
  padding: 12px 8px;
  border-radius: 8px;
  transition: all 0.3s;
}
.menu ul li > a:hover,
.menu ul li.active > a {
  color: #000;
  background-color: orange;
}
.menu ul li .icon {
  font-size: 20px;
}
.menu ul li .text {
  flex: 1;
}
.menu ul li .arrow {
  font-size: 14px;
  transition: all 0.3s;
}
.menu ul li.active .arrow {
  transform: rotate(180deg);
}
.menu .sub-menu {
  display: none;
  margin-left: 20px;
  padding-left: 20px;
  padding-top: 5px;
  border-left: 1px solid #f6f6f6;
}
.menu .sub-menu li a {
  padding: 10px 8px;
  font-size: 12px;
}
.menu:not(:last-child) {
  padding-bottom: 10px;
  margin-bottom: 20px;
  border-bottom: 2px solid #f6f6f6;
}
.menu-btn {
  position: absolute;
  right: -14px;
  top: 3.5%;
  width: 28px;
  height: 28px;
  border-radius: 8px;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  color: orange;
  border: 2px solid #f6f6f6;
  background-color: #fff;
}
.menu-btn:hover i {
  color: #000;
}
.menu-btn i {
  transition: all 0.3s;
}
.sidebar.active {
  width: 92px;
}
.sidebar.active .menu-btn i {
  transform: rotate(180deg);
}
.sidebar.active .user-details {
  display: none;
}
.sidebar.active .menu .title {
  text-align: center;
}
.sidebar.active .menu ul li .arrow {
  display: none;
}
.sidebar.active .menu > ul > li > a {
  position: relative;
  display: flex;
  align-items: center;
  justify-content: center;
}
.sidebar.active .menu > ul > li > a .text {
  position: absolute;
  left: 70px;
  top: 50%;
  transform: translateY(-50%);
  padding: 10px;
  border-radius: 4px;
  color: #fff;
  background-color: orange;
  opacity: 0;
  visibility: hidden;
  transition: all 0.3s;
}
.sidebar.active .menu > ul > li > a .text::after {
  content: "";
  position: absolute;
  left: -5px;
  top: 20%;
  width: 20px;
  height: 20px;
  border-radius: 2px;
  background-color: orange;
  transform: rotate(45deg);
  z-index: -1;
}
.sidebar.active .menu > ul > li > a:hover .text {
  left: 50px;
  opacity: 1;
  visibility: visible;
}
.sidebar.active .menu .sub-menu {
  position: absolute;
  top: 0;
  left: 20px;
  width: 200px;
  border-radius: 20px;
  padding: 10px 20px;
  border: 1px solid #f6f6f6;
  background-color: #fff;
  box-shadow: 0px 10px 8px rgba(0, 0, 0, 0.1);
}

    

/* Reset CSS */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Inter", sans-serif;
}
*::selection{
    background-color: orange;
}
body{
    background-color: rgb(238, 235, 235);
}
.containercss {
  display: flex;
  width: 100%;
  min-height: 100vh;
}



   </style>

    <title>Livreur</title>
  </head>
  <body>
    <div class="containercss">
<div>
  @include("delivers.layout.partials.sidebar")
</div>
      <div class="container">
        {{$slot}}
      </div>
    </div>

   
  </body>
</html>
