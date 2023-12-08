@extends('frontend.layouts.app')
@section('content')
<div class="row">
    <div
      class="col-lg-4 col-md-4 offset-lg-4 offset-md-4 mt-4 pt-5 headers"
      style="padding-bottom:300px"
    >
      
        <div
            class="d-flex justify-content-around shadow align-items-center px-3 py-1 my-2 rounded"
            style="background-color: #c50408; border:1px solid #f5bd02"
          >
            <a
              href="{{ url('/promotion-detail') }}"
              style="text-decoration: none"
              class="d-flex justify-content-around align-items-center text-white"
            >
              <img
                src="{{ asset('user_app/assets/images/promotion/promo_1.png') }}"
                style="width: 50px; height: 50px; border-radius: 50%"
                alt=""
              />
              <p class="mx-3">
                Lorem Ipsum is simply dummy text of the printing and typesetting
                industry. Lorem Ipsum has been the industry's standard dummy
                text ever since the 1500s
              </p>
              <span>
                <a
                  class="material-icons text-white"
                  style="text-decoration: none"
                  href="3d.html"
                  >chevron_right</a
                >
              </span>
            </a>
        </div>

        <div
            class="d-flex justify-content-around shadow align-items-center px-3 py-1 my-2 rounded"
            style="background-color: #c50408; border:1px solid #f5bd02"
          >
            <a
              href="{{ url('/promotion-detail') }}"
              style="text-decoration: none"
              class="d-flex justify-content-around align-items-center text-white"
            >
              <img
                src="{{ asset('user_app/assets/images/promotion/promo_1.png') }}"
                style="width: 50px; height: 50px; border-radius: 50%"
                alt=""
              />
              <p class="mx-3">
                Lorem Ipsum is simply dummy text of the printing and typesetting
                industry. Lorem Ipsum has been the industry's standard dummy
                text ever since the 1500s
              </p>
              <span>
                <a
                  class="material-icons text-white"
                  style="text-decoration: none"
                  href="3d.html"
                  >chevron_right</a
                >
              </span>
            </a>
        </div>

        <div
            class="d-flex justify-content-around shadow align-items-center px-3 py-1 my-2 rounded"
            style="background-color: #c50408; border:1px solid #f5bd02"
          >
            <a
              href="{{ url('/promotion-detail') }}"
              style="text-decoration: none"
              class="d-flex justify-content-around align-items-center text-white"
            >
              <img
                src="{{ asset('user_app/assets/images/promotion/promo_2.png') }}"
                style="width: 50px; height: 50px; border-radius: 50%"
                alt=""
              />
              <p class="mx-3">
                Lorem Ipsum is simply dummy text of the printing and typesetting
                industry. Lorem Ipsum has been the industry's standard dummy
                text ever since the 1500s
              </p>
              <span>
                <a
                  class="material-icons text-white"
                  style="text-decoration: none"
                  href="3d.html"
                  >chevron_right</a
                >
              </span>
            </a>
        </div>

        <div
            class="d-flex justify-content-around shadow align-items-center px-3 py-1 my-2 rounded"
            style="background-color: #c50408; border:1px solid #f5bd02"
          >
            <a
              href="{{ url('/promotion-detail') }}"
              style="text-decoration: none"
              class="d-flex justify-content-around align-items-center text-white"
            >
              <img
                src="{{ asset('user_app/assets/images/promotion/promo_2.png') }}"
                style="width: 50px; height: 50px; border-radius: 50%"
                alt=""
              />
              <p class="mx-3">
                Lorem Ipsum is simply dummy text of the printing and typesetting
                industry. Lorem Ipsum has been the industry's standard dummy
                text ever since the 1500s
              </p>
              <span>
                <a
                  class="material-icons text-white"
                  style="text-decoration: none"
                  href="3d.html"
                  >chevron_right</a
                >
              </span>
            </a>
        </div>

            
    

    </div>
</div>


@include('frontend.layouts.footer')
@endsection
@section('script')

@endsection
