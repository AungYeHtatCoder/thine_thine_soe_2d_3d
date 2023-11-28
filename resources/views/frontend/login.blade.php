@extends('frontend.layouts.app')
@section('content')
<div class="row">
    <div
      class="col-lg-4 col-md-4 offset-lg-4 offset-md-4 mt-4 py-4 headers"
      style="height:100vh;"
    >
    <img src="{{ asset('user_app/assets/images/login.jpg') }}" class="w-100 mt-4" alt="" />
    <form action="">
      <input
        type="text"
        name="signin_phone"
        class="form-control w-75 py-2 my-4 mx-auto"
        placeholder="ဖုန်းနံပတ်ဖြည့်ပါ"
      />
      <input
        type="password"
        name="signin_password"
        class="form-control w-75 py-2 my-3 mx-auto"
        placeholder="လျှို့ဝှက်နံပါတ်ဖြည့်ပါ"
      />

      <div class="d-flex justify-content-end align-items-center me-5">
        <small
          ><a href="#" style="text-decoration: none; color: #f5bd02;" class="me-3"
            >လျှို့ဝှက်နံပါတ် မေ့နေပါသလား။</a
          ></small
        >
      </div>

      <div class="d-flex justify-content-center align-items-center">
        <button
          type="button"
          name="signin_btn"
          class="btns w-75 mt-4"
        >
          ၀င်မည်
        </button>
      </div>

      <hr />

      <div class="d-flex justify-content-center align-items-center">
        <a
          href="{{ url('/register') }}"
          type="button"
          name="signin_btn"
          class="btn btn-outline-success w-75 mx-auto mt-4 py-2"
          style="text-decoration: none; box-shadow: 3px 5px 10px 0 rgba(0, 0, 0, 0.2),
          3px 5px 10px 0 rgba(0, 0, 0, 0.19);"
          >အကောင့် အသစ်ဖွင့်မည်</a
        >
      </div>
    </form>
    </div>
</div>
{{-- @include('frontend.layouts.footer') --}}
@endsection