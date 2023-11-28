@extends('frontend.layouts.app')
@section('content')
<div class="row">
    <div
      class="col-lg-4 col-md-4 offset-lg-4 offset-md-4 mt-4 pt-4 headers"
      style="padding-bottom:100px;"
    >
      
    <div class="flesh-card mt-4">
      <div class="d-flex justify-content-between">
          <div class="d-flex justify-content-between">
              <span class="material-icons">account_balance_wallet</span>
              <p class="px-2">လက်ကျန်ငွေ</p>
          </div>
          <div class="d-flex justify-content-between">
              <span class="material-icons">
                update
                </span>
              <p class="px-2">ပိတ်ရန်ကျန်ချိန်</p>
          </div>
      </div>

      <div class="d-flex justify-content-between">

          <p class="ms-5">0.00</p>
          <p class="me-2">02:30:00PM</p>
      </div>
      
  </div>

  <div>
    <div class="d-flex justify-content-between custom-btn">
      <button class="fs-6">အမြန်ရွေးရန်</button>
      <a href="dream-book.html" class="btn h-50 text-white p-2" style="background-color: #c50408; border: 2px solid #ebc03c; box-shadow: 3px 5px 10px 0 rgba(0, 0, 0, 0.2), 3px 5px 10px 0 rgba(0, 0, 0, 0.19)">
        <span class="material-icons text-white icons">menu_book</span>  အိမ်မက်</a>
        
      <select class="h-50 text-white" style="box-shadow: 3px 5px 10px 0 rgba(0, 0, 0, 0.2), 3px 5px 10px 0 rgba(0, 0, 0, 0.19)">
        <option value="1">12:00 AM</option>
        <option value="2">04:00 PM</option>
      </select>
    </div>
  </div>

  <div class="d-flex justify-content-between mt-3 custom-btn">
    <button class="fs-6 px-3">ပတ်လည်</button>
    <input type="text" name="amount" id="amount" placeholder="ငွေပမာဏ" class="form-control w-75 text-center border-black"/>
  </div>


  <div class="dream-form mt-3">
    <div class="row">
       <div class="col-md-12">
        
        
       </div>
    </div>
    <div class="">
        <div class="ms-3">
          <form action="" method="post" class="p-1">

            <div class="row">
              <div class="col-md-12">
                <label for="selected_digits" style="font-size: 14px; color: #f5bd02;">ရွှေးချယ်ထားသောဂဏန်းများ</label>
                <input type="text" name="selected_digits" id="selected_digits" class="form-control mt-1" placeholder="" >
              </div>

              <!-- <div class="mb-3 mt-2">
                <label for="permulated_digit" style="font-size: 14px;">ပတ်လည် ဂဏန်းများ</label>
                <input type="text" id="permulated_digit" class="form-control" readonly>
              </div> -->


              <div class="col-md-12 mt-2">
                <label for="totalAmount" style="font-size: 14px; color: #f5bd02;">စုစုပေါင်းထိုးကြေး</label>
                <input type="text" id="totalAmount" name="totalAmount" class="form-control mt-1" readonly>
              </div>

              
            </div>
          </form>

        </div>
    </div>
  </div>
  
    <div class="box-container mt-3" id="boxContainer">
      <div class="d-flex justify-content-around">
        <div class="box">
          00
          <div class="progress mt-2" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 15%">
            <div class="progress-bar bg-success" style="width: 25%"></div>
          </div>
        </div>

        <div class="box">
          01
          <div class="progress mt-2" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 15%">
            <div class="progress-bar bg-success" style="width: 25%"></div>
          </div>
        </div>
        <div class="box">
          02
          <div class="progress mt-2" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 15%">
            <div class="progress-bar bg-success" style="width: 25%"></div>
          </div>
        </div>
        <div class="box">
          03
          <div class="progress mt-2" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 15%">
            <div class="progress-bar bg-success" style="width: 25%"></div>
          </div>
        </div>
        <div class="box">
          04
          <div class="progress mt-2" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 15%">
            <div class="progress-bar bg-success" style="width: 25%"></div>
          </div>
        </div>
      </div>
      <div class="d-flex justify-content-around">
        <div class="box">
          00
          <div class="progress mt-2" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 15%">
            <div class="progress-bar bg-success" style="width: 25%"></div>
          </div>
        </div>

        <div class="box ">
          01
          <div class="progress mt-2" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 15%">
            <div class="progress-bar bg-success" style="width: 25%"></div>
          </div>
        </div>
        <div class="box ">
          02
          <div class="progress mt-2" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 15%">
            <div class="progress-bar bg-success" style="width: 25%"></div>
          </div>
        </div>
        <div class="box ">
          03
          <div class="progress mt-2" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 15%">
            <div class="progress-bar bg-success" style="width: 25%"></div>
          </div>
        </div>
        <div class="box ">
          04
          <div class="progress mt-2" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 15%">
            <div class="progress-bar bg-success" style="width: 25%"></div>
          </div>
        </div>
      </div>
      <div class="d-flex justify-content-around">
        <div class="box">
          00
          <div class="progress mt-2" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 15%">
            <div class="progress-bar bg-success" style="width: 25%"></div>
          </div>
        </div>

        <div class="box">
          01
          <div class="progress mt-2" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 15%">
            <div class="progress-bar bg-success" style="width: 25%"></div>
          </div>
        </div>
        <div class="box">
          02
          <div class="progress mt-2" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 15%">
            <div class="progress-bar bg-success" style="width: 25%"></div>
          </div>
        </div>
        <div class="box">
          03
          <div class="progress mt-2" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 15%">
            <div class="progress-bar bg-success" style="width: 25%"></div>
          </div>
        </div>
        <div class="box">
          04
          <div class="progress mt-2" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 15%">
            <div class="progress-bar bg-success" style="width: 25%"></div>
          </div>
        </div>
      </div>
      <div class="d-flex justify-content-around">
        <div class="box">
          00
          <div class="progress mt-2" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 15%">
            <div class="progress-bar bg-success" style="width: 25%"></div>
          </div>
        </div>
        <div class="box">
          01
          <div class="progress mt-2" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 15%">
            <div class="progress-bar bg-success" style="width: 25%"></div>
          </div>
        </div>
        <div class="box">
          02
          <div class="progress mt-2" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 15%">
            <div class="progress-bar bg-success" style="width: 25%"></div>
          </div>
        </div>
        <div class="box">
          03
          <div class="progress mt-2" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 15%">
            <div class="progress-bar bg-success" style="width: 25%"></div>
          </div>
        </div>
        <div class="box">
          04
          <div class="progress mt-2" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 15%">
            <div class="progress-bar bg-success" style="width: 25%"></div>
          </div>
        </div>
      </div>
      <div class="d-flex justify-content-around">
        <div class="box">
          00
          <div class="progress mt-2" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 15%">
            <div class="progress-bar bg-success" style="width: 25%"></div>
          </div>
        </div>
        <div class="box">
          01
          <div class="progress mt-2" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 15%">
            <div class="progress-bar bg-success" style="width: 25%"></div>
          </div>
        </div>
        <div class="box">
          02
          <div class="progress mt-2" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 15%">
            <div class="progress-bar bg-success" style="width: 25%"></div>
          </div>
        </div>
        <div class="box">
          03
          <div class="progress mt-2" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 15%">
            <div class="progress-bar bg-success" style="width: 25%"></div>
          </div>
        </div>
        <div class="box">
          04
          <div class="progress mt-2" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 15%">
            <div class="progress-bar bg-success" style="width: 25%"></div>
          </div>
        </div>
      </div>
      <div class="d-flex justify-content-around">
        <div class="box">
          00
          <div class="progress mt-2" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 15%">
            <div class="progress-bar bg-success" style="width: 25%"></div>
          </div>
        </div>
        <div class="box">
          01
          <div class="progress mt-2" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 15%">
            <div class="progress-bar bg-success" style="width: 25%"></div>
          </div>
        </div>
        <div class="box">
          02
          <div class="progress mt-2" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 15%">
            <div class="progress-bar bg-success" style="width: 25%"></div>
          </div>
        </div>
        <div class="box">
          03
          <div class="progress mt-2" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 15%">
            <div class="progress-bar bg-success" style="width: 25%"></div>
          </div>
        </div>
        <div class="box">
          04
          <div class="progress mt-2" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 15%">
            <div class="progress-bar bg-success" style="width: 25%"></div>
          </div>
        </div>
      </div>
      <div class="d-flex justify-content-around">
        <div class="box">
          00
          <div class="progress mt-2" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 15%">
            <div class="progress-bar bg-success" style="width: 25%"></div>
          </div>
        </div>
        <div class="box">
          01
          <div class="progress mt-2" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 15%">
            <div class="progress-bar bg-success" style="width: 25%"></div>
          </div>
        </div>
        <div class="box">
          02
          <div class="progress mt-2" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 15%">
            <div class="progress-bar bg-success" style="width: 25%"></div>
          </div>
        </div>
        <div class="box">
          03
          <div class="progress mt-2" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 15%">
            <div class="progress-bar bg-success" style="width: 25%"></div>
          </div>
        </div>
        <div class="box">
          04
          <div class="progress mt-2" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 15%">
            <div class="progress-bar bg-success" style="width: 25%"></div>
          </div>
        </div>
      </div>
      <div class="d-flex justify-content-around">
        <div class="box">
          00
          <div class="progress mt-2" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 15%">
            <div class="progress-bar bg-success" style="width: 25%"></div>
          </div>
        </div>
        <div class="box">
          01
          <div class="progress mt-2" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 15%">
            <div class="progress-bar bg-success" style="width: 25%"></div>
          </div>
        </div>
        <div class="box">
          02
          <div class="progress mt-2" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 15%">
            <div class="progress-bar bg-success" style="width: 25%"></div>
          </div>
        </div>
        <div class="box">
          03
          <div class="progress mt-2" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 15%">
            <div class="progress-bar bg-success" style="width: 25%"></div>
          </div>
        </div>
        <div class="box">
          04
          <div class="progress mt-2" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 15%">
            <div class="progress-bar bg-success" style="width: 25%"></div>
          </div>
        </div>
      </div>
      <div class="d-flex justify-content-around">
        <div class="box">
          00
          <div class="progress mt-2" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 15%">
            <div class="progress-bar bg-success" style="width: 25%"></div>
          </div>
        </div>
        <div class="box">
          01
          <div class="progress mt-2" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 15%">
            <div class="progress-bar bg-success" style="width: 25%"></div>
          </div>
        </div>
        <div class="box">
          02
          <div class="progress mt-2" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 15%">
            <div class="progress-bar bg-success" style="width: 25%"></div>
          </div>
        </div>
        <div class="box">
          03
          <div class="progress mt-2" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 15%">
            <div class="progress-bar bg-success" style="width: 25%"></div>
          </div>
        </div>
        <div class="box">
          04
          <div class="progress mt-2" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 15%">
            <div class="progress-bar bg-success" style="width: 25%"></div>
          </div>
        </div>
      </div>
    </div>
      
    </div>
</div>
<div class="col-lg-4 col-md-6 offset-lg-4 offset-md-3 py-3 submitbtns footers" style="background-color: #000;">
          
  <div class="d-flex justify-content-around mt-2" >
    <a href="" class="btn remove-btn me-2" style="font-size: 14px;">ဖျက်မည်</a>
    <button type="submit" class="btn play-btn me-1" style="font-size: 14px;">ထိုးမည်</button>
  </div> 
</div>

{{-- @include('frontend.layouts.footer') --}}
@endsection
@section('script')
<script>
    

  var boxes = document.querySelectorAll('.box');

  boxes.forEach(function(box) {
    box.addEventListener('click', function() {
      this.classList.toggle('special');

    });
  });
</script>
@endsection