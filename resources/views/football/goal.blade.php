@extends('frontend.layouts.app')

@section('style')

<style>
 .fa-star {
  color: green;
 }

 .box-1 {
  background: #c50408;
  border: 1px solid gold;
  color: #fff;
  width: 50%;
 }

 .box-2 {
  background: #c50408;
  border: 1px solid gold;
  color: #fff;
  width: 40%;
  text-align: center;
 }

 .box-3 {
  background: #c50408;
  border-top: 1px solid gold;
  border-bottom: 1px solid gold;
  color: #fff;
  width: 20%;
  align-items: center;
  text-align: center;
 }
</style>

@endsection

@section('content')
<!-- content section -->
<div class="row">
 <div class="col-lg-4 col-md-4 text-white offset-lg-4 offset-md-4 mt-4 pt-4 headers" style="height: 160vh; ">
  <h5 class="text-center mt-4">ဘော်ဒီ/ဂိုးပေါင်း</h5>
  <div class="pt-1 mt-4 ">
   <p><i class="fa fa-star pe-2"></i> AFC Cup</p>
  </div>
  <div class="card shadow text-center bg-transparent px-2 pt-2 pb-3">
   <p class="text-white">ပွဲချိန် : 11-12-2023 4:30 PM</p>
   <div class="d-flex">
    <div class="box-1 d-flex justify-content-around">
     <p class="d-flex align-items-center">မာဇီယာ SRC</p>
     <h5>
      = -5
     </h5>
    </div>
    <div class="box-1">
     <p>ATK မိုဟန် B</p>
    </div>
   </div>
   <div class="d-flex mt-1">
    <div class="box-2">
     <p>ဂိုးပေါ်</p>
    </div>
    <div class="box-3">
     <p>4 + 60</p>
    </div>
    <div class="box-2">
     <p>ဂိုးအောက်</p>
    </div>
   </div>
  </div>
  <div class="pt-1">
   <p><i class="fa fa-star pe-2"></i> Turkiye Lig3</p>
  </div>
  <div class="card shadow text-center bg-transparent px-2 pt-2 pb-3">
   <p class="text-white">ပွဲချိန် : 11-12-2023 4:30 PM</p>
   <div class="d-flex">
    <div class="box-1 d-flex justify-content-around">
     <p>မာဇီယာ SRC</p>
     <h5>
      = -25
     </h5>
    </div>
    <div class="box-1">
     <p>ATK မိုဟန် B</p>
    </div>
   </div>
   <div class="d-flex mt-1">
    <div class="box-2">
     <p>ဂိုးပေါ်</p>
    </div>
    <div class="box-3">
     <p>4 + 60</p>
    </div>
    <div class="box-2">
     <p>ဂိုးအောက်</p>
    </div>
   </div>
  </div>
  <div class="pt-1">
   <p><i class="fa fa-star pe-2"></i> Bulgaria B PFG</p>
  </div>
  <div class="card shadow text-center bg-transparent px-2 pt-2 pb-3">
   <p class="text-white">ပွဲချိန် : 11-12-2023 4:30 PM</p>
   <div class="d-flex">
    <div class="box-1">
     <p>မာဇီယာ SRC</p>

    </div>
    <div class="box-1 d-flex justify-content-around">
     <p>ATK မိုဟန် B</p>
     <h5>
      = -5
     </h5>
    </div>
   </div>
   <div class="d-flex mt-1">
    <div class="box-2">
     <p>ဂိုးပေါ်</p>
    </div>
    <div class="box-3">
     <p>4 + 60</p>
    </div>
    <div class="box-2">
     <p>ဂိုးအောက်</p>
    </div>
   </div>
  </div>
  <div class="pt-1">
   <p><i class="fa fa-star pe-2"></i> Turkiye Lig3</p>
  </div>
  <div class="card shadow text-center bg-transparent px-2 pt-2 pb-4">
   <p class="text-white">ပွဲချိန် : 11-12-2023 4:30 PM</p>
   <div class="d-flex">
    <div class="box-1 d-flex justify-content-around align-items-center">
     <p>မာဇီယာ SRC</p>
     <h5>
      1 - 25
     </h5>
    </div>
    <div class="box-1">
     <p>ATK မိုဟန် B</p>
    </div>
   </div>
   <div class="d-flex mt-1">
    <div class="box-2">
     <p>ဂိုးပေါ်</p>
    </div>
    <div class="box-3">
     <p>4 + 60</p>
    </div>
    <div class="box-2">
     <p>ဂိုးအောက်</p>
    </div>
   </div>
  </div>
 </div>
</div>
<!-- content section -->

<!-- footer section -->
<footer class="row">
 <div class="col-lg-4 col-md-6 fixed-bottom mx-auto" style="
            background: #000;
            border: 2px solid #ebc03c;
          ">
  <div class="d-flex justify-content-between align-items-center text-center py-2">
   <p class="text-white">လောင်းငွေ</p>

   <input type="text" class="form-control w-50" />
   <button class="btn btn-success">လောင်းမည်</button>
  </div>
 </div>
</footer>
<!-- footer section -->


@endsection