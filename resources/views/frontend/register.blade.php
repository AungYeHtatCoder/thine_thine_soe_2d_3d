@extends('frontend.layouts.app')
@section('content')
<div class="row">
    <div
      class="col-lg-4 col-md-4 offset-lg-4 offset-md-4 mt-4 py-4 headers"
      style="height: 100vh;"
    >
    <img src="{{ asset('user_app/assets/images/login.jpg') }}" class="w-100 mt-2" alt="">
    <form action="" >
        <input type="text" name="signin_name" class="form-control w-75 ps-3 my-4 mx-auto"  placeholder="အမည်ထည့်ပါ" />
        <input type="text" name="signin_phone" class="form-control w-75 ps-3 my-4 mx-auto"  placeholder="ဖုန်းနံပတ်ဖြည့်ပါ" />
        <input type="password" name="signin_password" class="form-control w-75 ps-3 my-4 mx-auto"  placeholder="လျှို့ဝှက်နံပါတ်ဖြည့်ပါ" />
        <input type="password" name="signin_comfirm_password" class="form-control w-75 ps-3 my-4 mx-auto"  placeholder="နောက်တစ်ခါ လျှို့ဝှက်နံပါတ်ဖြည့်ပါ"/>

        <div class="d-flex justify-content-center align-items-center">
            <button type="button" name="signin_btn" class="btn btn-outline-success w-75 mx-auto mt-4 ">၀င်မည်</button>
        </div>
    </form> 
    </div>
</div>
{{-- @include('frontend.layouts.footer') --}}
@endsection