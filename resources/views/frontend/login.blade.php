@extends('frontend.layouts.app')
@section('content')
<div class="row"  style="min-height:100vh;">
    <div
      class="col-lg-4 col-md-4 offset-lg-4 offset-md-4 mt-4 py-4 headers">
    
    {{-- <img src="{{ asset('user_app/assets/images/login.jpg') }}" class="w-100 mt-4" alt="" /> --}}
    <form action="{{ route('login') }}" method="POST" style="margin-top: 30%;">
        @csrf
        <div class="text-center">
          <a href="{{ url('/') }}" class="text-decoration-none">
            <img src="{{ asset('user_app/assets/images/Logo Black PNG.png') }}" class="rounded-circle" width="100px" alt="" />
            <span class="d-block my-4 fw-bold" style="color:#f5bd02;">အကောင့်ဝင်ပါ</span>
          </a>
        </div>
        
      <div class="mb-4">
        <div class="input-group px-3">
          <span class="input-group-text bg-white border border-0">
            <i class="fas fa-phone-volume text-purple"></i>
          </span>
          <input
            type="text"
            name="phone"
            class="form-control w-75 py-2 mx-auto"
            placeholder="ဖုန်းနံပါတ်"
          />
        </div>
        @error('phone')
            <span class="d-block ps-3" style="color:rgb(255, 255, 255); text-shadow: 1px 2px 3px #ff0000;">{{ "*The phone field is required." }}</span>
        @enderror
      </div>
      <div class="mb-4 px-3">
        <div class="input-group">
          <span class="input-group-text bg-white border border-0">
            <i class="fas fa-key text-purple"></i>
          </span>
          <input type="password" name="password" id="password" class="form-control border border-0 py-2" placeholder="လျှို့ဝှက်နံပါတ်ထည့်ပါ">
          <span class="input-group-text bg-white border border-0"><i class="fas fa-eye text-purple" id="eye" onclick="PwdView()" style="cursor: pointer;"></i></span>
        </div>
          @error('password')
          <span class="d-block ps-3 pt-2" style="color:rgb(255, 255, 255); text-shadow: 1px 2px 3px #ff0000;">*{{ $message }}</span>
          @enderror
      </div>

      {{-- <div class="d-flex justify-content-end align-items-center me-3">
        <small
          ><a href="#" style="text-decoration: none; color: #f5bd02;" class=""
            >လျှို့ဝှက်နံပါတ် မေ့နေပါသလား။</a
          ></small
        >
      </div> --}}

      <div class="d-flex justify-content-center align-items-center px-3">
        <button
          type="submit"
          name="signin_btn"
          class="btns w-100 mt-4 mx-auto"
        >
          ၀င်မည်
        </button>
      </div>

      <hr />

      {{-- <div class="d-flex justify-content-center align-items-center px-3">
        <a
          href="{{ url('/register') }}"
          type="button"
          name="signin_btn"
          class="btn btn-outline-success w-100 mx-auto mt-4 py-2"
          style="text-decoration: none; box-shadow: 3px 5px 10px 0 rgba(0, 0, 0, 0.2),
          3px 5px 10px 0 rgba(0, 0, 0, 0.19);"
          >အကောင့် အသစ်ဖွင့်မည်</a
        >
      </div> --}}
    </form>
    </div>
</div>
{{-- @include('frontend.layouts.footer') --}}
@endsection
@section('script')
<script>
    function PwdView() {
        var x = document.getElementById("password");
        var y = document.getElementById("eye");

        if (x.type === "password") {
            x.type = "text";
            y.classList.remove('fa-eye');
            y.classList.add('fa-eye-slash');
        } else {
            x.type = "password";
            y.classList.remove('fa-eye-slash');
            y.classList.add('fa-eye');
        }
    }
</script>
@endsection
