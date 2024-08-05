<link rel="stylesheet" href="{{asset('/assets/css/bootstrap.min.css')}}">
<title>admin</title>
<style>
    .main{
        display: flex;
        justify-content: space-around;
        height: fit-content;        
    }
    body {
  background-color: rgb(236, 235, 235);
}
.w-95{
    width: 95%;
}
*::selection{
    background-color: orange;
}
   * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Roboto", sans-serif;
} 
</style>
<div class="main">
   <div class="col-2 mt-4">
    @include("admin.partials.sideBar")
   </div>
   <div class="col-xl-9 col-lg-8 col-md-7">
   <div class="my-4">
    @include("admin.partials.header")
    <div class="mt-4 w-95 mx-auto">
        {{$slot}}
    </div>
   </div>
   
   </div>
</div>
<!-- Bootstrap JS -->
