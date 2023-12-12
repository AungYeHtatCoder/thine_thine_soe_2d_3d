@extends('frontend.layouts.app')
@section('content')
<div class="row">
 <div class="col-lg-4 col-md-4 offset-lg-4 offset-md-4 mt-4 py-4 headers" style="height: 120vh;">
  <h5 class="text-center text-white mt-4">နည်းနည်းလောင်း များများနိုင်</h5>
  <marquee behavior="" class="mt-3 text-white" direction="left">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore, numquam.</marquee>
  <div class="card px-3 pb-3">
   Balance
   <h5 class="mt-1">246.76 Ks</h5>
  </div>
  <div class="d-flex justify-content-around mt-2 align-items-center text-center">
   <a href="{{ url('/maung') }}" class="card w-100 text-decoration-none me-1">
    <img src="{{ asset('user_app/assets/images/football/pitch.png') }}" class="mx-auto" width="40px" height="40px" alt="">
    <p>မောင်း</p>
   </a>
   <a href="{{ url('/goal') }}" class="card w-100 text-decoration-none">
    <img src="{{ asset('user_app/assets/images/football/football.png') }}" class="mx-auto" width="40px" height="40px" alt="">
    <p>ဘော်ဒီ/ဂိုးပေါင်း</p>
   </a>
  </div>
  <div class="d-flex justify-content-around mt-2 align-items-center text-center">
   <a href="#" class="card w-100 text-decoration-none me-1">
    <img src="{{ asset('user_app/assets/images/football/history.png') }}" class="mx-auto" width="40px" height="40px" alt="">
    <p>လောင်းထားသောပွဲစဉ်များ</p>
   </a>
   <a href="#" class="card w-100 text-decoration-none">
    <img src="{{ asset('user_app/assets/images/football/schedule.png') }}" class="mx-auto" width="40px" height="40px" alt="">
    <p>ပွဲစဉ်ဟောင်းများ</p>
   </a>
  </div>
  <div class="d-flex justify-content-around mt-2 align-items-center text-center">
   <a href="#" class="card w-100 text-decoration-none me-1">
    <img src="{{ asset('user_app/assets/images/football/coins.png') }}" class="mx-auto" width="40px" height="40px" alt="">
    <p>ငွေစာရင်း</p>
   </a>
   <a href="{{ url('/goal-result') }}" class="card w-100 text-decoration-none">
    <img src="{{ asset('user_app/assets/images/football/medical-result.png') }}" class="mx-auto" width="40px" height="40px" alt="">
    <p>ပွဲပြီးရလဒ်များ</p>
   </a>
  </div>
  <div class="d-flex justify-content-around mt-2 align-items-center text-center">
   <a href="#" class="card w-100 text-decoration-none me-1">
    <img src="{{ asset('user_app/assets/images/football/pitch.png') }}" class="mx-auto" width="40px" height="40px" alt="">
    <p>3D/4D</p>
   </a>
   <a href="#" class="card w-100 text-decoration-none">
    <img src="{{ asset('user_app/assets/images/football/cash-flow.png') }}" class="mx-auto" width="40px" height="40px" alt="">
    <p>ငွေ/အကြောင်းကြား</p>
   </a>
  </div>


 </div>
</div>

@include('frontend.layouts.footer')
@endsection